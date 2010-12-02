<div class="com_calendar">
	<div class="edit">
		<h1>Date Settings For:</h1>
		
		<p>Please enter the details for <?= date('F d, Y', strtotime($day->date)) ?> below<br/>
			Note: Images may take a few moments to upload.</p>
		
		<div class="left">
		<?= @template('_form')?>
		</div>
		
		<div class="left" style="">
			<img src="/media/com_calendar/uploads/day_<?=$day->filename?>" width="550" />
		</div>
	</div>
</div>