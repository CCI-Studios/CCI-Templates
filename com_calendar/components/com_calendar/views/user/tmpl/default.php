<div class="com_calendar">
	<div class="user">
		<h1>User Details</h1>

		<p>Your Days</p>
		<ol>
			<? foreach($days as $day): ?>
			<li>
				<a href="<?=@route('view=day&date='.$day->date)?>"><?=$day->date?> - <?= $day->dedication?></a> 
				(<a href="<?=@route('view=edit&date='.$day->date)?>">edit</a>)
			</li>
			<? endforeach; ?>
		</ol>
		
		<p>Get more days <a href="<?=@route('view=donate')?>">here</a>.</p>

	</div>
</div>
