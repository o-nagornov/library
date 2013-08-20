<?php
/* @var $this QueryManagerController */

$this->breadcrumbs=array(
	'Query Manager'=>array('/queryManager'),
	'View',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>


<b>Книга:</b> <?php echo CHtml::link(CHtml::encode($query->book->title), array('/book/view', 'id'=>$query->book_id)); ?><br />
<b>Получатель:</b> <?php echo $query->user->surname." ".$query->user->name." ".$query->user->parentname; ?><br />
<b>Доступно:</b> <?php echo $query->book->current_count; ?><br />
<b>Всего:</b> <?php echo $query->book->total_count; ?><br />
<b>Статус заявки:</b> <?php echo $query->status; ?><br />


<?php
	echo $query->getQueryActions();
?>