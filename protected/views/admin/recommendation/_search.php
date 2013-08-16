<?php
/* @var $this RecommendationController */
/* @var $model Recommendation */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_recommendation'); ?>
		<?php echo $form->textField($model,'id_recommendation'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reason'); ?>
		<?php echo $form->textField($model,'reason',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'book_id_book'); ?>
		<?php echo $form->textField($model,'book_id_book'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'target_id_user'); ?>
		<?php echo $form->textField($model,'target_id_user'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'user_id_user'); ?>
		<?php echo $form->textField($model,'user_id_user'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->