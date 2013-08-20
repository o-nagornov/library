<?php
/* @var $this QueryController */

$this->breadcrumbs=array(
	'Заявки',
);
?>

<div class="signin">
	<?php echo CHtml::beginForm(CHtml::normalizeUrl(array('/query/index')), 'get', array('id'=>'filter-form')); ?>
		<div class="row">
			<div class="span3">
				<div class="control-group">
					<?php echo CHtml::label('Название', 'title', array('class'=>'control-label')); ?>
					<div class="controls">		
						<?php echo CHtml::textField('title', (isset($_GET['title'])) ? $_GET['title'] : '', array('id'=>'title')); ?>
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
		echo "<h5>У вас нет заявок</h5>";
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
