<?php

/**
 * This is the model class for table "tbl_book".
 *
 * The followings are the available columns in table 'tbl_book':
 * @property integer $id_book
 * @property string $title
 * @property string $description
 * @property integer $current_count
 * @property integer $total_count
 * @property string $file_link
 * @property integer $year
 *
 * The followings are the available model relations:
 * @property Author[] $authors
 * @property Keyword[] $keywords
 * @property Type[] $types
 * @property Query[] $queries
 * @property Recommendation[] $recommendations
 */
class Book extends CActiveRecord
{
	public $id_author = '';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_book';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('current_count, total_count, year', 'numerical', 'integerOnly'=>true),
			array('title, file_link', 'length', 'max'=>45),
			array('description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_book, title, description, current_count, total_count, file_link, year', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'authors' => array(self::MANY_MANY, 'Author', 'tbl_book_has_author(book_id, author_id)'),
			'keywords' => array(self::MANY_MANY, 'Keyword', 'tbl_book_has_keyword(book_id, keyword_id)'),
			'types' => array(self::MANY_MANY, 'Type', 'tbl_book_has_type(book_id, type_id)'),
			'queries' => array(self::HAS_MANY, 'Query', 'book_id'),
			'recommendations' => array(self::HAS_MANY, 'Recommendation', 'book_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_book' => 'Id Book',
			'title' => 'Title',
			'description' => 'Description',
			'current_count' => 'Current Count',
			'total_count' => 'Total Count',
			'file_link' => 'File Link',
			'year' => 'Year',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
		
		$criteria=new CDbCriteria;
		
		$criteria->with = array(
            'authors' => array(
                'select' => array('id_author', 'name'),
            ),
        );
		$criteria->together = true;

		
        if(isset($this->id_author) && !empty($this->id_author)){
            $criteria->compare('authors.id_author', '='.$this->id_author, true);
        }
	

		$criteria->compare('id_book',$this->id_book);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('current_count',$this->current_count);
		$criteria->compare('total_count',$this->total_count);
		$criteria->compare('file_link',$this->file_link,true);
		$criteria->compare('year',$this->year);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Book the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getTypesString()
	{
		$result = "";
		foreach ($this->types as $type)
		{
			$result .= $type->type.", ";
		}
		
		$result = substr($result, 0, strlen($result) - 2);
		return $result;
	}
	
	public function getAuthorsString()
	{
		$result = "";
		foreach ($this->authors as $author)
		{
			$result .= $author->name.", ";
		}
		
		$result = substr($result, 0, strlen($result) - 2);
		return $result;
	}
	
	public function getKeywordsString()
	{
		$result = "";
		foreach ($this->keywords as $keyword)
		{
			$result .= $keyword->word.", ";
		}
		$result = substr($result, 0, strlen($result) - 2);
		return $result;
	}
}
