<div class="joomla">
	<div class="user">
		<h1><?= $this->params->get('page_title'); ?></h1>
		
		<div class="description">
			<?= $this->params->get('description_login_text') ?>
		</div>
		
		<div class="user_signin">
			<h2>Sign in</h2>
			<p>Fill in your information below to login.</p>
			
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
		
	</div>
</div>