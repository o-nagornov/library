<?php
/* @var $this BookController */

$this->breadcrumbs=array(
	'Поиск книг',
);

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
						<?php echo CHtml::textField('year', (isset($_GET['year'])) ? $_GET['year'] : '', array('id'=>'year')); ?>
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
<?php
if ($dataProvider->totalItemCount == 0)
{
	echo "<h5>Нет популярных книг</h5>";
} else {
	$this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,	
		'itemView'=>'_view',
		'itemsTagName'=>'ul',
		'tagName'=>'span',
		'itemsCssClass'=>'books unstyled',
		'id'=>'ajaxListView',
		'htmlOptions'=>array('class'=>'books unstyled'),
		'summaryText'=>'',
		'sorterHeader'=>'',
		'sorterFooter'=>'',
		'sortableAttributes'=>'',
		'cssFile'=>false,
		'pager'=>array(
			//'cssFile'=>false,
			'header'=>'Перейти на страницу:',
			'firstPageLabel'=>'На первую',
			'lastPageLabel'=>'На последнюю',
			'nextPageLabel'=>'На следующую',
			'prevPageLabel'=>'На предыдущую',
		),
	));	
}

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
	$('input#authors').keyup(function(){
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
	$('input#keywords').keyup(function(){
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
	$('input#type').change(function(){
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
	$('input#description').keyup(function(){
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
	$('input#year').keyup(function(){
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
