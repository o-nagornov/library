<?php

class QueryController extends Controller
{
	public function actionIndex()
	{
		$booksRequests = Query::model()->findAll('user_id=:user_id', array(':user_id' => Yii::app()->user->id));
		
		$queries = array();
		
		foreach ($booksRequests as $bookRequest)
		{
			$totalCount = Query::model()->count('book_id=:book_id AND (status=\'new\' OR status=\'given\')', array(':book_id' => $bookRequest->book_id));
			$beforeMeCount = Query::model()->count('book_id=:book_id AND creation_date < :query_date AND status=\'new\'', array(':book_id' => $bookRequest->book_id, ':query_date' => $bookRequest->creation_date));
			$afterMeCount = Query::model()->count('book_id=:book_id AND creation_date > :query_date', array(':book_id' => $bookRequest->book_id, ':query_date' => $bookRequest->creation_date));
			
			$status = null;
			
			
			if ($bookRequest->status == 'new') {
				if ($beforeMeCount + $afterMeCount + 1 == $totalCount) {
					$status = "Могу забрать!";
				} else {
					$query = Query::model()->find('book_id=:book_id AND status=\'given\' AND creation_date < :query_date', array(':book_id' => $bookRequest->book_id, ':query_date' => $bookRequest->creation_date));
					$status = "Носитель книги: ".$query->user->name." ".$query->user->surname;
				}
			} else if ($bookRequest->status == 'given') {
				$status = "Книга у меня";
			} else if ($bookRequest->status == 'canseled') {
				$status = "Обнулена: ".$bookRequest->comment;
			}
				
				
			
			$queries[] = array ('totalCount' => $totalCount,
								'beforeMeCount' => $beforeMeCount,
								'afterMeCount' => $afterMeCount,
								'status' => $status,
								'query' => $bookRequest,
								);
		}
		
		$this->render('index', array('queries' => $queries));
	}

	public function actionAbadon($id)
	{
		$book = Book::model()->findByPk($id);
		$query = Query::model()->find("book_id=:book_id AND user_id=:user_id", array(':book_id'=>$book->id_book, ':user_id'=>Yii::app()->user->id));
		$query->delete();
		/*$query->status = 'abadoned';
		$quert->save();*/
		
		$this->redirect(array('query/index'));
	}
	
	public function actionRequest($id)
	{
		$request = new Query();
		$request->status = 'new';
		$request->book_id = $id;
		$request->user_id = Yii::app()->user->id;
		
		if ($request->save()) {
			$this->redirect(array('query/index'));	
		} else {
			throw new CException('Извините, произошла ошибка и ваша заявка не добавлена.');
		}
		
	}
	
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}