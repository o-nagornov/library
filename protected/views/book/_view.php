<?php
/* @var $this BookController */
/* @var $data Book */
?>

<div class="view">
	<?php
		if ($data->image_link != '')
		{
			echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$data->image_link), array('/book/view', 'id'=>$data->id_book));
		} else {
			echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg'), array('/book/view', 'id'=>$data->id_book));
		}
	?>

	<?php echo CHtml::link(CHtml::encode($data->title), array('view', 'id'=>$data->id_book)); ?>
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