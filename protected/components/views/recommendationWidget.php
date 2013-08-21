<div class="registration">
	<?php
		echo CHtml::beginForm(CHtml::normalizeUrl(array('/recommendation/add')), 'get', array('id'=>'recommendation-form', 'class'=>'form-horizontal'));
		echo CHtml::hiddenField('book', $bookId, array('id'=>'book'));
		echo CHtml::hiddenField('targetuser', '0', array('id'=>'targetuser'));
	?>
	<?php
		$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
			'name'=>'name',
				'source'=>Yii::app()->createUrl('/site/autocomplete'),
				'options'=>array(
					'minLength'=>2,
					'showAnim'=>'fold',
					'select' =>'js: function(event, ui) {
						this.value = ui.item.label;
						$(\'#targetuser\').val(ui.item.id);
						return false;
					}',
				),
				'htmlOptions'=>array(
					'placeHolder'=>'ФИО "цели"',
					'class'=>'input-xlarge',
					),
			));
		?>
		<br />
		<?php echo CHtml::textArea('reason', '', array('id'=>'reason', 'placeHolder'=>'Рекомендация"', 'class'=>'input-xlarge')); ?>
		<br />
		<?php echo CHtml::submitButton('Рекомендовать!', array('name'=>'', 'class'=>'btn')); ?>

	<?php echo CHtml::endForm(); ?>
</div>