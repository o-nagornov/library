<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Query Manager'=>array('/queryManager'),
	'RecivingList',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<p>Заявки на Получение</p>

<?php
	$this->widget('application.components.RecivingQueryListWidget');
?>