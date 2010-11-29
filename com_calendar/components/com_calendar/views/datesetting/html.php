<?php
defined('KOOWA') or die;

class ComCalendarViewDateSettingHtml extends ComCalendarViewHtml {
	
	
	public function display() {
		$pending_ids = KRequest::get('session.com.calendar.days.selected', 'raw');
		$day = KFactory::get('site::com.calendar.model.days')
				->set('id', $pending_ids[0])
				->getList()->current();
				
		$this->assign('day', $day);
		return parent::display();
	}
}