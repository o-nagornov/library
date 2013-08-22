<?php

class QueryController extends Controller
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
				'actions'=>array('index','books','abadon','request'),
				'roles'=>array('user'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('give','recive','cancel','debit','credit'),
				'roles'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionIndex($title='', $name='')
	{
	    $criteria = new CDbCriteria();
		$criteria->with = array('user', 'book');
		
		$criteria->together = true;
		
		$criteria->addCondition('user_id='.Yii::app()->user->id);
		
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
		
		if (!$request->save()) {
			Yii::app()->user->setFlash('error', 'Извините, ваша заявка не добавлена, пожалуйста, попытайтесь позже');
		}
		$this->redirect(array('query/index'));	
		
	}
	
	public function actionGive($query)
	{
		$query = Query::model()->findByPk($query);
		if ($query->status != 'new')
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя выдать - неверный статус заявки");
			$this->redirect(array('/book/view', 'id'=>$query->book_id));
			return;
		}
		
		$transaction = $query->dbConnection->beginTransaction();
		
		try
		{
			if ($query->book->current_count >= 1)
			{
				$query->book->current_count -= 1;
				$query->status = 'given';
				if ($query->book->save() && $query->save())
				{
					$transaction->commit();
				} else {
					Yii::app()->user->setFlash("error", "Книгу нельзя выдать - ошибка базы данных");
					$transaction->rollback();	
				}
			}
			else
			{
				Yii::app()->user->setFlash("error", "Книгу нельзя выдать - ее нет в наличии");
				$transaction->rollback();
			}
		}
		catch (Exception $e)
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя выдать - ее нет в наличии");
			$transaction->rollback();
		}
		
		$this->redirect(array('/book/view', 'id'=>$query->book_id));
	}
	
	public function actionRecive($query)
	{
		$query = Query::model()->findByPk($query);
		if ($query->status != 'given')
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя выдать - неверный статус заявки");
			$this->redirect(array('/book/view', 'id'=>$query->book_id));
			return;
		}
		
		$transaction = $query->dbConnection->beginTransaction();
		
		try
		{
			$query->book->current_count += 1;
			$query->status = 'returned';
			if ($query->book->save() && $query->save())
			{
				$transaction->commit();
			} else {
				Yii::app()->user->setFlash("error", "Книгу нельзя принять - ошибка базы данных");
				$transaction->rollback();	
			}
		}
		catch (Exception $e)
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя принять");
			$transaction->rollback();
		}
		
		$this->redirect(array('/book/view', 'id'=>$query->book_id));
	}
	
	public function actionCancel($query, $text)
	{
		$query = Query::model()->findByPk($query);
		
		$transaction = $query->dbConnection->beginTransaction();
		
		try
		{
			$query->status = 'сanceled';
			if ($query->save())
			{
				$transaction->commit();
			} else {
				Yii::app()->user->setFlash("error", "Заявку нельзя отменить - ошибка базы данных");
				$transaction->rollback();	
			}
		}
		catch (Exception $e)
		{
			Yii::app()->user->setFlash("error", "Заявку нельзя отменить - ошибка базы данных");
			$transaction->rollback();
		}
		
		$this->redirect(array('/book/view', 'id'=>$query->book_id));
	}
	
	public function actionDebit($book)
	{
		$book = Book::model()->findByPk($book);
		
		$transaction = $book->dbConnection->beginTransaction();
		
		try
		{
			if ($book->current_count <= 0)
			{
				Yii::app()->user->setFlash("error", "Книгу нельзя списать - ее не вернули");
				$transaction->rollback();	
			}
			else
			{
				$book->current_count -= 1;
				$book->total_count -= 1;
				if ($book->save())
				{
					$transaction->commit();
				} else {
					Yii::app()->user->setFlash("error", "Книгу нельзя списать - ошибка базы данных");
					$transaction->rollback();	
				}
			}
		}
		catch (Exception $e)
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя списать");
			$transaction->rollback();
		}
		
		$this->redirect(array('/book/view', 'id'=>$book->id_book));
	}
	
	public function actionCredit($book)
	{
		$book = Book::model()->findByPk($book);
		
		$transaction = $book->dbConnection->beginTransaction();
		
		try
		{
			$book->current_count += 1;
			$book->total_count += 1;
			if ($book->save())
			{
				$transaction->commit();
			} else {
				Yii::app()->user->setFlash("error", "Книгу нельзя добавить - ошибка базы данных");
				$transaction->rollback();	
			}
		}
		catch (Exception $e)
		{
			Yii::app()->user->setFlash("error", "Книгу нельзя добавить");
			$transaction->rollback();
		}
		
		$this->redirect(array('/book/view', 'id'=>$book->id_book));
	}
}