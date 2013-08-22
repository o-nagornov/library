<?php
/* @var $this AdminBookController */
/* @var $model Book */

$this->breadcrumbs=array(
	'Книги'=>array('/book/index'),
	$model->title=>array('view','id'=>$model->id_book),
	'Изменение',
);

?>

<h3>Изменение книги "<?php echo $model->title; ?>"</h3>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>