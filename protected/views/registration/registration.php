<?php
/* @var $this RegistrationController */

$this->breadcrumbs=array(
	'Регистрация',
);
?>
<div class="signin">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'user-form',
		'enableAjaxValidation'=>false,
		'htmlOptions'=>array(
							 'class'=>'form-horizontal'
							),
	)); ?>
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
					<?php echo $form->labelEx($model,'name', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'name',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'name'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'surname', array('class'=>'control-label')); ?>
					<div class="controls">
						<?php echo $form->textField($model,'surname', array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'surname'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'parentname', array('class'=>'control-label')); ?>
					<div class="controls">	  
						<?php echo $form->textField($model,'parentname',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'parentname'); ?>
					</div>
				</div>
				<div class="control-group">
					<?php echo $form->labelEx($model,'email', array('class'=>'control-label')); ?>
					<div class="controls">  	
						<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'email'); ?>
					</div>
				</div>

				<div class="control-group">
					<?php echo $form->labelEx($model,'pass', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo $form->passwordField($model,'pass',array('size'=>45,'maxlength'=>45)); ?>
						<?php echo $form->error($model,'pass'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group">
					<div class="controls">
						<?php echo CHtml::submitButton('Зарегистрироваться', array('class'=>'btn')); ?>
					</div>
				</div>
			</div>
		</div>
		
	<?php $this->endWidget(); ?>
</div>