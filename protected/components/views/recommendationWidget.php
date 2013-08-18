<?php

echo CHtml::beginForm(CHtml::normalizeUrl(array('/recommendation/add')), 'get', array('id'=>'recommendation-form'))
    ."<br>Кому".CHtml::hiddenField('book', $bookId, array('id'=>'book'))
	."<br>Кому".CHtml::hiddenField('targetuser', '0', array('id'=>'targetuser'));
	$this->widget('zii.widgets.jui.CJuiAutoComplete', array(
															'name'=>'name',
															'source'=>Yii::app()->createUrl('/site/autocomplete'),
															'options'=>array(
																			 'minLength'=>2,
																			 'showAnim'=>'fold',
																			 'select' =>'js: function(event, ui) {
            // действие по умолчанию, значение текстового поля
            // устанавливается в значение выбранного пункта
            this.value = ui.item.label;
            // устанавливаем значения скрытого поля
            $(\'#targetuser\').val(ui.item.id);
            return false;
        }',
																			 ),
															));
	
echo "<br>Мнение".CHtml::textArea('reason', '', array('id'=>'reason'))
    ."<br>".CHtml::submitButton('Search', array('name'=>''))
    .CHtml::endForm();

?>