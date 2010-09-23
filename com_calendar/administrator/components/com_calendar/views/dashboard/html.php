<?php
defined('KOOWA') or die;

class ComCalendarViewDashboardHtml extends ComCalendarViewHtml {

	public function display() {
		KFactory::get('admin::com.calendar.toolbar.dashboard')
			->reset()
			->append('config');
	
		return parent::display();
	}
}