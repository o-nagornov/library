<?php

class BookAdminPanelWidget extends CWidget {
	
	public $book = null;
	
	public function run() {

		$userId = Yii::app()->user->id;
		$bookId = $this->book->id_book;
		
		$toGiveQueries = Query::model()->findAll(array(
			'condition'=>"book_id=:book_id AND status='new'",
			'params'=>array(':book_id'=>$bookId),
			'order'=>'creation_date',
			'limit'=>$this->book->current_count
		));
		
		$toReciveQueries = Query::model()->findAll(array(
			'condition'=>"book_id=:book_id AND status='given'",
			'params'=>array(':book_id'=>$bookId),
			'order'=>'creation_date',
		));
		
		$this->render('bookAdminPanelWidget', array(
												'toGiveQueries'=>$toGiveQueries,
												'toReciveQueries'=>$toReciveQueries,
												'book'=>$this->book,
												));	
		
	}
}
?>