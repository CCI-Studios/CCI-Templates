<div style="margin: 0 6px;">
<ul class="days" style="margin: 4px 0 0;">
	<? $index = 0;?>
	<? for($i = 1; $i <= $days_in_month; $i++): ?>
	<li style="<?= ($i==1)? 'margin-left: '.(114*(int)$day_offset+3).'px':'';?>" >
		<div class="date"><?=$i?></div>
		<? if ($days->current()->date === "$year-$month-".sprintf("%02d",$i)): ?>
			<? if ($days->current()->filename): ?>
				<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
					<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename ?>" />
				</a>

				<div class="description"><div>
					<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
						<?=$days->current()->title?>
					</a>
				</div></div>
			<? else: ?>
				<img src="/media/com_calendar/uploads/month_<?= $pending->filename?>" />
			<? endif;?>

		<? $days->next(); ?>
		<? else: ?>
			<input type="image" src="/media/com_calendar/uploads/month_<?= $blank->filename?>"
				name="selected_date" value="<?= date('Y-m-d', mktime(0,0,0, $month,$i,$year))?>" style="display:block;"/>
		<?endif; ?>
	</li>
	<? endfor; ?>
</ul>
</div>
<div class="clear"></div>