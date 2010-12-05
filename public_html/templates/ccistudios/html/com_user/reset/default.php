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

<div class="joomla <?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	
	<div class="user">
	
		<?php if ( $this->params->get( 'show_page_title' ) ) : ?>
		<h1 class="pagetitle">
			<?php echo $this->escape($this->params->get('page_title')); ?>
		</h1>
		<?php endif; ?>

		<p>To reset your password, please enter the email address you provided when you made your donation in the box below and click submit.
			A verification email will be sent to you. Once you have received your verification email, simply follow the steps outlined in it to reset your password.</p>

		<br/>
		<form action="<?php echo JRoute::_( 'index.php?option=com_user&task=requestreset' ); ?>" method="post" class="josForm form-validate">
			<div>
				<label for="email" ><?php echo JText::_('Email Address'); ?>:</label>
				<input id="email" name="email" type="text" class="required validate-email" />
			</div>
			<div>
				<button type="submit"><?php echo JText::_('Submit'); ?></button>
			</div>
			<?php echo JHTML::_( 'form.token' ); ?>
		</form>

	</div>
</div>