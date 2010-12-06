<?php
defined('KOOWA') or die;

class ComCalendarViewReviewHtml extends ComCalendarViewHtml {

	public function display() {		
		JFactory::getDocument()->setTitle('Donation Details');
		
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');
		
		$days = KFactory::tmp('site::com.calendar.model.days')
				->set('ids', $pending)
				->set('status', 1)
				->sort('date')
				->getList();

		$this->assign('days', $days);
		return parent::display();
	}
	
}