<?php
/**
* @package   Template Overrides YOOtheme
* @version   1.5.8 2009-11-30 14:31:42
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) 2007 - 2009 YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div class="joomla <?php echo $this->params->get('pageclass_sfx')?>">
	
	<div class="user">

		<h1 class="pagetitle"><?php echo JText::_('Confirm your Account'); ?></h1>

		<p><?php echo JText::_('RESET_PASSWORD_CONFIRM_DESCRIPTION'); ?></p>
		
		<br/>
		<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" class="josForm form-validate">
			<input type="hidden" name="option" value="com_user" />
			<input type="hidden" name="task" value="confirmreset" />
			
			<div>
				<label for="username"><?php echo JText::_('Email'); ?></label>
				<input id="username" name="username" type="text" />
			</div>
			
			<div>
				<label for="token"><?php echo JText::_('Token'); ?>:</label>
				<input id="token" name="token" type="text" class="required" size="36" />
			</div>
			<div>
				<button type="submit"><?php echo JText::_('Submit'); ?></button>
			</div>
			<?php echo JHTML::_( 'form.token' ); ?>
		</form>
	
	</div>
</div>