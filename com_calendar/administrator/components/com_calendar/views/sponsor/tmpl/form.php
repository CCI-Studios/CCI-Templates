<?php defined('KOOWA'); ?>

<form action="<?=@route('id='.$sponsor->id)?>" method="post" id="mainform" name="adminForm" class="adminform">
<div class="width66 left">
<fieldset>
	<legend><?=@text('Sponsor Details')?></legend>

	<label for="title_field" class="mainlabel"><?=@text('Title')?>:</label>
	<input type="text" id="title_field" name="title" value="<?=$sponsor->title?>" /><br/>
	
	<label for="description_field" class="mainlabel"><?=@text('Description')?></label>
	editor<br/>
	
	<label for="date_field" class="mainlabel"><?=@text('Date')?>:</label>
	<input type="text" id="date_field" name="date" value="<?=$sponsor->date?>" /><br/>
	
	user<br/>
	invoice<br/>
	
	
	<label for="image_field" class="mainlabel"><?=@text('Image')?>:</label>
	<input type="text" id="image_field" name="image" value="<?=$sponsor->image?>" /><br/>
</fieldset>
</div>

<div class="clr"></div>
</form>


<style src="media://com_default/css/form.css" />