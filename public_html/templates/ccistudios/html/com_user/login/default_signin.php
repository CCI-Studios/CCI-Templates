<div class="user_signin">
	<form action="<?= JRoute::_('index.php', true, $this->params->get('usesecure')) ?>" method="post" name="com-login" id="com-form-login">
		<label class="label-left" for="username"><?php echo JText::_('Email') ?></label>
		<input name="username" id="username" type="text" class="inputbox" alt="username" size="18" 
			value="<?= KRequest::get('get.email', 'string', '') ?>"/>

		<label class="label-left" for="passwd"><?php echo JText::_('Password') ?></label>
		<input type="password" id="passwd" name="passwd" class="inputbox" size="18" alt="password" />

		<?php if(JPluginHelper::isEnabled('system', 'remember')) : ?>
			<div class="clear"></div>
			<input type="checkbox" id="remember" name="remember" class="inputbox" value="yes" alt="Remember Me" />
			<label for="remember"><?php echo JText::_('Remember me') ?></label>
		<?php endif; ?>

		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('LOGIN') ?>" /><br/>
		
		
		<a href="<?= JRoute::_( 'index.php?option=com_user&view=reset' ); ?>">
			<?= JText::_('FORGOT_YOUR_PASSWORD'); ?>
		</a>
		<!--<a href="<?= JRoute::_( 'index.php?option=com_user&view=remind' ); ?>">
			<?= JText::_('FORGOT_YOUR_USERNAME'); ?>
		</a>-->
		<!--<a href="<?= JRoute::_( 'index.php?option=com_user&task=register' ); ?>">
			<?= JText::_('REGISTER'); ?>
		</a>-->
		
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<?= $this->return; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>