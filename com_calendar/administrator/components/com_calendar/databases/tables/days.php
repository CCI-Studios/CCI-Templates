<?php
defined('KOOWA') or die;

class ComCalendarTableDays extends KDatabaseTableDefault {
	
	protected function _initialize(KConfig $config) {
		$config->base = "calendar_days";
		$config->name = "calendar_view_days";
		
		parent::_initialize($config);
	}
	
	
}