<div class="com_calendar wide">
	<div class="pick-your-day">
		<h1 style="margin-left: 10px; margin-right: 10px;"><?=$title?></h1>
	
	

		<p style="margin-left: 10px; margin-right: 10px;">Click on a day below to select it as your day.</p>
		<p style="margin-left: 10px; margin-right: 10px;">Please note, selecting a day reserves it for only 30 minutes.</p>

		<div>
			<p style="float: left; margin-left: 10px;">
				<? if ($month > 1): ?>
					<a href="<?=@route('view=donate&date='.date('Y-m-d', mktime(0,0,0, $month-1,1,$year)))?>"><<</a>
				<? else: ?>
					<<
				<? endif; ?>
			</p>
			<p style="float: right; margin-right: 10px;">
				<? if ($month < 12): ?>
					<a href="<?=@route('view=donate&date='.date('Y-m-d', mktime(0,0,0, $month+1,1,$year)))?>">>></a>
				<? else: ?>
					>>
				<? endif; ?>
			</p>
			<h1 style="text-align: center; margin: 0 0 -4px; padding-top: 4px"><?= date('F Y', mktime(0,0,0, $month,1,$year));?></h1>
		</div>

		<form action="<?=@route('view=donate')?>" method="post">
			<input type="hidden" name="action" value="pick_day" />
			
			<?= @template('_days')?>

			<? if (count($pending_dates)): ?>
			<div style="padding: 0 10px 10px;">
				<?= @template('_cart')?>

				<div style="text-align: right;"><div>
					<input type="submit" name="submit" value="Continue" /><br/>
				</div></div>
			</div>
			<? endif; ?>

			<div class="clear"></div>
		</form>
	</div>
</div>
<style src="media://com_calendar/css/calendar.css" />