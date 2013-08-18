<?php
/* @var $this QueryController */
/* @var $data Query */
?>

<div class="view">
	<?php
		if ($data->book->image_link != '')
		{
			echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$data->book->image_link), array('/book/view', 'id'=>$data->book_id));
		} else {
			echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg'), array('/book/view', 'id'=>$data->book_id));
		}
	?>
	
	<?php echo CHtml::link(CHtml::encode($data->book->title), array('/book/view', 'id'=>$data->book_id)); ?>
	
	<!--<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->user->surname)." ".CHtml::encode($data->user->name)." ".CHtml::encode($data->user->parentname); ?>
	<br />-->
	
	<?php
		$this->widget('application.components.BookStatusWidget', array('book'=>$data->book));
	?>

</div>