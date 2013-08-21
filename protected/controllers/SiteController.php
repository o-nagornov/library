<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function actionAutocomplete()
	{
		
		$term = Yii::app()->getRequest()->getParam('term');
		
		if (Yii::app()->request->isAjaxRequest && $term)
		{
         
			$criteria = new CDbCriteria;
			$criteria->addSearchCondition("CONCAT_WS(' ', surname, name, parentname)", $term, true, 'AND', 'LIKE');
			$criteria->addSearchCondition("id_user", Yii::app()->user->id, true, 'AND', 'NOT LIKE');

			
			$users = User::model()->findAll($criteria);

			$result = array();
			foreach ($users as $user) {
				$result[] = array(
					'label' => $user->surname." ".$user->name." ".$user->parentname,
					'value' => $user->surname." ".$user->name." ".$user->parentname,
					'id' => $user->id_user,
				);
			}
			
			
			echo CJSON::encode($result);
			Yii::app()->end();
		}
	}
	
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if (Yii::app()->user->isGuest)
		{
			$this->actionLogin();
		}
		else
		{
			$this->render('index');
		}
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionInstall() {
 
		$auth=Yii::app()->authManager;
		 
		//сбрасываем все существующие правила
		$auth->clearAll();

		$root = $auth->createRole('root');
		$admin = $auth->createRole('admin');
		$user = $auth->createRole('user');
		
		$admin->addChild('user');
		$root->addChild('admin');
		
		$auth->assign('root', 1);
	 
		//сохраняем роли и операции
		$auth->save();
		 
		$this->render('index');
	}
}