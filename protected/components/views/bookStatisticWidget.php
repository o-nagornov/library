<h5>Книгу читали: <?php echo $readCount; ?> </h5>
<h5>Книгу ждут: <?php echo $waitCount; ?> </h5>
<h5>Книгу рекомендуют: <?php echo $recommendationCount; ?> </h5>

<?php
	if ($holder == 'none')
	{
		echo "<h5>Книгу никто не читает</h5>";
	} else {
		echo "<h5>Книгу читает: $holder</h5>";
	}
?>