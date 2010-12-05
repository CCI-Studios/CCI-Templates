<div style="float: left; width: 50%;"><div>
	<? if (count($pending_dates) == 1): ?>
		<h2>What is your day?</h2>
	<? else: ?>
		<h2>What are your days?</h2>
	<? endif; ?>
	
	<? foreach($pending_dates as $day): ?>
		
		<form action="<?=@route('view=donate')?>" method="post">
			<input type="hidden" name="action" value="trash" />
			<input type="hidden" name="date" value="<?=$day->date?>">
			<label style="font-weight: normal; float: left;"><?= date('F d, Y', strtotime($day->date)) ?></label>
			<input type="submit" 
				value="(Trash)" 
				style="display: inline; 
					float: left; 
					line-height: 19px;
					margin: 0 0 0 10px;
					background: none; 
					border: none; 
					padding: 0;
					cursor: pointer;" />
		</form>
		<div class="clear"></div>
	<? endforeach ?>
</div></div>