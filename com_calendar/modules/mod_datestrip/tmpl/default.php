<script src="media://com_calendar/js/mod_datestrip.js" />

<? if ($type == 0): ?>
	<?= @template('_days')?>
<? else: ?>
	<?= @template('_months')?>
<? endif;?>