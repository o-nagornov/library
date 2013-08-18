<?php

class QueryController extends Controller
{
	
	public function actionIndex($title='', $name='')
	{
	    $criteria = new CDbCriteria();
		$criteria->with = array('user', 'book');
		
		$criteria->together = true;
		
		$criteria->addSearchCondition('user_id', Yii::app()->user->id, true, 'AND', 'LIKE');
		
		if (strlen($title) > 0)
		{
			$criteria->addSearchCondition('title', $title, true, 'AND', 'LIKE');
		}
		if (strlen($name) > 0)
		{
			$criteria->addSearchCondition("CONCAT_WS(' ', name, surname, parentname)", $name, true, 'AND', 'LIKE');
		}
		
		$dataProvider = new CActiveDataProvider('Query', array('criteria' => $criteria));
	    $this->render('index', array(
									 'dataProvider' => $dataProvider,
									 ));
	}
	
	public function actionBooks()
	{
		$this->render('booksList');
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