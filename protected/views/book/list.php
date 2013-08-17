<?php
/* @var $this BookController */

$this->breadcrumbs=array(
	'Book'=>array('/book'),
	'List',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#book-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<h1>Manage Books</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'book-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			  'name'=>'title',
			  'type'=>'html',
			  'value'=>'CHtml::link($data->title, array(\'book/view\', \'id\'=>$data->id_book))',
			 ),
		'description',
		'current_count',
		'total_count',
		'file_link',
		/*
		'year',
		*/
		array(
            'name'=>'id_author',
            'value'=>'$data->getAuthorsString()',
			'filter'=>Author::model()->forFilter,
        ),
	),
)); ?>