<?php
/* @var $this QueryController */
/* @var $data Query */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('book_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->book_id), array('view', 'id'=>$data->book_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->book->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->user->surname)." ".CHtml::encode($data->user->name)." ".CHtml::encode($data->user->parentname); ?>
	<br />
	
	<?php
		$this->widget('application.components.BookStatusWidget', array('book'=>$data->book));
	?>

</div>