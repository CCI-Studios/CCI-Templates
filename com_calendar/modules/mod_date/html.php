<?php
defined('KOOWA') or die;

class ModDateHtml extends ModDefaultHtml {
	
	public function display() {
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);

		if (KRequest::get('get.option', 'cmd') == 'com_calendar' &&
			KRequest::get('get.view', 'cmd') == 'day') {
			$day = KFactory::tmp('site::com.calendar.model.days')
				->set('date', KRequest::get('get.date', 'date', date('Y-m-d')))
				->limit(1)
				->getList()->current();
			$found = true;
		}
		
		if (!$day) {
			$day = KFactory::tmp('site::com.calendar.model.days')
				->set('id', $params->get('available_day_id'))
				->limit(1)
				->getList()->current();
			$found = false;
		}

		$this->assign('day', $day);
		$this->assign('found', $found);
		parent::display();
	}
}
