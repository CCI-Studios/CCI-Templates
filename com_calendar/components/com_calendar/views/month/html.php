<?php
defined('KOOWA') or die;

class ComCalendarViewMonthHtml extends ComDefaultViewHtml {

	public function display() {
		$this->_auto_assign = false;
		
		$date = KRequest::get('get.date', 'string', null);
		
		if (!$date) {
			$date = date('Y-m-d');
		}
		
		$days = KFactory::get('site::com.calendar.model.days')
					->set('month', $date)
					->getList();

		$this->assign('days', $days);
		return parent::display();
	}
}