<div class="order" style="margin-bottom: 2em;">
	<ol style="margin-bottom: 0;">
	<? foreach($days as $day): ?>
		<li style="border-bottom: 1px dotted black; margin: 10px 0 0 2em; padding: 5px 0;">
			<span class="right">
				$100
			</span>
			<?= $day->date ?> - <?= $day->description ?>
		</li>
	<? endforeach; ?>
	</ol>
	<div class="clear"></div>
	
	<div class="total" style="float: right; border-top: 1px solid black; margin-top: -1px;">
		$<?= count($days)*100?>
	</div>
</div>