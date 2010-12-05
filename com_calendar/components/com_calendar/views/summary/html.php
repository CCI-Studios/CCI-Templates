<?php
defined('KOOWA') or die;

class ComCalendarViewSummaryHtml extends ComCalendarViewHtml {
	
	public function display() {
		JFactory::getDocument()->setTitle('What\'s Your Day? Donation Summary');
		
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');
		if (count($pending)) {
			$pending_dates = KFactory::tmp('site::com.calendar.model.days')
						->set('ids', $pending)
						->sort('date')
						->getList();
		} else {
			$pending_dates = array();
		}
				
		$this->assign('pending', $pending_dates);
		return parent::display();
	}
	
}