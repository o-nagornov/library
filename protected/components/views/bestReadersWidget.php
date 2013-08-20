<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'query-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'header' => 'Наиболее активные',
			'value' => '$data->user->surname." ".$data->user->name." ".$data->user->parentname'
			 ),
	),
	'summaryText'=>'',
	'itemsCssClass'=>'',
));
?>