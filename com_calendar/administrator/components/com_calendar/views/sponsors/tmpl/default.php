<?php defined('KOOWA') or die; ?>

<form action="<?=@route()?>" method="get">
<table class="adminlist">
	<thead>
		<tr>
			<th width="5">#</th>
			<th width="20" align="center">&nbsp;</th>
			<th width="20" align="center"><?=@helper('grid.sort', array('state'=>$state, 'column'=>'date'))?></th>
			<th width="150" align="center"><?= @text('Preview')?></th>
			<th><?=@helper('grid.sort', array('state'=>$state, 'column'=>'title'))?></th>
			<th width="75"><?=@text('Invoice')?></th>
			<th width="50" align="center"><?=@helper('grid.sort', array('state'=>$state, 'column'=>'enabled'))?></th>
			<th width="20" align="center"><?=@helper('grid.sort', array('state'=>$state, 'column'=>'id'))?></th>
		</tr>
	</thead>
	
	<tfoot>
		<tr>
			<td colspan="20" align="center">
				<?=@helper('admin::com.default.helper.paginator.pagination', array('state'=>$state, 'total'=>$total))?>
			</td>
	</tfoot>
	
	<tbody>
		<? $i = 1;
		foreach($sponsors as $sponsor): ?>
		<tr>
			<td align="center"><?=$i?></td>
			<td align="center">&nbsp;</td>
			<td align="center"><?=$sponsor->date?></td>
			<td align="center">&nbsp;</td>
			<td>
				<a href="<?=@route('view=sponsor&id='.$sponsor->id)?>">
					<?=$sponsor->title?>
				</a>
			</td>
			<td align="center">
				<? if ($sponsor->calendar_invoice_id): ?>
				<a href="<?=@route('view=invoice&id='.$sponsor->calendar_invoice_id)?>">
					<?=@text('Invoice')?>
				</a>
				<? else: ?>
					<?=@text('No Invoice')?>
				<? endif; ?>
			</td>
			<td align="center"><?=@helper('grid.enable', array('row'=>$sponsor))?></td>
			<td align="center"><?=$sponsor->id?></td>
		</tr>
		<? $i++;
		endforeach; ?>
		
		<? if (!count($sponsors)):?>
		<tr>
			<td colspan="20" align="center">
				<?=@text('No sponsors')?>
			</td>
		<? endif; ?>
	</tbody>
</table>
</form>

<style src="media://com_default/css/admin.css" /> 