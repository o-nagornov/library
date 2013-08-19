<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'query-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'creation_date',
		array(
			  'header' => 'Статус',
			  'name' => 'status',
			  'value' => '$data->getStatus()',
			  ),
		array(
			  'header'=>'ФИО',
			  'name'=>'user_search',
			  'value'=>'$data->user->surname." ".$data->user->name." ".$data->user->parentname',
			 ),
		array(
			  'header'=>'Книга',
			  'name'=>'book_search',
			  'value'=>'$data->book->title',
			 ),
		array(
			  'header'=>'Статус заявки',
			  'value'=>'$data->getQueryStatus()',
			 ),
		array(
			  'header'=>'Действия',
			  'value'=>'$data->getQueryActions()',
			  'type'=>'html',
			 ),
		'comment',
		
	),
));
?>