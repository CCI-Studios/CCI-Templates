<div style="float: left; width: 50%;"><div>
	<? if (count($pending_dates) == 1): ?>
		<h2>What is your day?</h2>
	<? else: ?>
		<h2>What are your days?</h2>
	<? endif; ?>
	
	<? foreach($pending_dates as $day): ?>
		<?= date('F d, Y', strtotime($day->date)) ?>
		<input 
			type="image" 
			src="/media/com_calendar/images/delete.png" 
			name="trash" 
			value="<?=$day->date?>"
			style="display: inline" />
		<br/>
	<? endforeach ?>
</div></div>