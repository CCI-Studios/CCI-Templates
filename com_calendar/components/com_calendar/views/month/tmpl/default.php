<div class="com_calendar wide">
	<div>
		<p style="float: left; margin-left: 10px; color: color: #004B9D;">
			<? if ($month > 1): ?>
				<a href="<?=@route('view=month&date='.date('Y-m-d', mktime(0,0,0, $month-1,1,$year)))?>" style="color: #004B9D;"><<</a>
			<? else: ?>
				<<
			<? endif; ?>
		</p>
		<p style="float: right; margin-right: 10px; color: color: #004B9D;">
			<? if ($month < 12): ?>
				<a href="<?=@route('view=month&date='.date('Y-m-d', mktime(0,0,0, $month+1,1,$year)))?>" style="color: #004B9D;">>></a>
			<? else: ?>
				>>
			<? endif; ?>
		</p>
		<h1 style="text-align: center; margin: 0 0 -4px; padding-top: 4px; color: #004B9D;"><?= date('F Y', mktime(0,0,0, $month,1,$year));?></h1>
	</div>
	
	<div style="padding: 0 6px 6px;">
	<ul class="days" style="margin: 4px 0 0;">
		<? $index = 0;?>
		<li style="width: <?=(114*($day_offset))?>px; border: none; margin: 0;">
			&nbsp;
		</li>
		
		<? for($i = 1; $i <= $days_in_month; $i++): ?>
		<li <?= (date('d') == $i && date('m') == $month)? 'class="active"':'';?> >
			<div class="date"><?=$i?></div>
			<? if ($days->current()->date === "$year-$month-".sprintf("%02d",$i)): ?>
					<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
						<? if ($days->current()->filename): ?>
							<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename ?>" />
						<? else: ?>
							<img src="/media/com_calendar/uploads/month_<?= $pending->filename?>" />
						<? endif;?>
					</a>
			
					<? if ($days->current()->title): ?>
					<div class="description"><div>
						<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
							<? if (strlen($days->current()->title) > 13) {
								echo substr($days->current()->title, 0, 13).'...';
							} else {
								echo $days->current()->title;
							}
							?>
						</a>
					</div></div>
					<? endif; ?>
			<? $days->next(); ?>
			<? else: ?>
				<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
			<?endif; ?>
		</li>
		<? endfor; ?>
	</ul>
	<div class="clear"></div>
	</div>
	
	<div class="clear"></div>
</div>

<style src="media://com_calendar/css/calendar.css" />