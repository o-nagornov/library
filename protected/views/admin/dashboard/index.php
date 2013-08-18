<?php
/* @var $this DashboardController */

$this->breadcrumbs=array(
	'Dashboard',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<h2>DashBoard</h2>
<p>
	<?php
	$this->widget('zii.widgets.CMenu', array(
			'items' => array(
				array('label' => 'Manage Users', 'url'=>array('/admin/user')),
				array('label' => 'Manage Books', 'url'=>array('/admin/book')),
				array('label' => 'Manage Types', 'url'=>array('/admin/type')),
				array('label' => 'Manage Recommendations', 'url'=>array('/admin/recommendation')),
				array('label' => 'Manage Authors', 'url'=>array('/admin/author')),
				array('label' => 'Manage Keywords', 'url'=>array('/admin/keyword')),
				array('label' => 'Manage Queries', 'url'=>array('/admin/query')),
				
				
			)
		));
	?>
</p>
