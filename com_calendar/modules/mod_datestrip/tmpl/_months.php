<div class="mod_datestrip">
	<ul class="months" id="mod_daystrip_months">
		<? for ($i = 1; $i <= 12; $i++): ?>
		<li <?= ($i == $month)? 'class="active"': '' ?>>
				<?=substr(date('F', strtotime(sprintf('%d-%02d-%02d', $year, $i, 1))), 0, 1)?>

			<div><div>
				<? if ($days->current()->date == sprintf('%d-%02d-%02d', $year, $i, 1)): ?>
					<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
						<? if ($days->current()->filename): ?>
							<img src="/media/com_calendar/uploads/month_<?=$days->current()->filename?>" />
						<? else: ?>
							<img src="/media/com_calendar/uploads/month_<?=$pending->filename?>" />
						<? endif; ?>
					</a>
					<? $days->next(); ?>
				<? else: ?>
					<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
						<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
					</a>
				<? endif; ?>
			</div></div>	
		</li>
		<? endfor; ?>
		
	</ul>
</div>
	
<script>
new DS('mod_daystrip_months', 'left');
</script>