<?php

class MyBooksWidget extends CWidget
{
	public $limit = 10;
	
	public function run()
	{
	    $criteria = new CDbCriteria();
		$criteria->with = array('user', 'book');
		
		$criteria->addSearchCondition('user_id', Yii::app()->user->id, true, 'AND', 'LIKE');
		$criteria->addSearchCondition('status', 'given', true, 'AND', 'LIKE');
		$criteria->order = 'id_query DESC';
		$criteria->limit = $this->limit;
		
		$dataProvider = new CActiveDataProvider('Query', array('criteria' => $criteria));
	    $this->render('myBooksWidget', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
}
?>