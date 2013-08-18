<?php
/* @var $this QueryController */

$this->breadcrumbs=array(
	'Query',
);

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php

	$types[""] = "";
	$types += CHtml::listData(Type::model()->findAll(), 'id_type', 'type');
	
echo CHtml::beginForm(CHtml::normalizeUrl(array('/query/index')), 'get', array('id'=>'filter-form'))
    ."<br>Название".CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title'))
	."<br>У кого книга".CHtml::textField('name', (isset($_GET['name'])) ? $_GET['name'] : '', array('id'=>'name'))
    ."<br>".CHtml::submitButton('Search', array('name'=>''))
    .CHtml::endForm();

$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>'_view',
    'sortableAttributes'=>array(
        'id'=>'cronologico',
        'transaction'
    ),
    'id'=>'ajaxListView',
));


Yii::app()->clientScript->registerScript('search',
    "var ajaxUpdateTimeout;
    var ajaxRequest;
    $('input#title').keyup(function(){
        ajaxRequest = $('#filter-form').serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
                'ajaxListView',
                {data: ajaxRequest}
            )
        },
        300);
    });
	$('input#name').keyup(function(){
        ajaxRequest = $('#filter-form').serialize();
        clearTimeout(ajaxUpdateTimeout);
        ajaxUpdateTimeout = setTimeout(function () {
            $.fn.yiiListView.update(
                'ajaxListView',
                {data: ajaxRequest}
            )
        },
        300);
    });
	");
?>
