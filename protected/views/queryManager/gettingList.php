<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Управление заявками'=>array('/queryManager'),
	'Заявки на выдачу',
);
?>
<?php
	$this->widget('application.components.GettingQueryListWidget');
?>