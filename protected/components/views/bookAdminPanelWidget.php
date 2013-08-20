<h5>Заявки на выдачу</h5>
<?php

	echo "<table>";
	foreach ($toGiveQueries as $query)
	{
		echo "<tr>";
		echo "<td>".$query->user->surname." ".$query->user->name." ".$query->user->parentname."</td>";
		echo "<td>".CHtml::link(CHtml::button("Выдать", array('class'=>'btn btn-small btn-block')), array('/query/give', 'query'=>$query->id_query))."</td>";
		echo "<td>".CHtml::beginForm(CHtml::normalizeUrl(array('/query/cancel')), 'get', array('id'=>'cancel-form'))
			.CHtml::hiddenField('query', $query->id_query, array('id'=>'query_'.$query->id_query))
			.CHtml::textField('text', '', array('id'=>'text_'.$query->id_query))
			.CHtml::submitButton('Отменить', array('name'=>'', 'class'=>'btn btn-small btn-block'))
			.CHtml::endForm()."</td>";
		echo "</tr>";
	}
	echo "</table>";
?>

<h5>Заявки на прием</h5>
<?php

	if (sizeof($toReciveQueries) == 0)
	{
		echo "Заявок нет";
	}
	else
	{
		echo "<table>";
		foreach ($toReciveQueries as $query)
		{
			echo "<tr>";
			echo "<td>".$query->user->surname." ".$query->user->name." ".$query->user->parentname."</td>";
			echo "<td>".CHtml::link(CHtml::button("Принять", array('class'=>'btn btn-small btn-block')), array('/query/recive', 'query'=>$query->id_query))."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
?>
<h5>Управление</h5>
<div class="row-fluid">
	<div class="span6">
		<?php echo CHtml::link(CHtml::button("Добавить", array('class'=>'btn btn-small btn-block')), array('/query/credit', 'book'=>$book->id_book)); ?>
	</div>
	<div class="span6">
		<?php echo CHtml::link(CHtml::button("Списать", array('class'=>'btn btn-small btn-block')), array('/query/debit', 'book'=>$book->id_book));  ?>
	</div>
</div>