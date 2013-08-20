<dl class="dl-horizontal">
	<dt>Книгу читает</dt>
		<dd>
			<?php
				if ($holder == 'none')
				{
					echo "никто";
				} else {
					echo $holder;
				}
			?>
		</dd>
	<dt>Книгу ждут</dt><dd><?php echo $waitCount; ?></dd>
	<dt>Книгу читали</dt><dd><?php echo $readCount; ?></dd>
	<dt>Книгу рекомендовали</dt><dd><?php echo $recommendationCount; ?></dd>
</dl>