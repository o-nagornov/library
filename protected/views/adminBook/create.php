<?php
/* @var $this AdminBookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('/book/index'),
	'Создание',
);

?>

<h3>Создание книги</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>