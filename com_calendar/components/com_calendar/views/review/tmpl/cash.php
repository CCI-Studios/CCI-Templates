<div class="com_calendar">
	<div class="com_review">
		<h1>Review your order</h1>
		
		<p>Please look below to review your order,<br/> thanks</p>
		
		<?=@template('_prices')?>
		
		<div class="order_form">
			<form action="<?=@route('view=review')?>" method="post" name="mainform" id="mainForm">
				<input type="hidden" name="action" value="checkoutcash" />
				<?=@template('_checkout')?>
			</form>
		</div>
	</div>
</div>
