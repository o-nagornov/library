<?php

class BookController extends Controller
{

	public function actionIndex( $string = '' )
	{
	    $criteria = new CDbCriteria();
	    if( strlen( $string ) > 0 ) {
	        $criteria->addSearchCondition('title', $string, true, 'OR' );
	    }
	    $dataProvider = new CActiveDataProvider('Book', array( 'criteria' => $criteria, ) );
	    $this->render('index', array( 'dataProvider' => $dataProvider ) );
}
	

	public function actionList()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book'])) {
			$model->setAttributes($_GET['Book'], false);
			$model->id_author = isset($_GET['Book']['id_author']) ? $_GET['Book']['id_author'] : '';

		}
		$this->render('list',array('model'=>$model));
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