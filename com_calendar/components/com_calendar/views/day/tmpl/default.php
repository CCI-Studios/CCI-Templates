<div class="com_calendar"><div class="daily_image">
	<div class="image">
		<img src="/media/com_calendar/uploads/day_<?=$today->filename?>" />
	</div>
	
	<div class="description"><div>
		<h2><?= $today->title ?></h2>
		<?= $today->description ?>
	</div></div>
</div></div>

<style src="media://com_calendar/css/calendar.css" />
<? JHTML::_('behavior.mootools'); ?>
<script src="media://com_calendar/js/daily.js" />