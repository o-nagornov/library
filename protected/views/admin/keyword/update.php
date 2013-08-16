<?php
/* @var $this KeywordController */
/* @var $model Keyword */

$this->breadcrumbs=array(
	'Keywords'=>array('index'),
	$model->id_keyword=>array('view','id'=>$model->id_keyword),
	'Update',
);

$this->menu=array(
	array('label'=>'List Keyword', 'url'=>array('index')),
	array('label'=>'Create Keyword', 'url'=>array('create')),
	array('label'=>'View Keyword', 'url'=>array('view', 'id'=>$model->id_keyword)),
	array('label'=>'Manage Keyword', 'url'=>array('admin')),
);
?>

<h1>Update Keyword <?php echo $model->id_keyword; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>