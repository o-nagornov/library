<?php
/* @var $this BookController */
/* @var $data Book */
?>
<li>
<h3>
	<?php echo CHtml::link(CHtml::encode($data->title), array('/book/view', 'id'=>$data->id_book)); ?>
</h3>

<p class="preview">
<?php
	if ($data->image_link != '')
	{
		echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$data->image_link), array('/book/view', 'id'=>$data->id_book));
	} else {
		echo CHtml::link(CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg'), array('/book/view', 'id'=>$data->id_book));
	}
?>
</p>

<dl class="dl-horizontal">
	<dt>Автор</dt><dd> <?php echo $data->getAuthorsString(); ?> </dd>
	<dt>Год издания</dt><dd> <?php echo $data->year; ?> </dd>
	<dt>Количество</dt><dd> <?php echo $data->current_count."/".$data->total_count; ?> </dd>
	<dt>Категории<dd> <?php echo $data->getTypesString(); ?> </dd>
	<dt>Ключевые слова<dd> <?php echo $data->getKeyWordsString(); ?> </dd>
</dl>

<?php
	$this->widget('application.components.BookStatusWidget', array('book'=>$data));
?>
</li>