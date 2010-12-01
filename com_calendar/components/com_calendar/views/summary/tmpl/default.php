<div class="com_calendar">
	<div class="summary">
		<h1>Donation Summary</h1>
	
		<form action="<?=@route('view=summary')?>" method="post">
		<ol>
			<? foreach($pending as $day): ?>
			<li>
				<?= date('F d, Y', strtotime($day->date));?>
				<input 
					type="image" 
					src="/media/com_calendar/images/delete.png" 
					name="trash" 
					value="<?=$day->date?>"
					style="display: inline" />
			</li>
			<? endforeach; ?>
		</ol>
			<input type="hidden" name="action" value="trash" />
		</form>
		
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