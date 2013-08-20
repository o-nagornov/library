<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Управление заявками',
);
?>
<h3>Заявки на выдачу</h3>

<?php
	$this->widget('application.components.GettingQueryListWidget', array('limit'=>10));
?>
<h3>Заявки для возврата</h3>

<?php
	$this->widget('application.components.RecivingQueryListWidget', array('limit'=>10));
?>