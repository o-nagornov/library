<?php
/* @var $this QueryController */
/* @var $model Query */

$this->breadcrumbs=array(
	'Queries'=>array('index'),
	$model->id_query,
);

$this->menu=array(
	array('label'=>'List Query', 'url'=>array('index')),
	array('label'=>'Create Query', 'url'=>array('create')),
	array('label'=>'Update Query', 'url'=>array('update', 'id'=>$model->id_query)),
	array('label'=>'Delete Query', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_query),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Query', 'url'=>array('admin')),
);
?>

<h1>View Query #<?php echo $model->id_query; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_query',
		'creation_date',
		'status',
		'book_id',
		'user_id',
		'comment',
	),
)); ?>
