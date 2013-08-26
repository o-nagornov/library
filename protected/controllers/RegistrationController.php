<?php

class RegistrationController extends Controller
{
	public function actionApprove($hash, $email)
	{
		$user = User::model()->find("email=:email", array(':email'=>$email));
		
		$status = "";
		
		if (!$user)
		{
			$status = "notregisted";
		}
		else
		{
			if ($hash = $user->check_hash)
			{
				$status = "ok";
				$user->role = 'user';
				$user->save();
			}
			else
			{
				$status = "badcode";
			}
		}
		
		$this->render('approve', array(
									  'status' => $status
									  ));
	}
	
	public function actionRegister()
	{
		$model = new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			$model->pass = md5($model->pass);
			$model->check_hash = md5($model->email.$model->pass);
			$model->role = 'guest';

			try
			{
				if ($oldModel = User::model()->find('email=:email', array(':email'=>$model->email)))
				{
					if ($oldModel)
					{
						if ($oldModel->role == 'guest')
						{
							$oldModel->delete();
						}
					}
				}
				
				if ($model->save())
				{
					if ($this->sendApprove($model) != 1)
					{
						Yii::app()->user->setFlash('error', 'Извините, невозможно отправить подтверждение. Попробуйте загеристироваться позже.');
						$this->render('registration',array(
							'model'=>$model,
						));
						return;
					}
					$this->redirect(array('/registration/message', 'email' => $model->email));	
				}
			}
			catch (CDbException $e)
			{
				$model->addError('email', 'Такой email уже зарегистрирован');
				$model->pass = '';
			}
		}

		$this->render('registration',array(
			'model'=>$model,
		));
	}
	
	public function actionIndex()
	{
		$this->actionRegister();
	}

	public function actionMessage($email)
	{
		$this->render('message', array(
									   'email' => $email,
									   ));
	}
	
	protected function sendApprove($user)
	{
		$hash = $user->check_hash;
		$email = $user->email;
		
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
				
		$mailer->Host = 'smtp.yandex.ru';
		$mailer->Port = 25;
		$mailer->Username = 'oin.73';
		$mailer->Password = 'farcry';
		$mailer->SMTPAuth = true;
		$mailer->IsSMTP();
		$mailer->IsHTML(true);
		$mailer->From = 'oin.73@yandex.ru';

		$mailer->AddAddress($user->email);
		
		$mailer->FromName = "Library";
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = 'Подтверждение регистрации';
		$mailer->Body = "
Для подтверждения регистрации, перейдите, пожалуйста, по ссылке:
".CHtml::link('подтвердить регистрацию', array('/registration/approve', 'hash' => $hash, 'email'=> $email));
				
		return $mailer->Send() . $mailer->ErrorInfo;
	}
}