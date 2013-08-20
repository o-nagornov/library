<div class="signin">
	<?php
		echo CHtml::beginForm(CHtml::normalizeUrl(array('/recommendation/add')), 'get', array('id'=>'recommendation-form', 'class'=>'form-horizontal'));
		echo CHtml::hiddenField('book', $bookId, array('id'=>'book'));
		echo CHtml::hiddenField('targetuser', '0', array('id'=>'targetuser'));
	?>
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo CHtml::label('Название', 'title', array('class'=>'control-label')); ?>
					<div class="controls">		
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
							));
						?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Мнение', 'reason', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textArea('reason', '', array('id'=>'reason')); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="span4">
				<div class="control-group">
					<div class="controls">
						<?php echo CHtml::submitButton('Искать!', array('name'=>'', 'class'=>'btn')); ?>
					</div>
				</div>
			</div>
		</div>		
	<?php echo CHtml::endForm(); ?>
</div>