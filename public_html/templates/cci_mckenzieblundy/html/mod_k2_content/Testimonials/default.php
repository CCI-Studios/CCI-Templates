<?php
/**
 * @version		$Id: default.php 565 2010-09-23 11:48:48Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock <?php echo $params->get('moduleclass_sfx'); ?>">

	<?php if($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if(count($items)): ?>
    <?php foreach ($items as $key=>$item):	?>
			<marquee bgcolor="#fff1b7" height="230" scrollamount="2" loop="true" direction="up">
			<div style="text-align: center; font-size: 16px; font-family: Georgia,Times,serif; font-style: italic; color: rgb(102, 102, 102); padding: 15px;">
				<?php echo $item->introtext; ?>
				<p>&emdash;<?php echo $item->title; ?></p>
			</div>
			</marquee>
    <?php endforeach; ?>
  <?php endif; ?>
</div>