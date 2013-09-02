<?php

class QueryManagerController extends Controller
{
	
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}
	
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('gettingList','index','recivingList','view'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
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
}