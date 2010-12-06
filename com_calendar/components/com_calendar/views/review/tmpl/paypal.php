<?= JHTML::_('behavior.formvalidation'); ?>
<script language="javascript">
function myValidate(f) {
   if (document.formvalidator.isValid(f)) {
      return true; 
   }
   else {
      var msg = 'Please complete all required fields.';
      alert(msg);
   }
   return false;
}
</script>

<div class="com_calendar">
	<div class="com_review">
		<h1>What's Your Day? Donation Details</h1>
		
		<p>Please review your order and enter your information below. Once you have entered all necessary information, simply click the "Get My Day!"
			button and you will be redirected to the PayPal payment page. On that page, simply click "Pay with credit card" to complete your transaction.</p>
		
		<?=@template('_prices')?>
		
		<div class="order_form">
			<form action="<?=@route('view=review')?>" method="post" onSubmit="return myValidate(this);" class="form-validate" >
				<input type="hidden" name="action" value="checkoutpaypal" />
				<label for="firstname_field"><?=@text('First Name')?>:</label>
				<input type="text" name="firstname" id="firstname_field" class="required" />

				<label for="lastname_field"><?=@text('Last Name')?>:</label>
				<input type="text" name="lastname" id="lastname_field" class="required" />
				
				<label for="email_field"><?=@text('Email')?>:</label>
				<input type="text" name="email" id="email_field" class="required" />

				<div class="clear"></div>
				<input type="submit" value="Get My Day!" />
			</form>
		</div>
	</div>
</div>
