<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" media="screen" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div class="container wrap">
	<div class="header">
		<div class="title">
			<div class="sitename"><?php echo CHtml::encode(Yii::app()->name); ?></div>
			<div class="corponame">Александровский банк</div>
		</div>
		<div class="navigation">
			<?php
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'На главную', 'url'=>array('/site/index')),
						//array('label'=>'Помощь', 'url'=>array('/site/page', 'view'=>'help')),
						array('label'=>'Поиск книг', 'url'=>array('/book'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Заявки', 'url'=>array('/query'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Книги', 'url'=>array('/query/books'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Рекомендации', 'url'=>array('/recommendation'), 'visible'=>!Yii::app()->user->isGuest),
						array('label'=>'Авторизироваться', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
					),
				));
			?>	
		</div><!-- mainmenu -->
	</div><!-- header -->

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<div class="content">
		<?php echo $content; ?>
	</div>

	<div class="content">
		<div class="row">
			<div class="span12"></div>
		</div>
	</div>
	<div class="footer">
			<?php
				$this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'Управление заявками', 'url'=>array('/queryManager'), 'visible'=>Yii::app()->user->isAdmin()),
						array('label'=>'Cписок возврата', 'url'=>array('/queryManager/recivingList'), 'visible'=>Yii::app()->user->isAdmin()),
						array('label'=>'Список выдачи', 'url'=>array('/queryManager/gettingList'), 'visible'=>Yii::app()->user->isAdmin()),
						array('label'=>'Добавить книгу', 'url'=>array('/adminBook/create'), 'visible'=>Yii::app()->user->isAdmin()),
						array('label'=>'Администрирование', 'url'=>array('/admin/dashboard'), 'visible'=>Yii::app()->user->isRoot()),
					),
				));
			?>

		
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->
</div><!-- page -->
<?php

if (Yii::app()->user->hasFlash("error"))
{
	$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		'id' => 'mydialog',
		'options' => array(
			'title' => 'Внимание, произошла ошибка',
			'autoOpen' => true,
			'modal' => true,
			'resizable'=> false
			),
	));
	
	echo Yii::app()->user->getFlash("error", 'Неизвестная ошибка', true);
	
	$this->endWidget('zii.widgets.jui.CJuiDialog');
}
?>
</body>
</html>
