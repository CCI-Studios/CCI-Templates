<?php
defined('KOOWA') or die;

class ModDateHtml extends ModDefaultHtml {
	
	public function display() {
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);

		if (KRequest::get('get.option', 'cmd') == 'com_calendar' &&
			KRequest::get('get.view', 'cmd') == 'day') {
			$date = KRequest::get('get.date', 'date', date('Y-m-d'));
		} else {
			$date = date('Y-m-d');
		}
				
		$today = KFactory::tmp('site::com.calendar.model.days')
			->set('date', $date)
			->limit(1)
			->getList()->current();
		$blank = KFactory::tmp('site::com.calendar.model.days')
			->set('id', $params->get('available_day_id'))
			->limit(1)
			->getList()->current();
				
		if ($today) {
			$day = $today;
		} else {
			$day = $blank;
		}
			
		$this->assign('date', date('F d, Y'));
		$this->assign('today', $today);
		$this->assign('blank', $blank);
		$this->assign('day', $day);
		parent::display();
	}
}
