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