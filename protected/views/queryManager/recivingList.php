<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Управление заявками'=>array('/queryManager'),
	'Заявки на возврат',
);
?>
<?php
	$this->widget('application.components.RecivingQueryListWidget');
?>