<?php
/**
 * @version		$Id: category.php 569 2010-09-23 12:50:28Z joomlaworks $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.gr
 * @copyright	Copyright (c) 2006 - 2010 JoomlaWorks, a business unit of Nuevvo Webware Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

?>

<!-- Start K2 Category Layout -->
<div id="k2Container" class="itemListView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title')): ?>
	<!-- Page title -->
	<h1>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
	<?php endif; ?>
	
	<?php if(isset($this->links) && count($this->links)): ?>
		<ul>
		<?php foreach($this->links as $key=>$item): ?>
			<?php
				// Load category_item_links.php by default
				$this->item=$item;
				echo $this->loadTemplate('item_links');
			?>
		<?php endforeach; ?>
		</ul>
	<?php endif; ?>

	<!-- Pagination -->
	<?php if(count($this->pagination->getPagesLinks())): ?>
	<div class="k2Pagination">
		<?php if($this->params->get('catPagination')) echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
		<?php if($this->params->get('catPaginationResults')) echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>
</div>
<!-- End K2 Category Layout -->
