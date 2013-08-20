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
			  'type'=>'html',
			  'value'=>'CHtml::link(CHtml::encode($data->book->title), array("/book/view", "id"=>$data->book_id))',
			 ),
		array(
			  'header'=>'Статус заявки',
			  'value'=>'$data->getQueryStatus()',
			 ),
		array(
			  'header'=>'Действия',
			  'value'=>'CHtml::link("Перейти", array("/queryManager/view", "id"=>$data->id_query))',
			  'type'=>'html',
			 ),
		'comment',
		
	),
));
?>