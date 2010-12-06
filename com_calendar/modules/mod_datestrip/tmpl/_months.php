<div class="mod_datestrip">
	<ul class="months" id="mod_daystrip_months">
		<? for ($i = 1; $i <= 12; $i++): ?>
		<li <?= ($i == $month)? 'class="active"': '' ?>>
				<?=substr(date('F', strtotime(sprintf('%d-%02d-%02d', $year, $i, 1))), 0, 1)?>

			<div><div>
				<? if ($sponsors->current()->date == sprintf('%d-%02d-%02d', $year, $i, 1)): ?>
					<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
						<? if ($sponsors->current()->filename): ?>
							<img src="/media/com_calendar/uploads/sponsors/<?=$sponsors->current()->filename?>" width="120" />
						<? else: ?>
							<img src="/media/com_calendar/uploads/sponsors/<?=$pendingm->filename?>" width="120" />
						<? endif; ?>
					</a>
					<? $sponsors->next(); ?>
				<? else: ?>
					<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
						<img src="/media/com_calendar/uploads/sponsors/<?=$pendingm->filename?>" width="120" />
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