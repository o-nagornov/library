<?php
/* @var $this RecommendationController */
/* @var $model Recommendation */

$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->id_recommendation,
);

$this->menu=array(
	array('label'=>'List Recommendation', 'url'=>array('index')),
	array('label'=>'Create Recommendation', 'url'=>array('create')),
	array('label'=>'Update Recommendation', 'url'=>array('update', 'id'=>$model->id_recommendation)),
	array('label'=>'Delete Recommendation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_recommendation),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Recommendation', 'url'=>array('admin')),
);
?>

<h1>View Recommendation #<?php echo $model->id_recommendation; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_recommendation',
		'reason',
		'book_id',
		'target_user_id',
		'user_id',
	),
)); ?>
