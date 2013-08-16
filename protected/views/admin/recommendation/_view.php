<?php
/* @var $this RecommendationController */
/* @var $data Recommendation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_recommendation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_recommendation), array('view', 'id'=>$data->id_recommendation)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id_book')); ?>:</b>
	<?php echo CHtml::encode($data->book_id_book); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('target_id_user')); ?>:</b>
	<?php echo CHtml::encode($data->target_id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id_user')); ?>:</b>
	<?php echo CHtml::encode($data->user_id_user); ?>
	<br />


</div>