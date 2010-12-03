<div class="mod_datestrip">
	<ul class="days" id="mod_daystrip_days">
		<? 
		$c = (int)date('t', strtotime($date));
		for ($i = 1; $i <= $c; $i++): ?>
		<li <?= ($i == $day && KRequest::get('get.view', 'cmd') !== 'month')? 'class="active"': '' ?>>
			<?= $i ?>
			
			<div><div>
				<? if ($days->current()->date == sprintf('%d-%02d-%02d', $year, $month, $i)): ?>
					<a href="<?=@route('option=com_calendar&view=day&date='.sprintf('%d-%02d-%02d', $year, $month, $i))?>">
						<? if ($days->current()->filename): ?>
							<img src="/media/com_calendar/uploads/month_<?=$days->current()->filename?>" />
						<? else: ?>
							<img src="/media/com_calendar/uploads/month_<?=$pending->filename?>" />
						<? endif; ?>
					</a>
					<? $days->next(); ?>
				<? else: ?>
					<a href="<?=@route('option=com_calendar&view=day&date='.sprintf('%d-%02d-%02d', $year, $month, $i))?>">
						<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
					</a>
				<? endif; ?>
			</div></div>	
		</li>
		<? endfor; ?>
		
	</ul>
</div>

<script>
new DS('mod_daystrip_days', 'right');
</script>