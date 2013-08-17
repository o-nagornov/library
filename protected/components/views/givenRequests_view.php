<?php
	$this->widget('zii.widgets.CListView', array(
	    'dataProvider'=>$dataProvider,	
		'itemView'=>'newRequests_view',
	    'sortableAttributes'=>array(
			'id'=>'cronologico',
	        'transaction'
		),
	    'id'=>'ajaxListView',
));
?>