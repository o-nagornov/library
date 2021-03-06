<?php

class GettingQueryListWidget extends CWidget {
	
	public $limit = -1;
	
	public function run() {

		$model=new Query('search');
		$model->unsetAttributes();  // clear any default values
		$model->status = 'new';
		if(isset($_GET['Query']))
			$model->attributes=$_GET['Query'];

		$this->render('queryList',array(
			'model'=>$model,
			'limit'=>$this->limit,
		));
	}
}
?>