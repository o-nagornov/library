<?php
/* @var $this RecommendationController */
/* @var $data Recommendation */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_recommendation')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->book->title), array('/book/view', 'id'=>$data->book->id_book)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reason')); ?>:</b>
	<?php echo CHtml::encode($data->reason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id_user')); ?>:</b>
	<?php echo CHtml::encode($data->user->surname)." ".CHtml::encode($data->user->name)." ".CHtml::encode($data->user->parentname); ?>
	<br />

	<?php
		echo CHtml::link('Убрать рекомендацию', array('/recommendation/remove', 'id' => $data->id_recommendation));
	?>
	
	<?php
		$this->widget('application.components.BookStatusWidget', array('book'=>$data->book));
	?>
	
	
</div>