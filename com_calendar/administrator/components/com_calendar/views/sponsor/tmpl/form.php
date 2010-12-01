<?php defined('KOOWA'); ?>

<form enctype="multipart/form-data" action="<?=@route('id='.$sponsor->id)?>" method="post" id="mainform" name="adminForm" class="adminform">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	
	<div style="width: 59%; float: left;">
		<fieldset>
			<legend><?=@text('Sponsor Details')?></legend>

			<label for="title_field" class="mainlabel"><?=@text('Title')?>:</label>
			<input type="text" id="title_field" name="title" value="<?=$sponsor->title?>" /><br/>
	
			<label for="date_field" class="mainlabel"><?=@text('Date')?>:</label>
			<input type="text" id="date_field" name="date" value="<?=$sponsor->date?>" /><br/>
	
			<label for="link_field" class="mainlabel"><?=@text('Link')?>:</label>
			<input type="text" id="link_field" name="link" value="<?=$sponsor->link?>" /><br/>
			<label for="target_field" class="mainlabel"><?=@text('Target')?>:</label>
			<input type="text" id="target_field" name="target" value="<?=$sponsor->target?>" /><br/>
	
			<label for="year_field" class="mainlabel"><?=@text('Year')?>:</label>
			<input type="text" id="year_field" name="year" value="<?=$sponsor->year?>" /><br/>
		</fieldset>
	</div>
	
	<div style="width: 40%; float: left;">
		<fieldset>
			<legend>Image:</legend>

			<label class="mainlabel">Upload:</label>
			<input type="file" name="file_upload" /><br/>
			
			<? if ($sponsor->filename): ?>
				<img src="/media/com_calendar/uploads/sponsors/<?= $sponsor->filename ?>" title="" class="block" /><br/>
			<? endif; ?>
		</fieldset>
	</div>

<div class="clr"></div>
</form>


<style src="media://com_default/css/form.css" />
<script src="media://lib_koowa/js/koowa.js" />