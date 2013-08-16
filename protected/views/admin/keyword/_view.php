<?php
/* @var $this KeywordController */
/* @var $data Keyword */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_keyword')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_keyword), array('view', 'id'=>$data->id_keyword)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('word')); ?>:</b>
	<?php echo CHtml::encode($data->word); ?>
	<br />


</div>