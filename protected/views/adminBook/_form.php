<?php
/* @var $this AdminBookController */
/* @var $model Book */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm',array(
			'htmlOptions' => array('enctype' => 'multipart/form-data'),
			'id'=>'book-form',
			'enableAjaxValidation'=>false,
		));
	?>

		<div class="row">
			<div class="span1"></div>
			<div class="span3">
				<p class="note">Поля, отмеченные <span class="required">*</span> - обязательные</p>
				<?php echo $form->errorSummary($model); ?>
			</div>
		</div>
	
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo $form->labelEx($model,'title', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'title',array('size'=>45,'maxlength'=>100, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'title'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'authorsString', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'authorsString',array('size'=>45,'maxlength'=>200, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'authorsString'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'typesString', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'typesString',array('size'=>45,'maxlength'=>200, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'typesString'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'keywordsString', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'keywordsString',array('size'=>45,'maxlength'=>200, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'keywordsString'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'description', array('class'=>'control-label')); ?>
					<div class="controls">				
						<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'description'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'year', array('class'=>'control-label')); ?>
					<div class="controls">  		
						<?php echo $form->textField($model,'year', array('class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'year'); ?>
					</div>
				</div>
								
				<div class="control-group">
					<?php echo $form->labelEx($model,'image_link', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php if($model->image_link): ?>
							<p><?php echo CHtml::encode($model->image_link); ?></p>
						<?php endif; ?>
						<?php echo $form->fileField($model,'image_link',array('size'=>45,'maxlength'=>145, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'image_link'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'file_link', array('class'=>'control-label')); ?>
					<div class="controls">	  
						<?php if($model->file_link): ?>
							<p><?php echo CHtml::encode($model->file_link); ?></p>
						<?php endif; ?>
						
						<?php echo $form->fileField($model,'file_link',array('size'=>45,'maxlength'=>145, 'class'=>'input-xxlarge')); ?>
						<?php echo $form->error($model,'file_link'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group">
					<div class="controls">
						<?php echo CHtml::submitButton(($model->isNewRecord ? 'Создать' : 'Сохранить'), array('class'=>'btn')); ?>
					</div>
				</div>
			</div>
		</div>

<?php $this->endWidget(); ?>

</div><!-- form -->