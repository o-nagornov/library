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

		$criteria->compare('id_query',$this->id_query);
		$criteria->compare('creation_date',$this->creation_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('book_id',$this->book_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
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
}
