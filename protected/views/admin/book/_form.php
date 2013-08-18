<?php
/* @var $this BookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm',
		array(
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
			'id'=>'book-form',
			'enableAjaxValidation'=>false,
		));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'current_count'); ?>
		<?php echo $form->textField($model,'current_count'); ?>
		<?php echo $form->error($model,'current_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_count'); ?>
		<?php echo $form->textField($model,'total_count'); ?>
		<?php echo $form->error($model,'total_count'); ?>
	</div>

	<div class="row">
		<?php if($model->file_link): ?>
            <p><?php echo CHtml::encode($model->file_link); ?></p>
        <?php endif; ?>
		<?php echo $form->labelEx($model,'file_link'); ?>
		<?php echo $form->fileField($model,'file_link',array('size'=>45,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'file_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year'); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php if($model->image_link): ?>
            <p><?php echo CHtml::encode($model->image_link); ?></p>
        <?php endif; ?>
		<?php echo $form->labelEx($model,'image_link'); ?>
		<?php echo $form->fileField($model,'image_link',array('size'=>45,'maxlength'=>145)); ?>
		<?php echo $form->error($model,'image_link'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->checkBoxList($model, 'authorsArray', CHtml::listData(Author::model()->findAll(), 'id_author', 'name')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->checkBoxList($model, 'keywordsArray', CHtml::listData(Keyword::model()->findAll(), 'id_keyword', 'word')); ?>
	</div>
	
	<div class="row">
		<?php echo $form->checkBoxList($model, 'typesArray', CHtml::listData(Type::model()->findAll(), 'id_type', 'type')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->