<?php

class BookStatisticWidget extends CWidget {
	
	public $book = null;
	
	public function run() {

		$userId = Yii::app()->user->id;
		$bookId = $this->book->id_book;
		
		$readCount = Query::model()->count("book_id=:book_id AND (status='returned')", array(':book_id'=>$bookId));
		$waitCount = Query::model()->count("book_id=:book_id AND (status='new')", array(':book_id'=>$bookId));
		$recommendationCount = Recommendation::model()->count("book_id=:book_id", array(':book_id'=>$bookId));
		
		
		$holdingUser = Query::model()->find("book_id=:book_id AND (status='given')", array(':book_id'=>$bookId));
		$holder = ($holdingUser) ? $holdingUser->user->surname." ".$holdingUser->user->name." ".$holdingUser->user->parentname : 'none';
	
		$this->render('bookStatisticWidget', array(
												'holder'=>$holder,
												'readCount'=>$readCount,
												'waitCount'=>$waitCount,
												'recommendationCount'=>$recommendationCount,
												));	
		
	}
}
?>