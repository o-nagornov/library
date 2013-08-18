<?php
/* @var $this RegistrationController */

$this->breadcrumbs=array(
	'Registration'=>array('/registration'),
	'Message',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<h5>
	На адрес <?php echo $email; ?> отправлено сообщение с кодом подтверждения
</h5>
