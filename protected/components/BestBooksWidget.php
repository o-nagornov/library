<?php

class BestBooksWidget extends CWidget
{
	public $limit = 10;
	
	public function run()
	{

	    $criteria = new CDbCriteria();
		$criteria->select = array('*', 'COUNT(`id_query`) AS `item_count`');
		$criteria->group = 'book_id';
		$criteria->order = '`item_count` DESC';
		$criteria->limit = $this->limit;
		
		$dataProvider = new CActiveDataProvider('Query', array(
			'criteria' => $criteria,
			'pagination'=> false,
		));
	    $this->render('bestBooksWidget', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
}
?>