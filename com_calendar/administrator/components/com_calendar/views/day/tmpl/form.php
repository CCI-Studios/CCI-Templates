<?php defined('KOOWA') or die; ?>

<form action="<?= @route('id='.$day->id)?>" id="mainform" name="adminForm" class="adminform">
	<div style="width: 66%; float: left;">
		<fieldset>
			<legend>Date Details
			
			<label class="mainlabel">Owner:</label>
			<input type="text" name="user_id" value="<?=$day->user_id?>" /><br/>
			
			<label class="mainlabel">Description:</label><br/>
			<label class="mainlabel">Enabled:</label><br/>
			<label class="mainlabel">Owner:</label><br/>
			<label class="mainlabel">Purchase Date:</label><br/>
			<label class="mainlabel">Transaction ID:</label><br/>
			<label class="mainlabel">Date:</label><br>
		</fieldset>
	</div>
		
	<div style="width: 33%; float: left;">
		<fieldset>
			<legend>Image:</legend>

			<label class="mainlabel">Filename:</label><br/>
			
		</fieldset>
	</div>
</form>

<style src="media://com_default/css/form.css" />