<style rel="stylesheet">
.mod_datestrip ul {
	list-style: none;
	margin: 0;
	padding: 0;
	
	position: absolute;
	top: 0;
	left: -2.5em;
}
.mod_datestrip ul.months { right: -2.5em; left: auto; }

.mod_datestrip li {
	position: relative;
	display: block;
	text-align: center;
	padding: 0;
	margin: 0;
	
	color: white;
	cursor: pointer;
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
.mod_datestrip .months li div { right: 100%; left: auto; }
.mod_datestrip li:hover div { display: block; }
</style>

<div class="mod_datestrip">
	<ul class="months" id="mod_daystrip_months">
		<? for ($i = 1; $i <= 12; $i++): ?>
		<li <?= ($i == $month)? 'class="active"': '' ?>>
		 	<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
				<?=substr(date('F', strtotime(sprintf('%d-%02d-%02d', $year, $i, 1))), 0, 1)?>
			</a>
			<div><div>
				<? if ($days->current()->date == sprintf('%d-%02d-%02d', $year, $i, 1)): ?>
					<a href="<?=@route('option=com_calendar&view=month&date='.sprintf('%d-%02d-%02d', $year, $i, 1))?>">
						<img src="/media/com_calendar/uploads/month_<?=$days->current()->filename?>" />
					</a>
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
new DS('mod_daystrip_months', 'left');
</script>