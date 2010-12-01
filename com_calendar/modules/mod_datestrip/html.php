<?php
defined('KOOWA') or die;

class ModDatestripHtml extends ModDefaultHtml {
	
	public function display() {
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);

		$type = $this->params->get('display_type');
		
		$blank = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $params->get('available_day_id'))
					->getList()->current();
		$pending = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $params->get('pending_day_id'))
					->getList()->current();
					
		$date 	= KRequest::get('get.date', 'date', date('Y-m-d'));
		$year 	= substr($date, 0, 4);
		$month 	= substr($date, 5, 2);
		$day	= substr($date, 8, 2);
		
		if ($year < 2011) {
			$year = 2011;
			$date = "$year-$month-$day";
		}
		
					
		if ($type == 0) {
			$days = KFactory::tmp('site::com.calendar.model.days')
					->set('month', $month)
					->set('status', 2)
					->sort('date')
					->getList();
	
		} else {
			$days = KFactory::tmp('site::com.calendar.model.days')
					->set('day', 01)
					->set('status', 2)
					->sort('date')
					->getList();
		}

		
		$this->assign('type', $type);
		$this->assign('date', $date);
		$this->assign('year', $year);
		$this->assign('month', $month);
		$this->assign('day', $day);
		$this->assign('blank', $blank);
		$this->assign('pending', $pending);
		$this->assign('days', $days);
	
		parent::display();
	}
}
