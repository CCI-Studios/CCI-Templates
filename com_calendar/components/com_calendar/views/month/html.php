<?php
defined('KOOWA') or die;

class ComCalendarViewMonthHtml extends ComCalendarViewHtml {

	public function display() {
		$this->_auto_assign = false;
		
		$date = KRequest::get('get.date', 'string', null);
		
		if (!$date) {
			$date = date('Y-m-d');
		}
	
		if (strtotime($date) < strtotime(date('2011-01-01'))) {
			$date = date('2011-01-01');
		}
		
		$year	= substr($date, 0, 4);
		$month	= substr($date, 5, 2);
		
		
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('month', $date)
					->sort('date')
					->getList();
		
		$params = &JComponentHelper::getParams( 'com_calendar' );
		$blank	= $params->get('available_day_id');
		$blank = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $blank)
					->getItem();
					
		$offset = date('N', mktime(0,0,0, $month, 01, $year))%7;
		$this->assign('days', $days);
		$this->assign('blank', $blank);
		$this->assign('days_in_month', cal_days_in_month(CAL_GREGORIAN, $month, $year));
		$this->assign('day_offset', $offset);
		$this->assign('year', $year);
		$this->assign('month', $month);
		return parent::display();
	}
}