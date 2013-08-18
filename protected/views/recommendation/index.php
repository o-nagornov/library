<?php
/* @var $this RecommendationController */

$this->breadcrumbs=array(
	'Recommendation',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php

	if ($dataProvider->totalItemCount == 0)
	{
		echo "<h5>У вас нет рекомендованных книг</h5>";
	} else {
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,	
			'itemView'=>'_view',
			'sortableAttributes'=>array(
				'id'=>'cronologico',
				'transaction'
			),
			'id'=>'ajaxListView',
		));
	}
?>