<?php defined('KOOWA') or die; ?>

<form action="<?=@route()?>" method="get">
<table class="adminlist">
	<thead>
		<tr>
			<th width="5">#</th>
			<th>Date</th>
			<th>Owner</th>
			<th>Preview</th>
			<th>Locked Time</th>
			<th>Purchase Time</th>
			<th width="50" align="center"><?=@helper('grid.sort', array('column'=>'enabled'))?></th>
			<th width="20" align="center"><?=@helper('grid.sort', array('column'=>'id'))?></th>
		</tr>
	</thead>
	
	<tfoot>
		<tr>
			<td colspan="20" align="center">
				<?=@helper('paginator.pagination', array('total'=>$total))?>
			</td>
	</tfoot>
	
	<tbody>
		<? $i = 1;
		foreach($days as $day): ?>
		<tr>
			<td><?= $i ?></td>
			<td>
				<a href="<?= @route('view=day&id='.$day->id)?>">
					<?= $day->date ?>
				</a>
			</td>
			<td align="center"><?= $day->user_name ?></td>
			<td><?= $day->filename ?></td>
			<td><?= $day->locked_at ?></td>
			<td><?= $day->purchased_at ?></td>
			<td align="center"><?= @helper('grid.enable', array('row'=>$day)) ?></td>
			<td align="center"><?= $day->id ?></td>
		</tr>
		<? $i++;
		endforeach; ?>
		
		<? if (!count($days)):?>
		<tr>
			<td colspan="20" align="center">
				<?=@text('No Days Purchased Yet!')?>
			</td>
		<? endif; ?>
	</tbody>
</table>
</form>

<style src="media://com_default/css/admin.css" />