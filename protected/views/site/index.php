<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class='container'>
	<div class='row'>
		<div class='span6'>
			<h4>Найти книгу</h4>
			<?php if (!Yii::app()->user->isGuest) { $this->widget('application.components.StartSearchingWidget'); } ?>	
		</div>
		<div class='span6'>
			<h4>Ваши заявки</h4>
			<?php if (!Yii::app()->user->isGuest) { $this->widget('application.components.MyRequestsWidget', array('limit'=>3)); } ?>
		</div>
	</div>
	<div class='row'>
		<div class='span6'>
			<h4>Самые читаемые</h4>
			<?php if (!Yii::app()->user->isGuest) { $this->widget('application.components.BestBooksWidget', array('limit'=>3)); } ?>
		</div>
		<div class='span6'>
			<h4>Ваши книги</h4>
			<?php if (!Yii::app()->user->isGuest) { $this->widget('application.components.MyBooksWidget', array('limit'=>3)); } ?>
		</div>
	</div>
</div>
<?php if (!Yii::app()->user->isGuest)
{	
//	$this->widget('application.components.BestReadersWidget');
}
?>
