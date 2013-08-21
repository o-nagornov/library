<h5>Заявки на выдачу</h5>
<?php

	echo "<table>";
	foreach ($toGiveQueries as $query)
	{
		echo "<tr>";
		echo "<td>".$query->user->surname." ".$query->user->name." ".$query->user->parentname."</td>";
		echo "<td>".CHtml::link("Обработать", array("/queryManager/view", "id"=>$query->id_query))."</td>";
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
			echo "<td>".CHtml::link(CHtml::button("Принять", array('class'=>'btn')), array('/query/recive', 'query'=>$query->id_query))."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
?>
<h5>Управление</h5>
<div class="row-fluid">
	<div class="span6">
		<?php echo CHtml::link(CHtml::button("Добавить", array('class'=>'btn btn-block')), array('/query/credit', 'book'=>$book->id_book)); ?>
	</div>
	<div class="span6">
		<?php echo CHtml::link(CHtml::button("Списать", array('class'=>'btn btn-block')), array('/query/debit', 'book'=>$book->id_book));  ?>
	</div>
</div>