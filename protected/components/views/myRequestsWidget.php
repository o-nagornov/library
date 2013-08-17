<?php
	if ($dataProvider->totalItemCount == 0)
	{
		echo "<h5>У вас нет заявок</h5>";
	} else {
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,	
			'itemView'=>'newRequests_view',
			'sortableAttributes'=>array(
				'id'=>'cronologico',
				'transaction'
			),
			'id'=>'ajaxListView',
		));	
	}
	
?>