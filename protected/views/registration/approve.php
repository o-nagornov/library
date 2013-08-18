<?php
/* @var $this RegistrationController */

$this->breadcrumbs=array(
	'Registration'=>array('/registration'),
	'Approve',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<h5>
<?php
	switch ($status)
	{
		case 'ok':
			echo "Ваша запись успешно активирована";
			break;
		case 'notregisted':
			echo "Вам пришло ошибочное сообщение, обратитесь к администратору";
			break;
		case 'badcode':
			echo "Вам пришло ошибочное сообщение, обратитесь к администратору";
			break;
	}
?>
</h5>