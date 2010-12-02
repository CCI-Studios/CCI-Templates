<style rel="stylesheet">
.mod_datestrip ul {
	list-style: none;
	margin: 0;
	padding: 0;
	width: 2em;
	
	position: absolute;
	top: 0;
	left: -2.5em;
}

.mod_datestrip li {
	position: relative;
	display: block;
	text-align: center;
	padding: 0;
	margin: 0;
	
	color: white;
}
.mod_datestrip li a { color: white; }
.mod_datestrip li.active a,
.mod_datestrip li.hover a { color: #c2398e; }

.mod_datestrip li > div {
	position: absolute;
	top: 0;
	left: 100%;
	background: url(/media/com_calendar/images/bg.png) no-repeat;
	padding: 6px;
	
	display: none;
}
.mod_datestrip li:hover div { display: block; }
</style>

<div class="mod_datestrip">
	<ul class="days" id="mod_daystrip_days">
		<? 
		$c = (int)date('t', strtotime($date));
		for ($i = 1; $i <= $c; $i++): ?>
		<li <?= ($i == $day && KRequest::get('get.view', 'cmd') !== 'month')? 'class="active"': '' ?>>
		 	<a href="<?=@route('option=com_calendar&view=day&date='.sprintf('%d-%02d-%02d', $year, $month, $i))?>">
				<?=$i?>
			</a>
			<div><div>
				<? if ($days->current()->date == sprintf('%d-%02d-%02d', $year, $month, $i)): ?>
					<? if ($days->current()->filename): ?>
						<a href="<?=@route('option=com_calendar&view=day&date='.sprintf('%d-%02d-%02d', $year, $month, $i))?>">
							<img src="/media/com_calendar/uploads/month_<?=$days->current()->filename?>" />
						</a>
					<? else: ?>
						<img src="/media/com_calendar/uploads/month_<?=$pending->filename?>" />
					<? endif; ?>
					<? $days->next(); ?>
				<? else: ?>
					<img src="/media/com_calendar/uploads/month_<?=$blank->filename?>" />
				<? endif; ?>
			</div></div>	
		</li>
		<? endfor; ?>
		
	</ul>
</div>

<script>
new DS('mod_daystrip_days', 'right');
</script>