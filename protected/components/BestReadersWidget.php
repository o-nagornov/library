<?php

class BestReadersWidget extends CWidget
{
	public $limit = 10;
	
	public function run()
	{

	    $criteria = new CDbCriteria();
		$criteria->select = array('*', 'COUNT(`id_query`) AS `item_count`');
		$criteria->group = 'user_id';
		$criteria->order = '`item_count` DESC';
		$criteria->limit = $this->limit;
		
		$dataProvider = new CActiveDataProvider('Query', array('criteria' => $criteria));
	    $this->render('bestReadersWidget', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
}
?>