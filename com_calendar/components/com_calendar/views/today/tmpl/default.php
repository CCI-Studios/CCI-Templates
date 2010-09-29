<? if ($today): ?>
<div class="sponsorpic">
	<div class="image">
		<img src="<?=$today->filename?>" />
	</div>
	
	<div class="description"><div>
		<?=$today->title?><br/>
		<?=$today->description?>
	</div></div>
</div>
<? else: ?>
	no image for today
<? endif; ?>



<style src="media://com_calendar/css/calendar.css" />