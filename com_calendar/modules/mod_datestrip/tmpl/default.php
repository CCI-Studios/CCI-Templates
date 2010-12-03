<script src="media://com_calendar/js/mod_datestrip.js" />
<style rel="stylesheet">
.mod_datestrip ul {
	list-style: none;
	margin: 0;
	padding: 0;
	
	position: absolute;
	top: 0;
	left: -1.95em;
}
.mod_datestrip ul.months { right: -1.95em; left: auto; }

.mod_datestrip li {
	position: relative;
	display: block;
	text-align: center;
	padding: 0;
	margin: 0;
	
	color: white;
}

.mod_datestrip li.active ,
.mod_datestrip li:hover { color: #c2398e; }

.mod_datestrip li > div {
	position: absolute;
	top: 0;
	left: 100%;
	border: 2px solid #C2398E;
	cursor: pointer;
	display: none;
}
.mod_datestrip .months li div { right: 100%; left: auto; }
.mod_datestrip li:hover div { display: block; }
</style>


<? if ($type == 0): ?>
	<?= @template('_days')?>
<? else: ?>
	<?= @template('_months')?>
<? endif;?>