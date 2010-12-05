<div class="com_calendar wide">
	<div class="pick-your-day" style="padding-top: 4px;">
		<h1 style="margin-left: 10px; margin-right: 10px;"><?=$title?></h1>
		
		<p style="margin-left: 10px; margin-right: 10px;">To select Your Day(s), simply click on any free day(s) (i.e. one(s) with the ‘What’s Your Day?’ logo) in the calendar below.  When you are ready to checkout, just click the ‘Continue’ button.</p>
		<p style="margin-left: 10px; margin-right: 10px;">***Please note that after selecting your day(s), you will have 30 minutes to complete your transaction or else the day(s) will become available to the public again.</p>

		<? if (count($pending_dates)): ?>
		<div style="padding: 0 10px 10px;">
			<?= @template('_cart')?>

			<div style="text-align: right;"><div>
				<form action="<?=@route('view=donate')?>" method="post">
					<input type="hidden" name="action" value="pick_day" />
					<input type="submit" name="submit" value="Continue" /><br/>
				</form>
			</div></div>
		</div>
		<div class="clear"></div>
		<? endif; ?>

		<div>
			<p style="float: left; margin-left: 10px;">
				<? if ($month > 1): ?>
					<a href="<?=@route('view=donate&date='.date('Y-m-d', mktime(0,0,0, $month-1,1,$year)))?>" style="color: #004B9D;"><<</a>
				<? else: ?>
					<<
				<? endif; ?>
			</p>
			<p style="float: right; margin-right: 10px;">
				<? if ($month < 12): ?>
					<a href="<?=@route('view=donate&date='.date('Y-m-d', mktime(0,0,0, $month+1,1,$year)))?>" style="color: #004B9D;">>></a>
				<? else: ?>
					>>
				<? endif; ?>
			</p>
			<h1 style="text-align: center; margin: 0 0 -4px; padding-top: 4px"><?= date('F Y', mktime(0,0,0, $month,1,$year));?></h1>
		</div>

		
			
		<?= @template('_days')?>

		<div class="clear"></div>
	</div>
</div>
<style src="media://com_calendar/css/calendar.css" />