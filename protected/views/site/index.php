<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<?php

if (!Yii::app()->user->isGuest) {
    $this->widget('application.components.StartSearchingWidget');
	
	$this->widget('application.components.MyRequestsWidget');
	
	$this->widget('application.components.MyBooksWidget');
	
	$this->widget('application.components.BestBooksWidget');
	
	$this->widget('application.components.BestReadersWidget');
}
?>
