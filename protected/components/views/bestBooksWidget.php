<?php

	if ($dataProvider->totalItemCount == 0)
	{
		echo "<h5>Нет популярных книг</h5>";
	} else {
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,	
			'itemView'=>'newRequests_view',
			'itemsTagName'=>'ul',
			'tagName'=>'span',
			'itemsCssClass'=>'books unstyled',
			'id'=>'ajaxListView',
			'htmlOptions'=>array('class'=>'books unstyled'),
			'summaryText'=>'',
			'sorterHeader'=>'',
			'sorterFooter'=>'',
			'sortableAttributes'=>'',
		));	
	}
?>