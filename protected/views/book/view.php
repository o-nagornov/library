<?php
/* @var $this BookController */

$this->breadcrumbs=array(
	'Книги'=>array('/book'),
	'Карточка книги',
);
?>
<table class="table table-bordered">
  <tr>
    <td class="bookinfo" rowspan="3">
		<ul class="books unstyled">
		  <li>
			<h3><?php echo $book->title; ?></h3>
			<p class="preview">
				<?php
					if ($book->image_link != '')
					{
						echo CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.$book->image_link);
					} else {
						echo CHtml::image(Yii::app()->controller->assetsBase.DIRECTORY_SEPARATOR.'default.jpg');
					}
				?>
			</p>
			<dl class="dl-horizontal">
				<dt>Автор</dt><dd><?php echo $book->getAuthorsString(); ?></dd>
				<dt>Год издания</dt><dd><?php echo $book->year; ?></dd>
				<dt>Категории</dt><dd><?php echo $book->getTypesString(); ?></dd>
				<dt>Ключевые слова</dt><dd><?php echo $book->getKeywordsString(); ?></dd>
				<dt>Количество</dt><dd><?php echo $book->current_count."/".$book->total_count; ?></dd>
				<dt>Описание</dt>
				<dd>
					<p>
						<?php echo $book->description; ?>
					</p>		
				</dd>
			</dl>
		  </li>
		</ul>
	</td>
	<td class="bookstats">
		<?php
			$this->widget('application.components.BookStatisticWidget', array('book'=>$book));
		?>
	</td>
  </tr>
  <tr>
    <td class="bookaction">
		<?php
			$this->widget('application.components.BookStatusWidget', array('book'=>$book));
	
			$this->widget('application.components.RecommendationWidget', array('bookId'=>$book->id_book));
		?>
	</td>
  </tr>
  <tr>
    <td class="bookadmin">
		<?php
			if (Yii::app()->user->isAdmin())
			{
				$this->widget('application.components.BookAdminPanelWidget', array('book'=>$book));
			}
		?>
	</td>
  </tr>
</table>