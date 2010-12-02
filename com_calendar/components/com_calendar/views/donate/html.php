<?php
defined('KOOWA') or die;

class ComCalendarViewDonateHtml extends ComCalendarViewHtml {
	
	public function display() {
		$this->_default();
		return parent::display();
	}
	
	protected function _default() {
		$date 	= KRequest::get('get.date', 'date', date('Y-m-01'));
		if (strtotime($date) < strtotime(date('2011-01-01'))) {
			$date = date('2011-01-01');
		}
		
		$year 	= substr($date, 0, 4);
		$month	= substr($date, 5,2);
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');

		if (count($pending) > 0) {
			$pending_dates = KFactory::tmp('site::com.calendar.model.days')
						->set('ids', $pending)
						->sort('date')
						->getList();
						
		} else {
			$pending_dates = array();
		}

		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('month', date('n', strtotime($date)))
					->set('year', date('Y', strtotime($date)))
					->sort('date')
					->getList();					
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);

		$blank = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $params->get('available_day_id'))
					->getItem();
					
		$pending = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $params->get('pending_day_id'))
					->getItem();
					
	
		$this->assign('title', JText::_('What\'s your day?'));
		$this->assign('days', $days);
		$this->assign('blank', $blank);
		$this->assign('pending', $pending);
		$this->assign('month', $month);
		$this->assign('year', $year);
		
		$this->assign('days_in_month', cal_days_in_month(CAL_GREGORIAN, $month, $year));
		$this->assign('day_offset', date('N', mktime(0,0,0, $month, 01, $year))%7);
		$this->assign('pending_dates', $pending_dates);
	}
}