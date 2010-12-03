<div class="user_signup">
	<form action="<?=JRoute::_('index.php?option=com_user');?>" method="post">
		<p>All fields required.</p>
		
		<label class="label-left" id="namemsg" for="name"><?php echo JText::_('Name');?>:</label>
		<input type="text" name="name" id="name" value="" maxlength="50" /><br/>

		<!--<label class="label-left" id="usernamemsg" for="username"><?php echo JText::_( 'User name' ); ?>:</label>
		<input type="text" id="username" name="username" value="" maxlength="25" /><br/>-->

		<label class="label-left" id="emailmsg" for="email"><?php echo JText::_( 'Email' ); ?>:</label>
		<input type="text" id="email" name="email" value="" maxlength="100" /><br/>

		<label class="label-left" id="pwmsg" for="password"><?php echo JText::_( 'Password' ); ?>:</label>
		<input class="inputbox required validate-password" type="password" id="password" name="password" value="" /><br/>
		
		<label class="label-left" id="pw2msg" for="password2"><?php echo JText::_( 'Verify Password' ); ?>:</label>
		<input class="inputbox required validate-passverify" type="password" id="password2" name="password2" value="" /><br/>
		
		<button class="button validate" type="submit"><?php echo JText::_('Register'); ?></button>
		
		<input type="hidden" name="return" value="<?= base64_encode('http://google.com');?>">
		<input type="hidden" name="task" value="register_save" />
		<input type="hidden" name="id" value="0" />
		<input type="hidden" name="gid" value="0" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>