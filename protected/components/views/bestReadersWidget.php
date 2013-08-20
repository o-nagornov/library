<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'query-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		array(
			'header' => 'ФИО',
			'value' => '$data->user->surname." ".$data->user->name." ".$data->user->parentname'
			 ),
	),
));
?>