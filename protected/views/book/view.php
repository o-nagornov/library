<?php
/* @var $this BookController */

$this->breadcrumbs=array(
	'Book'=>array('/book'),
	'View',
	
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
<?php

	if ($book->image_link != '')
	{
		echo CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$book->image_link);
	} else {
		echo CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg');
	}
	
	echo "<h3>".$book->title.", ".$book->year."</h3><br>";
	echo "<h5>".$book->getAuthorsString()."</h5>";
	echo "<h5>".$book->getTypesString()."</h5>";
	echo "<h5>Доступно: ".$book->current_count."</h5>";
	echo "<h5>Всего: ".$book->total_count."</h5>";
	echo "<h5>".$book->getKeywordsString()."</h5>";
	echo "<h5>".$book->description."</h5>";
	
	$this->widget('application.components.BookStatusWidget', array('book'=>$book));
	
	$this->widget('application.components.RecommendationWidget', array('bookId'=>$book->id_book));
	
	$this->widget('application.components.BookStatisticWidget', array('book'=>$book));
?>
</p>
