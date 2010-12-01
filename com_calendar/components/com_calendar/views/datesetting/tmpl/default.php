<div class="com_calendar">
	<div class="date_settings">
		<h1>Date Settings For:</h1>
		
		<p>Please enter the details for <?= date('F d, Y', strtotime($day->date)) ?> below<br/>
			Note: Images may take a few moments to upload.</p>
		
		<div class="left">
		<?= @template('_form')?>
		</div>
		
		<div class="left" style="">
			<img src="http://dummyimage.com/550x400/000/f00" />
		</div>
	</div>
</div>