<?= JHTML::_('behavior.formvalidation'); ?>
<script language="javascript">
function myValidate(f) {
   if (document.formvalidator.isValid(f)) {
      return true; 
   }
   else {
      var msg = 'All Fields are required.';
      //if($('email').hasClass('invalid')){msg += '\n\n\t* Invalid E-Mail Address';}
      alert(msg);
   }
   return false;
}
</script>

<div class="com_calendar">
	<div class="com_review">
		<h1>Review your order</h1>
		
		<p>Please look below to review your order,<br/> thanks</p>
		
		<?=@template('_prices')?>
		
		<div class="order_form">
			<form action="<?=@route('view=review')?>" method="post" onSubmit="return myValidate(this);" class="form-validate">
				<input type="hidden" name="action" value="checkout" />
				
				<?=@template('_creditcard')?>	
				<?=@template('_checkout')?>
			</form>
		</div>
	</div>
</div>
