<?php defined('KOOWA') or die; ?>

<form action="<?= @route()?>" method="post" id="mainform" name="adminForm" class="adminform">

	<div style="width: 60%; float: left;">
		<fieldset>
			<legend>Date Details</legend>
			
			<label for="name_field" class="mainlabel">Name:</label>
			<input type="text" id="name_field" name="name" value="" /><br/>
			
			<label for="email_field" class="mainlabel">Email:</label>
			<input type="text" id="email_field" name="email" value="" /><br/>
		</fieldset>
	</div>
</form>

<style src="media://com_default/css/form.css" />
<script src="media://lib_koowa/js/koowa.js" />