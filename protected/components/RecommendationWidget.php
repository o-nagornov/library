<?php

class RecommendationWidget extends CWidget
{
	public $bookId = 0;
	
	public function run()
	{
	    $this->render('recommendationWidget', array(
									 'bookId' => $this->bookId,
									 ));
	}
}
?>