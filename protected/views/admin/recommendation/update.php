<?php
/* @var $this RecommendationController */
/* @var $model Recommendation */

$this->breadcrumbs=array(
	'Recommendations'=>array('index'),
	$model->id_recommendation=>array('view','id'=>$model->id_recommendation),
	'Update',
);

$this->menu=array(
	array('label'=>'List Recommendation', 'url'=>array('index')),
	array('label'=>'Create Recommendation', 'url'=>array('create')),
	array('label'=>'View Recommendation', 'url'=>array('view', 'id'=>$model->id_recommendation)),
	array('label'=>'Manage Recommendation', 'url'=>array('admin')),
);
?>

<h1>Update Recommendation <?php echo $model->id_recommendation; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>