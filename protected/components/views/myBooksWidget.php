<?php

	if ($dataProvider->totalItemCount == 0)
	{
		echo "<h5>У вас нет книг</h5>";
	} else {
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,	
			'itemView'=>'givenRequests_view',
			'sortableAttributes'=>array(
				'id'=>'cronologico',
				'transaction'
			),
			'id'=>'ajaxListView',
		));
	}
?>