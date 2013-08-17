<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_book')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_book), array('view', 'id'=>$data->id_book)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_count')); ?>:</b>
	<?php echo CHtml::encode($data->current_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_count')); ?>:</b>
	<?php echo CHtml::encode($data->total_count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_link')); ?>:</b>
	<?php echo CHtml::encode($data->file_link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('year')); ?>:</b>
	<?php echo CHtml::encode($data->year); ?>
	<br />
	
	<?php
		$this->widget('application.components.BookStatusWidget', array('book'=>$data));
	?>

</div>