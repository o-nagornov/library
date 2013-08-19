<p>Выдать</p>
<?php

	echo "<table>";
	foreach ($toGiveQueries as $query)
	{
		echo "<tr>";
		echo "<td>".$query->user->surname." ".$query->user->name." ".$query->user->parentname."<td>";
		echo "<td>".CHtml::link(CHtml::button("Выдать"), array('/query/give', 'query'=>$query->id_query))."</td>";
		echo "<td>".CHtml::beginForm(CHtml::normalizeUrl(array('/query/cancel')), 'get', array('id'=>'cancel-form'))
			.CHtml::hiddenField('query', $query->id_query, array('id'=>'query_'.$query->id_query))
			.CHtml::textField('text', '', array('id'=>'text_'.$query->id_query))
			.CHtml::submitButton('Отменить', array('name'=>''))
			.CHtml::endForm()."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>

<p>Принять</p>
<?php
	echo "<table>";
	foreach ($toReciveQueries as $query)
	{
		echo "<tr>";
		echo "<td>".$query->user->surname." ".$query->user->name." ".$query->user->parentname."<td>";
		echo "<td>".CHtml::link(CHtml::button("Принять"), array('/query/recive', 'query'=>$query->id_query))."</td>";
		echo "</tr>";
	}
	echo "</table>";	
	
?>
<p>Управление</p>
<?php
	echo CHtml::link(CHtml::button("Добавить"), array('/query/credit', 'book'=>$book->id_book));
	echo CHtml::link(CHtml::button("Списать"), array('/query/debit', 'book'=>$book->id_book));
?>