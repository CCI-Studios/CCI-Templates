<div class="com_calendar wide">
	<!--<h1>Calendar for <?= date('F', mktime(0,0,0, $month,1,1));?></h1>-->
	
	<div>
		<p style="float: left; margin-left: 10px;">
			<? if ($month > 1): ?>
				<a href="<?=@route('view=month&date='.$year.'-'.($month-1).'-01')?>"><<</a>
			<? else: ?>
				<<
			<? endif; ?>
		</p>
		<p style="float: right; margin-right: 10px;">
			<? if ($month < 12): ?>
				<a href="<?=@route('view=month&date='.$year.'-'.($month+1).'-01')?>">>></a>
			<? else: ?>
				>>
			<? endif; ?>
		</p>
		<h1 style="text-align: center; margin: 0 0 -4px; padding-top: 4px"><?= date('F Y', mktime(0,0,0, $month,1,$year));?></h1>
	</div>
	
	<div style="margin: 0 6px;">
	<ul class="days" style="margin: 4px 0 0;">
		<? $index = 0;?>
		<? for($i = 1; $i <= $days_in_month; $i++): ?>
		<li style="<?= ($i==1)? 'margin-left: '.(114*(int)$day_offset+3).'px':'';?>"
			<?= (date('d') == $i)? 'class="active"':'';?> >
			<div class="date"><?=$i?></div>
			<? if ($days->current()->date === "$year-$month-".sprintf("%02d",$i)): ?>
			<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
				<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename ?>" />
			</a>
			
			<div class="description"><div>
				<a href="<?= @route('view=day&date='.$days->current()->date) ?>">
					<?=$days->current()->title?>
				</a>
			</div></div>
			
			<? $days->next(); ?>
			<? else: ?>
				<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
			<?endif; ?>
		</li>
		<? endfor; ?>
	</ul>
	</div>
	
	<div class="clear"></div>
</div>

<style src="media://com_calendar/css/calendar.css" />