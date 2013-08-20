<?php

	$types[""] = "";
	$types += CHtml::listData(Type::model()->findAll(), 'id_type', 'type');
?>	

<div class="signin">
	<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('/book/index')), 'get', array('id'=>'filter-form', 'class'=>'form-horizontal')); ?>
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo CHtml::label('Название', 'title', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Авторы', 'authors', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('authors', (isset($_GET['authors'])) ? $_GET['authors'] : '', array('id'=>'authors')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Ключевые слова', 'keywords', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('keywords', (isset($_GET['keywords'])) ? $_GET['keywords'] : '', array('id'=>'keywords')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Категория', 'title', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::dropDownList('type', (isset($_GET['type'])) ? $_GET['type'] : '', $types, array('id'=>'type')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Описание', 'description', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('description', (isset($_GET['description'])) ? $_GET['description'] : '', array('id'=>'description')); ?>
					</div>
				</div>
				
				<div class="control-group">
					<?php echo CHtml::label('Год издания', 'year', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('title', (isset($_GET['year'])) ? $_GET['year'] : '', array('id'=>'year')); ?>
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