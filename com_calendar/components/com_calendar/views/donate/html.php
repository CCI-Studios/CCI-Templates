<?php
defined('KOOWA') or die;

class ComCalendarViewDonateHtml extends ComCalendarViewHtml {
	
	public function display() {
		$layout = KRequest::get('get.layout', 'string', 'default');
		
		$template = '';
		switch($layout) {
			case 'edit_date':
				$template = $this->_edit_date();
				break;
			case 'checkout':
				$template = $this->_checkout();
				break;
			case 'default':
			default:
				$template = $this->_default();
				break;
		}
		
		$this->assign('template', $template);
		return parent::display();
	}
	
	protected function _default() {
		$date 	= KRequest::get('get.date', 'date', date('Y-m-01'));
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
					->set('month', $date)
					->sort('date')
					->getList();					
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		$blank	= $params->get('available_day_id');
		$blank = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $blank)
					->getItem();
	
		$this->assign('title', JText::_('What\'s your day?'));
		$this->assign('days', $days);
		$this->assign('blank', $blank);
		$this->assign('month', $month);
		$this->assign('year', $year);
		
		$this->assign('days_in_month', cal_days_in_month(CAL_GREGORIAN, $month, $year));
		$this->assign('day_offset', date('N', mktime(0,0,0, $month, 01, $year)));
		$this->assign('pending_dates', $pending_dates);
		return '_default';
	}
	
	protected function _edit_date() { }
	
	protected function _checkout() { }
}