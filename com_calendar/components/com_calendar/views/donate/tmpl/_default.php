<div class="pick-your-day">
	
<p>Click on a day below to select it as your day.</p>
<p>Please note, selecting a day reserves it for only 30 minutes.</p>

<form action="<?=@route('view=donate')?>" method="post">
	<input type="hidden" name="action" value="pick_day" />

	<p class="left"><<</p>
	<p class="right">>></p>
	<p style="text-align: center;"><?= date('F', mktime(0,0,0, $month,1,$year))?></p>
	<div class="clear"></div>
	
	<ul class="days">
		<? $index = 0;?>
		<? for($i = 1; $i <= $days_in_month; $i++): ?>
		<li <?= ($i==1)? 'style="margin-left: '.(115*(int)$day_offset+5).'px"':'';?>>
			<div class="date"><?=$i?></div>
			<? if ($days->current()->date === "$year-$month-$i" && TRUE): ?>			
				<img src="/media/com_calendar/uploads/month_<?= $days->current()->filename?>" />
				<? $days->next();?>
			<? else: ?>
				<input type="radio" name="selected_date" 
					id="date-<?= $year.'-'.$month.'-'.$i?>" 
					value="<?= $year.'-'.$month.'-'.$i ?>" 
					style="display: none;"/>
					
				<label for="date-<?= $year.'-'.$month.'-'.$i?>">
					<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
				</label>
			<? endif; ?>
			<span >
		</li>
		<? endfor; ?>
	</ul>
	<div class="clear"></div>
	
	<div style="float: left; width: 50%;"><div>
		<? foreach($pending_dates as $day): ?>
			<?= $day->date ?> (add delete)<br/>
		<? endforeach ?>
	</div></div>
	
	<div style="float: left; width: 50%;"><div>
		<input type="submit" name="submit" value="Continue" /><br/>
		<input type="submit" name="submit" value="Pick an Additional Day" /><br/>
	</div></div>
	
	<div class="clear"></div>
</form>

</div>