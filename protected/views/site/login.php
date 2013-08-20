<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Авторизация',
);
?>
<div class="signin">
	<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions'=>array(
		'class'=>'form-horizontal'
	),
	)); ?>
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo $form->labelEx($model,'username', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo $form->textField($model,'username'); ?>
						<?php echo $form->error($model,'username'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->labelEx($model,'password', array('class'=>'control-label')); ?>
					<div class="controls">								
						<?php echo $form->passwordField($model,'password'); ?>
						<?php echo $form->error($model,'password'); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo $form->label($model,'rememberMe', array('class'=>'control-label')); ?>
					<div class="controls">	  
						<?php echo $form->checkBox($model,'rememberMe'); ?>
						<?php echo $form->error($model,'rememberMe'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group">
					<div class="controls">
						<?php echo CHtml::submitButton('Авторизироваться', array('class'=>'btn')); ?>
						<br />
						<?php echo CHtml::link('Зарегистрироваться', array('/registration')); ?>
					</div>
				</div>
			</div>
		</div>		
	<?php $this->endWidget(); ?>
</div>