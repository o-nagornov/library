<?php

class BookStatusWidget extends CWidget {
	
	public $book = null;
	
	public function run() {

		$userId = Yii::app()->user->id;
		$bookId = $this->book->id_book;
		
		$status = null;
		
		if (Query::model()->exists("book_id=:book_id AND status='new' AND user_id=:user_id", array(':book_id'=>$bookId, ':user_id'=>$userId)))
		{
			// уже подали заявку
			$status = 'new';
		} else if (Query::model()->exists("book_id=:book_id AND status='given' AND user_id=:user_id", array(':book_id'=>$bookId, ':user_id'=>$userId)))
		{
			// уже получили книгу
			$status = 'given';
		} else {
			// можно сделать заявку
			$status = 'request';
		}
		
		$totalCount = Query::model()->count("book_id=:book_id AND (status='new' OR status='given')", array(':book_id'=>$bookId));
		$beforeMeCount = 0;
		$newBeforeMe = 0;
		if ($status == 'request')
		{
			$beforeMyCount = $totalCount;
		} else if ($status == 'new') {
			$query = Query::model()->find("book_id=:book_id AND status='new' AND user_id=:user_id", array(':book_id'=>$bookId, ':user_id'=>$userId));
			$newBeforeMe = Query::model()->count("book_id=:book_id AND status='new' AND id_query < :query_id", array(':book_id'=>$bookId, ':query_id'=>$query->id_query));
			$beforeMeCount = Query::model()->count("book_id=:book_id AND (status='new' OR status='given') AND id_query < :query_id", array(':book_id'=>$bookId, ':query_id'=>$query->id_query));
		} else {
			$beforeMeCount = 0;
			$newBeforeMe = 0;
		}
		
		$queueStatus = null;
		
		if ($status == 'request')
		{
			$queueStatus = 'last';
		} else if ($beforeMeCount == 0)
		{
			$queueStatus = 'first';
		} else if ($beforeMeCount > 0)
		{
			$queueStatus = 'queue';
		}
		
		$gettingStatus = null;
		
	
		if ($beforeMeCount < $this->book->current_count && $status != 'request')
		{
			$gettingStatus = 'available';
		} else if ($beforeMeCount < $this->book->current_count && $status == 'request')
		{
			$gettingStatus = 'requestFirst';
		} else if ($status == 'given')
		{
			$gettingStatus = 'given';
		} else {		
			$gettingStatus = 'notAvailable';
		}
	
		$this->render('bookStatusWidget', array(
												'bookId'=>$bookId,
												'userId'=>$userId,
												'status'=>$status,
												'queueStatus'=>$queueStatus,
												'gettindStatus'=>$gettingStatus,
												'beforeCount'=>$newBeforeMe,
												));	
		
	}
}
?>