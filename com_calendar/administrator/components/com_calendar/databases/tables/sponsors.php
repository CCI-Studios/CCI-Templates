<?php
defined('KOOWA') or die;

class ComCalendarDatabaseTableSponsors extends KDatabaseTableDefault {
	
	protected function _initialize(KConfig $config) {
		/*$uploadable = KFactory::get('admin::com.calendar.database.behavior.uploadable', array(
			'columns'	=> 'filename'
			'size'		=> array(300, 200);
		));
		$config->behaviors = array($uploadable);*/
		parent::_initialize($config);
	}
}