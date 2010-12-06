<div class="com_calendar">
	<div class="date_settings">
		<h1>Day Details For: <?= date('F d, Y', strtotime($day->date)) ?></h1>
		
		<p>Please enter the details for Your Day - <?= date('F d, Y', strtotime($day->date)) ?> - below.  You will be able to add/edit information after your transaction is completed.<br/>
			Note: Images may take a few moments to upload.</p>
		
		<div class="left">
		<?= @template('_form')?>
		</div>
		
		<div class="left" style="margin-top: 20px;">
			<img src="/media/com_calendar/images/legend.png" />
		</div>
	</div>
</div>