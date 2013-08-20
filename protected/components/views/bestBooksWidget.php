<p>Самые читаемые книги:</p>
<?php

	if ($dataProvider->totalItemCount == 0)
	{
		echo "<h5>Нет популярных книг</h5>";
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