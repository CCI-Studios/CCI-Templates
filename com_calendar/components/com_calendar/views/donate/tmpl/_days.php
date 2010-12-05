<div style="padding: 0 6px 6px;">
<ul class="days" style="margin: 4px 0 0;">
	<li style="width: <?=(114*($day_offset))?>px; border: none; margin: 0;">
		&nbsp;
	</li>
	
	<? $index = 0;?>
	<? for($i = 1; $i <= $days_in_month; $i++): ?>
	<li>
		<div class="date"><?=$i?></div>
		<? if ($days->current()->date === "$year-$month-".sprintf("%02d",$i)): ?>
			<? if ($days->current()->filename): ?>
				<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename ?>" />

				<div class="description"><div>
						<?=$days->current()->title?>
				</div></div>
			<? else: ?>
				<img src="/media/com_calendar/uploads/month_<?= $pending->filename?>" />
			<? endif;?>

		<? $days->next(); ?>
		<? else: ?>
			<form action="<?=@route('view=donate')?>" method="post">
				<input type="hidden" name="action" value="pick_day" />
				<input type="hidden" name="date" value="<?= date('Y-m-d', mktime(0,0,0, $month,$i,$year))?>" />
				<input type="image" src="/media/com_calendar/uploads/month_<?= $blank->filename?>"
					name="selected_date" style="display:block;"/>
			</form>
		<?endif; ?>
	</li>
	<? endfor; ?>
</ul>
<div class="clear"></div>
</div>