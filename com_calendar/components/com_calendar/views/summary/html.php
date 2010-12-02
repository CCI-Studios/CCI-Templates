<?php
defined('KOOWA') or die;

class ComCalendarViewSummaryHtml extends ComCalendarViewHtml {
	
	public function display() {
		JFactory::getDocument()->setTitle('Summary');
		
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');
		$pending_dates = KFactory::tmp('site::com.calendar.model.days')
					->set('ids', $pending)
					->sort('date')
					->getList();
				
		$this->assign('pending', $pending_dates);
		return parent::display();
	}
	
}