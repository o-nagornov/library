<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Управление заявками'=>array('/queryManager'),
	'Просмотр',
);
?>

<dl class="dl-horizontal">
	<dt>Книга</dt><dd> <?php echo CHtml::link(CHtml::encode($query->book->title), array('/book/view', 'id'=>$query->book_id)); ?> </dd>
	<dt>Получатель</dt><dd> <?php echo $query->user->surname." ".$query->user->name." ".$query->user->parentname; ?> </dd>
	<dt>Доступно</dt><dd> <?php echo $query->book->current_count; ?> </dd>
	<dt>Всего<dd> <?php echo $query->book->total_count; ?> </dd>
	<dt>Статус заявки<dd> <?php echo $query->status; ?> </dd>
</dl>

<?php
	echo $query->getQueryActions();
?>