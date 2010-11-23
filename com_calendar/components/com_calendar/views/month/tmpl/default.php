<h1>Calendar for <?= date('F', mktime(0,0,0, $month,0,0));?></h1>

<div class="com_calendar">
<ul class="days">
	<? $index = 0;?>
	<? for($i = 1; $i <= $days_in_month; $i++): ?>
	<li <?= ($i==1)? 'style="margin-left: '.(115*(int)$day_offset+5).'px"':'';?>>
		<div class="date"><?=$i?></div>
		<? if ($days->current()->date === "$year-$month-$i"): ?>
		<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
			<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename ?>" />
			
			<div class="description"><div>
				<?=$days->current()->title?>
			</div></div>
		</a>
		<? $days->next(); ?>
		<? else: ?>
			<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
		<?endif; ?>
	</li>
	<? endfor; ?>
</ul>
</div>

<style src="media://com_calendar/css/calendar.css" />