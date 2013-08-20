<?php
/* @var $this RecommendationController */
/* @var $data Recommendation */
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
	<dt>Автор</dt><dd> <?php echo CHtml::encode($data->user->surname)." ".CHtml::encode($data->user->name)." ".CHtml::encode($data->user->parentname); ?> </dd>
	<dt>Мнение</dt><dd> <?php echo CHtml::encode($data->reason); ?> </dd>

</dl>

<?php
	$this->widget('application.components.BookStatusWidget', array('book'=>$data->book));
?>
</li>
