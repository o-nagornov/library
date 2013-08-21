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
 * @property string $image_link
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
	
	
	protected $authorsArray;
	protected $typesArray;
	protected $keywordsArray;
	
	public function getAuthorsArray()
	{
		if ($this->authorsArray == null)
		{
			$this->authorsArray = CHtml::listData($this->authors, 'id_author', 'id_author');
		}
		
		return $this->authorsArray;
	}
	
	public function setCategoriesArray($value)
	{
		$this->authorsArray = $value;
	}
	
	public function getTypesArray()
	{
		if ($this->typesArray == null)
		{
			$this->typesArray = CHtml::listData($this->types, 'id_type', 'id_type');
		}
		
		return $this->typesArray;
	}
	
	public function setTypesArray($value)
	{
		$this->typesArray = $value;
	}
	
	public function getKeywordsArray()
	{
		if ($this->keywordsArray == null)
		{
			$this->keywordsArray = CHtml::listData($this->keywords, 'id_keyword', 'id_keyword');
		}
		
		return $this->keywordsArray;
	}
	
	public function setKeywordsArray($value)
	{
		$this->keywordsArray = $value;
	}
	
	protected function afterSave()
	{
		BookHasAuthor::model()->deleteAll("book_id=:book_id", array(':book_id'=>$this->id_book));
		BookHasType::model()->deleteAll("book_id=:book_id", array(':book_id'=>$this->id_book));
		BookHasKeyword::model()->deleteAll("book_id=:book_id", array(':book_id'=>$this->id_book));
		
		
		if (is_array($this->authorsArray))
		{
			foreach ($this->authorsArray as $authorId)
			{
				$relation = new BookHasAuthor();
				$relation->author_id = $authorId;
				$relation->book_id = $this->id_book;
				$relation->save();
			}
		}
		
		if (is_array($this->typesArray))
		{
			foreach ($this->typesArray as $typeId)
			{
				$relation = new BookHasType();
				$relation->type_id = $typeId;
				$relation->book_id = $this->id_book;
				$relation->save();
			}
		}
		
		if (is_array($this->keywordsArray))
		{
			foreach ($this->keywordsArray as $keywordId)
			{
				$relation = new BookHasKeyword();
				$relation->keyword_id = $keywordId;
				$relation->book_id = $this->id_book;
				$relation->save();
			}
		}
	}
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('current_count, total_count, year', 'numerical', 'integerOnly'=>true),
			array('title, file_link, image_link', 'length', 'max'=>45),
			array('description', 'safe'),
			array('image_link', 'file', 'types' => 'png, jpg, gif', 'allowEmpty'=>true, 'on'=>'insert,update'),
			array('file_link', 'file', 'types' => 'pdf, txt, fb2', 'allowEmpty'=>true, 'on'=>'insert,update'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_book, title, description, current_count, total_count, file_link, year, image_link', 'safe', 'on'=>'search'),
			array('authorsArray', 'safe'),
			array('typesArray', 'safe'),
			array('keywordsArray', 'safe'),
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
			'image_link' => 'Image Link',
		);
	}

	protected function beforeSave()
	{
        if (!parent::beforeSave()) {
            return false;
        }
		
        if (($this->scenario=='insert' || $this->scenario=='update') && ($document=CUploadedFile::getInstance($this,'file_link'))) {
            $this->deleteDocument($this->file_link);
			
			$this->file_link = $document;
            $this->file_link->saveAs(Yii::getPathOfAlias('webroot.data').DIRECTORY_SEPARATOR.$this->file_link);			
        }
		
		if (($this->scenario=='insert' || $this->scenario=='update') && ($document=CUploadedFile::getInstance($this,'image_link'))) {
           $this->deleteDocument($this->image_link);
			
			$this->image_link = $document;
            $this->image_link->saveAs(Yii::getPathOfAlias('webroot.data').DIRECTORY_SEPARATOR.$this->image_link);			
        }
        return true;
    }
	
	protected function beforeDelete()
	{
        if (!parent::beforeDelete())
		{
            return false;
        }
        $this->deleteDocument($this->image_link);
		$this->deleteDocument($this->file_link);
        return true;
    }
	
	public function deleteDocument($file)
	{
        $documentPath = Yii::getPathOfAlias('webroot.data').DIRECTORY_SEPARATOR.$file;
        if (is_file($documentPath))
		{
            unlink($documentPath);
		}
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

		$criteria->compare('id_book',$this->id_book);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('current_count',$this->current_count);
		$criteria->compare('total_count',$this->total_count);
		$criteria->compare('file_link',$this->file_link,true);
		$criteria->compare('year',$this->year);
		$criteria->compare('image_link',$this->image_link,true);

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
