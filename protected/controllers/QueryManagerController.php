<?php

class QueryManagerController extends Controller
{
	public function actionGettingList()
	{
		$this->render('gettingList');
	}

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionRecivingList()
	{
		$this->render('recivingList');
	}

	public function actionView($id)
	{
		$query = Query::model()->findByPk($id);
		
		$status = $query->getQueryStatus();
		
		$this->render('view', array('query' => $query));
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