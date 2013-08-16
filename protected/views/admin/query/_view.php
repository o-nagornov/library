<?php
/* @var $this QueryController */
/* @var $data Query */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_query')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_query), array('view', 'id'=>$data->id_query)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creation_date')); ?>:</b>
	<?php echo CHtml::encode($data->creation_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id_book')); ?>:</b>
	<?php echo CHtml::encode($data->book_id_book); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id_user')); ?>:</b>
	<?php echo CHtml::encode($data->user_id_user); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />


</div>