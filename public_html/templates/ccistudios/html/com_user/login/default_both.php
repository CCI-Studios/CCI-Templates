<div class="joomla">
	<div class="user">
		<h1><?= $this->params->get('page_title'); ?></h1>
		
		<div class="description">
			<?= $this->params->get('description_login_text') ?>
		</div>
		
		<?= $this->loadTemplate('signin')?>
	</div>
</div>