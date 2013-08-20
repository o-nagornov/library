<?php
/* @var $this QueryController */

$this->breadcrumbs=array(
	'Книги',
);
?>

<?php
	$this->widget('application.components.MyBooksWidget', array('limit' => -1));
?>