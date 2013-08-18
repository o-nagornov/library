<?php

class BookController extends Controller
{

	public function actionIndex($title='', $authors='', $keywords='', $type='', $description='', $year='')
	{
	    $criteria = new CDbCriteria();
		$criteria->with = array('authors', 'types', 'keywords');
		
		$criteria->together = true;
		
		if (strlen($title) > 0)
		{
			$criteria->addSearchCondition('title', $title, true, 'AND', 'LIKE');
		}
		if (strlen($authors) > 0)
		{
			$criteria->addSearchCondition('name', $authors, true, 'AND', 'LIKE');
		}
		if (strlen($keywords) > 0)
		{
			$criteria->addSearchCondition('word', $keywords, true, 'AND', 'LIKE');
		}
		if (strlen($type) > 0)
		{
			$criteria->addSearchCondition('id_type', $type, true, 'AND', 'LIKE');
		}
		if (strlen($description) > 0)
		{
			$criteria->addSearchCondition('description', $description, true, 'AND', 'LIKE');
		}
		if (strlen($year) > 0)
		{
			$criteria->addSearchCondition('year', $year, true, 'AND', 'LIKE');
		}

	    $dataProvider = new CActiveDataProvider('Book', array('criteria' => $criteria));
	    $this->render('index', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
	
	public function actionView($id)
	{
		$book = Book::model()->findByPk($id);
		
		
		
		$thatBookCount = Query::model()->count('book_id=:book_id AND user_id=:user_id AND status=\'new\'', array(':book_id' => $id, ':user_id' => Yii::app()->user->id));
		$isOrdered = $thatBookCount > 0;

		$this->render('view', array('book'=>$book, 'isOrdered'=>$isOrdered));
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