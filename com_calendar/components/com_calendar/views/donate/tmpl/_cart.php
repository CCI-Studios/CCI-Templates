<div style="float: left; width: 50%;"><div>
	<? if (count($pending_dates) == 1): ?>
		<h2>Your Currently Selected Day:</h2>
	<? else: ?>
		<h2>Your Currently Selected Day(s):</h2>
	<? endif; ?>
	
	<? foreach($pending_dates as $day): ?>
		
		<form action="<?=@route('view=donate')?>" method="post">
			<input type="hidden" name="action" value="trash" />
			<input type="hidden" name="date" value="<?=$day->date?>">
			<label style="font-weight: normal; float: left; font-size: 13px;"><?= date('F d, Y', strtotime($day->date)) ?></label>
			<input type="submit" 
				value="(remove)" 
				class="trash" />
		</form>
		<div class="clear"></div>
	<? endforeach ?>
</div></div>