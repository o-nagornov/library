<?php

class MyBooksWidget extends CWidget
{
	public $limit = 10;
	
	public function run()
	{
	    $criteria = new CDbCriteria();
		$criteria->with = array('user', 'book');
		
		$criteria->addCondition('user_id='.Yii::app()->user->id);
		$criteria->addCondition("status='given'");
		$criteria->order = 'id_query DESC';
		$criteria->limit = $this->limit;
		
		$dataProvider = new CActiveDataProvider('Query', array(
			'criteria' => $criteria,
			'pagination'=> false,
		));
	    $this->render('myBooksWidget', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
}
?>