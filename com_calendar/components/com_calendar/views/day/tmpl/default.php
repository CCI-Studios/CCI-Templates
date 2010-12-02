<div class="com_calendar wide"><div class="daily_image">
	<div class="image">
		<? if ($today->filename): ?>
			<img src="/media/com_calendar/uploads/day_<?=$today->filename?>" />
		<? else: ?>
			<img src="/media/com_calendar/uploads/day_<?=$pending->filename?>" />
		<? endif; ?>
	</div>
	
	<div class="description"><div>
		<? if ($today->title || $today->link): ?>
		<h1>
			<?= $today->title ?>
			<? if($today->link): ?>
				<span class="link">
					- 
					<a href="<?=$today->link?>" target="_blank">
						view website
					</a>
				</span>
			<? endif; ?>
		</h1>
		<? endif; ?>
		<?= $today->description ?>
	</div></div>
</div></div>

<style src="media://com_calendar/css/calendar.css" />
<? JHTML::_('behavior.mootools'); ?>
<script src="media://com_calendar/js/daily.js" /></script>