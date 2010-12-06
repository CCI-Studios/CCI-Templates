<div class="com_calendar">
	<div class="summary">
		<h1>What's Your Day? Donation Summary</h1>
		
		<p>Listed below are your currently selected day(s).  If these days are correct, simply click the 'Continue' button to proceed to the checkout.</p>
		<br/>
		<? foreach($pending as $day): ?>
		<form action="<?=@route('view=summary')?>" method="post">
			<input type="hidden" name="action" value="trash" />
			<input type="hidden" name="date" value="<?=$day->date?>">
			<label style="font-weight: normal; float: left; font-size: 13px;"><?= date('F d, Y', strtotime($day->date)) ?></label>
			<input type="submit" 
				value="(remove)" 
				class="trash" />
		</form>
		<div class="clear"></div>
		<? endforeach; ?>
		<br/>

		
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
				<input type="submit" value="Get More Days!" />
			</form>
		</div>
	
	</div>
</div>

<style src="media://com_calendar/css/calendar.css" />