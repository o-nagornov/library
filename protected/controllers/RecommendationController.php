<?php

class RecommendationController extends Controller
{
	public function actionAdd($book, $targetuser, $reason)
	{
		$recommendation = new Recommendation();
		$recommendation->book_id = $book;
		$recommendation->target_user_id = $targetuser;
		$recommendation->reason = $reason;
		$recommendation->user_id = Yii::app()->user->id;
		
		$recommendation->save();
		
		
		$this->redirect(array('book/view', 'id' => $book));
	}

	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria->with = array('user', 'book');
		
		$criteria->together = true;
		
		$criteria->addCondition('target_user_id='.Yii::app()->user->id);
		
		$dataProvider = new CActiveDataProvider('Recommendation', array('criteria' => $criteria));
	    $this->render('index', array(
									 'dataProvider' => $dataProvider,
									 ));
	}

	public function actionRemove($id)
	{
		$recommendation = Recommendation::model()->findByPk($id);
		$recommendation->delete();
		/*$query->status = 'abadoned';
		$quert->save();*/
		
		$this->redirect(array('recommendation/index'));
	
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