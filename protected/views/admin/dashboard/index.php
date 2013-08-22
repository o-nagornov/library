<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Администрирование',
);
?>

<p>
	<?php
	$this->widget('zii.widgets.CMenu', array(
			'items' => array(
				array('label' => 'Управление пользователями', 'url'=>array('/admin/user')),
				array('label' => 'Управление книгами', 'url'=>array('/admin/book')),
				array('label' => 'Управление авторами', 'url'=>array('/admin/author')),
				array('label' => 'Управление категориями', 'url'=>array('/admin/type')),
				array('label' => 'Управление ключевыми словами', 'url'=>array('/admin/keyword')),
				array('label' => 'Управление рекомендациями', 'url'=>array('/admin/recommendation')),
				array('label' => 'Управление заявками', 'url'=>array('/admin/query')),
				
				
			)
		));
	?>
</p>
