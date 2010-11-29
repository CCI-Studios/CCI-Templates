<div class="order_form">
	<form action="<?=@route('view=review')?>" method="post" name="mainform" id="mainForm">
		<input type="hidden" name="action" value="checkout" />
		
		<label for="acct_field"><?=@text('Card Number')?>:</label>
		<input type="text" name="acct" id="acct_field" />

		<div class="clear"></div>
		<input type="radio" name="cardtype" id="visa_field" value="Visa" />
		<label for="visa_field"><?=@text('Visa')?></label>
		<input type="radio" name="cardtype" id="mc_field" value="Mastercard" />
		<label for="mc_field"><?=@text('MasterCard')?></label>
		<div class="clear"></div>
		
		
		<label for="_field"><?=@text('Expiry Date')?>:</label>
		<input type="text" name="exp1" id="_field" value="<?=date('m')?>" style="width: 50px; "/> <input type="text" name="exp2" id="_field" value="<?=date('Y')?>" style="width: 50px; "/>
		
		<label for="csc_field"><?=@text('CSC')?>: <a href="#">What is this?</a></label>
		<input type="text" name="csc" id="csc_field" />
		
		<label for="firstname_field"><?=@text('First Name')?>:</label>
		<input type="text" name="firstname" id="firstname_field" />

		<label for="lastname_field"><?=@text('Last Name')?>:</label>
		<input type="text" name="lastname" id="lastname_field" />
		
		<label for="street1_field"><?=@text('Street Address 1')?>:</label>
		<input type="text" name="street1" id="street1_field" />
		
		<label for="street2_field"><?=@text('Street Address 2')?>:</label>
		<input type="text" name="street2" id="street2_field" />
		
		<label for="postal_field"><?=@text('Postal Code')?>:</label>
		<input type="text" name="postal" id="postal_field" />
		
		<label for="City_field"><?=@text('City')?>:</label>
		<input type="text" name="city" id="city_field" />
		
		<label for="province_field"><?=@text('Province')?>:</label>
		<select name="province" id="province_field">
			<option value="AB">Alberta</option>
			<option value="BC">British Columbia</option>
			<option value="MB">Manitoba</option>
			<option value="NB">New Brunswick</option>
			<option value="NF">Newfoundland</option>
			<option value="NS">Nova Scotia</option>
			<option value="NT">Northwest Territories</option>
			<option value="NU">Nunavut</option>
			<option value="ON">Ontario</option>
			<option value="PE">Prince Edward Island</option>
			<option value="QC">Quebec</option>
			<option value="SK">Saskatchewan</option>
		</select>
		
		<label for="phone_field"><?=@text('Phone Number')?>:</label>
		<input type="text" name="phone" id="phone_field" />
		
		<label for="email_field"><?=@text('Email')?>:</label>
		<input type="text" name="email" id="email_field" />
		
		<div class="clear"></div>
		<input type="submit" value="Checkout" />
		
	</form>
</div>