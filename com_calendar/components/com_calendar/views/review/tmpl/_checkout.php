<label for="firstname_field"><?=@text('First Name')?>:</label>
<input type="text" name="firstname" id="firstname_field" class="required" />

<label for="lastname_field"><?=@text('Last Name')?>:</label>
<input type="text" name="lastname" id="lastname_field" class="required" />

<label for="street1_field"><?=@text('Street Address 1')?>:</label>
<input type="text" name="street1" id="street1_field" class="required" />

<label for="street2_field"><?=@text('Street Address 2')?>:</label>
<input type="text" name="street2" id="street2_field" />

<label for="postal_field"><?=@text('Postal Code')?>:</label>
<input type="text" name="postal" id="postal_field" class="required" />

<label for="City_field"><?=@text('City')?>:</label>
<input type="text" name="city" id="city_field" class="required" />

<label for="province_field"><?=@text('Province')?>:</label>
<select name="province" id="province_field" class="required" >
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
<input type="text" name="phone" id="phone_field" class="required" />

<label for="email_field"><?=@text('Email')?>:</label>
<input type="text" name="email" id="email_field" class="required" />

<div class="clear"></div>
<input type="submit" value="Checkout" />