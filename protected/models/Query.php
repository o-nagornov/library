<?php

/**
 * This is the model class for table "tbl_query".
 *
 * The followings are the available columns in table 'tbl_query':
 * @property integer $id_query
 * @property string $creation_date
 * @property string $status
 * @property integer $book_id
 * @property integer $user_id
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Book $book
 * @property User $user
 */
class Query extends CActiveRecord
{
	public $user_search = '';
	public $book_search = '';
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_query';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('book_id, user_id', 'required'),
			array('book_id, user_id', 'numerical', 'integerOnly'=>true),
			array('status', 'length', 'max'=>45),
			array('creation_date, comment', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_query, creation_date, status, book_id, user_id, comment', 'safe', 'on'=>'search'),
			array('user_search', 'safe'),
			array('book_search', 'safe'),
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
			'book' => array(self::BELONGS_TO, 'Book', 'book_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_query' => 'Id Query',
			'creation_date' => 'Creation Date',
			'status' => 'Status',
			'book_id' => 'Book',
			'user_id' => 'User',
			'comment' => 'Comment',
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
		$criteria->with = array('user');
		$criteria->together = true;
		
		$criteria->compare('id_query',$this->id_query);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('book',$this->book_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment',$this->comment,true);
		
		$criteria->compare("CONCAT_WS(' ', user.surname, user.name, user.parentname)", $this->user_search, true);
		$criteria->compare("book.title)", $this->book_search, true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'attributes'=>array(
					'user_search'=>array(
						'asc'=>"CONCAT_WS(' ', user.surname, user.name, user.parentname)",
						'desc'=>"CONCAT_WS(' ', user.surname, user.name, user.parentname) DESC",
					),
					'book_search'=>array(
						'asc'=>"book.title)",
						'desc'=>"book.title DESC",
					),
					'*',
				)
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Query the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getStatus()
	{
		switch($this->status)
		{
		case "new":
			return "Новая";
			break;
		case "returned":
			return "Возвращена";
			break;
		case "given":
			return "Выдана";
			break;
		case "canseled":
			return "Отменена";
			break;
		}
	}
	
	public function getQueryStatus()
	{
		$beforeUserCount = Query::model()->count("book_id=:book_id AND (status='new') AND id_query < :query_id", array(':book_id'=>$this->book_id, ':query_id'=>$this->id_query));
		
		if ($beforeUserCount < $this->book->current_count && $this->status == 'new')
		{
			return 'Доступна выдаче';
		}
		else
		{
			return 'Не доступна';
		}
	}
	
	public function getQueryActions()
	{
		$result = '';
		
		if ($this->status == 'new')
		{
			$beforeUserCount = Query::model()->count("book_id=:book_id AND (status='new') AND id_query < :query_id", array(':book_id'=>$this->book_id, ':query_id'=>$this->id_query));
		
			if ($beforeUserCount < $this->book->current_count && $this->status == 'new')
			{
				$result .= CHtml::link("Выдать", array('/query/give', 'query'=>$this->id_query));
			}	
		}
		else if ($this->status = 'given')
		{
			$result .= CHtml::link("Принять", array('/query/recive', 'query'=>$this->id_query));
		}
		
		return $result;
	}
	
}
