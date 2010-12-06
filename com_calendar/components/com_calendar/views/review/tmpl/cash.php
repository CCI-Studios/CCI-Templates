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
		
		<p>Please review your order and enter your payment information below. Once you have entered all necessary information, simply click the "Get My Day!"
			button to finalize your donation.</p>
		
		<?=@template('_prices')?>
		
		<div class="order_form">
			<form action="<?=@route('view=review')?>" method="post" onSubmit="return myValidate(this);" class="form-validate" >
			
				<input type="hidden" name="action" value="checkoutcash" />
				<?=@template('_checkout')?>
			</form>
		</div>
	</div>
</div>
