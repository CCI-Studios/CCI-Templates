<?php defined('KOOWA') or die; ?>

<form enctype="multipart/form-data" action="<?= @route('id='.$day->id)?>" method="post" id="mainform" name="adminForm" class="adminform">
	<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
	
	<div style="width: 60%; float: left;">
		<fieldset>
			<legend>Date Details</legend>
			
			<label for="owner_field" class="mainlabel">User Id:</label>
			<input type="text" id="owner_field" name="user_id" value="<?=$day->user_id?>" /><br/>
			
			<label for="date_field" class="mainlabel">Date:</label>
			<input type="text" id="date_field" name="date" value="<?=$day->date?>" /><br>
			
			
			<label for="locked_at_field" class="mainlabel">Locked at:</label>
			<input type="text" id="locked_at_field" name="locked_at_date" value="<?=$day->locked_at?>" /><br/>
			
			<label for="status_field" class="mainlabel">Status:</label>
			<input type="text" id="status_field" name="status" value="<?=$day->status?>" /><br/>
			
			<label for="title_field" class="mainlabel">Title:</label>
			<input type="text" name="title" id="title_field" value="<?=$day->title?>" /><br/>
			
			<label for="link_field" class="mainlabel">Link:</label>
			<input type="text" name="link" id="link_field" value="<?=$day->link?>" /><br/>
			
			<?= @editor(array('editor'=>null, 'width'=>'100%', 'height'=>'300')); ?>
		</fieldset>
	</div>
		
	<div style="width: 40%; float: left;">
		<fieldset>
			<legend>Image:</legend>

			<label class="mainlabel">Upload:</label>
			<input type="file" name="file_upload" /><br/>
			
			<? if ($day->filename): ?>
				<img src="/media/com_calendar/uploads/day_<?= $day->filename ?>" width="100%" title="" class="block" /><br/>
			<? endif; ?>
		</fieldset>
	</div>
</form>

<style src="media://com_default/css/form.css" />
<script src="media://lib_koowa/js/koowa.js" />