<form enctype="multipart/form-data" action="<?= @route('view=datesetting')?>" method="post" id="mainform" name="mainForm">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
	
	<label for="title_field"><?=@text('Title 1')?>:</label>
	<input type="text" name="title" id="title_field" />
	
	<label for="dedication_field"><?=@text('Title 2')?>:</label>
	<input type="text" name="dedication" id="dedication_field" />
	
	<label for="link_field"><?=@text('Link')?>:</label>
	<input type="text" name="link" id="link_field" />
	
	<label for="file_upload_field"><?=@text('Image')?>:</label>
	<input type="file" id="field_upload_field" name="file_upload" />
	
	<label for="description_field"><?=@text('Description')?>:</label>
	<textarea id="description_field" name="description"></textarea>
	
	<br/>
	<input type="submit" />
	
	<input type="hidden" name="action" value="savesettings" />
</form>