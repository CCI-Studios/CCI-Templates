<div class="com_calendar">
	<div class="summary">
		<h1>Donation Summary</h1>
		
		<? foreach($pending as $day): ?>
		<form action="<?=@route('view=summary')?>" method="post">
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
		<? endforeach; ?>

		
		<? if(count($pending)): ?>		
		<div class="right">
			<form action="/index.php" method="get">
				<input type="hidden" name="option" value="com_calendar" />
				<input type="hidden" name="view" value="datesetting" />
				<input type="submit" value="Continue" />
			</form>
		</div>
		<? else: ?>
			<div style="margin: 1em 0;">Please select your day to proceed.</div>
		<? endif; ?>
		
		<div class="left">
			<form action="/index.php" method="get">
				<input type="hidden" name="option" value="com_calendar" />
				<input type="hidden" name="view" value="donate" />
				<input type="submit" value="Select More" />
			</form>
		</div>
	
	</div>
</div>