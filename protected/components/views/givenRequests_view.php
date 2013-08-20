<?php
/* @var $this QueryController */
/* @var $data Query */
?>
<li>
<h3>
	<?php echo CHtml::link(CHtml::encode($data->book->title), array('/book/view', 'id'=>$data->book_id)); ?>
</h3>

<p class="preview">
<?php
	if ($data->book->image_link != '')
	{
		echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$data->book->image_link), array('/book/view', 'id'=>$data->book_id));
	} else {
		echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg'), array('/book/view', 'id'=>$data->book_id));
	}
?>
</p>

<dl class="dl-horizontal">
	<dt>Автор</dt><dd> <?php echo $data->book->getAuthorsString(); ?> </dd>
	<dt>Год издания</dt><dd> <?php echo $data->book->year; ?> </dd>
	<dt>Количество</dt><dd> <?php echo $data->book->current_count."/".$data->book->total_count; ?> </dd>
	<dt>Категории<dd> <?php echo $data->book->getTypesString(); ?> </dd>
	<dt>Ключевые слова<dd> <?php echo $data->book->getKeyWordsString(); ?> </dd>
</dl>
</li>