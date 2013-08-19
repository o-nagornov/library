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
		 
		//Операции управления пользователями.
		$auth->createOperation('createUser', 'создание пользователя');
		$auth->createOperation('viewUsers', 'просмотр списка пользователей');
		$auth->createOperation('readUser', 'просмотр данных пользователя');
		$auth->createOperation('updateUser', 'изменение данных пользователя');
		$auth->createOperation('deleteUser', 'удаление пользователя');
		$auth->createOperation('changeRole', 'изменение роли пользователя');
		 
		$bizRule='return Yii::app()->user->id==$params["user"]->u_id;';
		$task = $auth->createTask('updateOwnData', 'изменение своих данных', $bizRule);
		$task->addChild('updateUser');
	 
		//создаем роль для пользователя admin и указываем, какие операции он может выполнять
		$role = $auth->createRole('admin');
		$role->addChild('createUser');
		$role->addChild('viewUsers');
		$role->addChild('readUser');
		$role->addChild('updateOwnData');
		 
		//все пользователи будут создаваться по-умолчанию с ролью user,
		//только root может менять роль другого пользователя
		 
		//создаем роль для пользователя root 
		$role = $auth->createRole('root');
		//наследуем операции, определённые для admin'а и добавляем новые
		$role->addChild('admin');
		$role->addChild('updateUser');
		$role->addChild('deleteUser');
		$role->addChild('changeRole');
		 
		//создаем операции для user'а
		$bizRule='return Yii::app()->user->id==$params["contact"]->c_user_id;';
		 
		$auth->createOperation('createContact','создание контакта');
		$auth->createOperation('viewContacts','просмотр списка контактов');
		$auth->createOperation('readContact','просмотр контакта', $bizRule);
		$auth->createOperation('updateContact','редактирование контакта',$bizRule);
		$auth->createTask('deleteContact','удаление контакта',$bizRule);

		 
		//создаем роль user и добавляем операции для неё
		$user = $auth->createRole('user');
	 
		$user->addChild('createContact');
		$user->addChild('viewContacts');
		$user->addChild('readContact');
		$user->addChild('updateContact');
		$user->addChild('deleteContact');
		$user->addChild('updateOwnData');
		
		
		$auth->assign('root', 1);
	 
		//сохраняем роли и операции
		$auth->save();
		 
		$this->render('index');
	}
}