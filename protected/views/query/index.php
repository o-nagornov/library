<?php
/* @var $this QueryController */

$this->breadcrumbs=array(
	'Query',
);

?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php
	if (sizeof($queries) == 0) {
		echo "<h1>У вас нет заявок</h1>";
	} else {
		echo "
		<table>
			<tr>
				<td>Какая книга</td>
				<td>Книга доступна?</td>
				<td>Сколько до меня?</td>
				<td>Сколько после меня?</td>
				<td>Сколько всего?</td>
				<td>Убрать заявку</td>
			</tr>
		";
		
		foreach ($queries as $query) {
			$book = $query['query']->book;
			echo "<tr>
					<td>".CHtml::link($book->title, array("/book/view", "id"=>$book->id_book))."</td>
					<td>".$query['status']."</td>
					<td>".$query['beforeMeCount']."</td>
					<td>".$query['afterMeCount']."</td>
					<td>".$query['totalCount']."</td>
					<td>".CHtml::link("Отказаться", array("/query/abadon", "id"=>$query['query']->id_query))."</td>
				</tr>";
		}
		
		echo "</table>";
	}
?>