<h5>
<?php
	switch ($status)
	{
		case 'new':
			echo 'Вы уже оставили заявку. ';
			echo CHtml::link('Отказаться', array('query/abadon', 'id'=>$bookId));
			break;
		case 'given':
			echo 'Книга уже у Вас';
			break;
		case 'request':
			echo CHtml::link('Оставить заявку', array('query/request', 'id'=>$bookId));
			break;
	}
?>
</h5>

<h5>
<?php
	switch ($queueStatus)
	{
		case 'last':
			echo "Вы последний.";
			break;
		case 'first':
			echo "Вы первый!";
			break;
		case 'queue':
			echo "Вы в очереди, до Вас: $beforeCount";
			break;
	}
?>
</h5>

<h5>
<?php
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
?>
</h5>