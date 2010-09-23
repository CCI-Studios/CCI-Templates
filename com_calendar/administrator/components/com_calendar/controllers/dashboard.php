<?php
defined('KOOWA') or die;

class ComCalendarControllerDashboard extends ComDefaultControllerDefault {

	public function _initialize(KConfig $config) {
		$config->append(array(
			'request'	=> array('layout'=>'default'),
		));
		
		parent::_initialize($config);
	}

	public function displayView(KCommandContext $context) {
		KRequest::set('get.hidemainmenu', '0');
		
		return parent::displayView($context);
	}
}