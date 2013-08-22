<h6>
<?php
	switch ($status)
	{
		case 'new':
			echo 'Вы уже оставили заявку. ';
			echo CHtml::link('Отказаться.', array('query/abadon', 'id'=>$bookId));
			break;
		case 'given':
			echo 'Книга уже у Вас';
			break;
		case 'request':
			echo CHtml::link('Оставить заявку', array('query/request', 'id'=>$bookId));
			break;
		case 'download':
			echo CHtml::link(CHtml::button('Скачать', array('class'=>'btn')), Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$filelink);
			break;
	}
?>
<?php
	/*if ($status != 'download')
	{
		switch ($queueStatus)
		{
			case 'last':
				echo "Вы последний в очереди.";
				break;
			case 'first':
				echo "Вы первый в очереди!";
				break;
			case 'queue':
				if ($beforeCount != 0)
				{
					echo "Вы в очереди, до Вас: $beforeCount";
				} else {
					echo "Вы первый в очереди!";
				}
				break;
		}
	}*/
?>
<br />
<?php
	if ($status != 'download' && $status != 'given')
	{
		switch ($gettindStatus)
		{
			case 'available':
				echo 'Можно забрать.';
				break;
			case 'requestFirst':
				echo 'Оставьте заявку и забирайте.';
				break;
			case 'notAvailable':
				echo 'Придется подождать.';
				break;
		}
	}
?>
</h5>