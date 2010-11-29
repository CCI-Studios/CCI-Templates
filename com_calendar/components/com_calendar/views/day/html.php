<?php
defined('KOOWA') or die;

class ComCalendarViewDayHtml extends ComCalendarViewHtml {

	public function display() {
		$this->_auto_assign = false;
		
		$date = KRequest::get('get.date', 'string', null);
		
		if (!$date) {
			$date = date('Y-m-d');
		}
		
		$today = KFactory::tmp('site::com.calendar.model.days')
					->set('date', $date)
					->limit(1)
					->getList()->current();

		if (!$today) {		
			$component = JComponentHelper::getComponent('com_calendar');
			$params = new JParameter($component->params);
			$blank	= $params->get('available_day_id');
			
			$today = KFactory::tmp('site::com.calendar.model.days')
						->set('id', $blank)
						->getList()->current();
		}
		
		if (strlen($today->link) > 0 && 
			(substr($today->link, 0, 7) !== 'http://' || 
			substr($today->link, 0, 8) !== 'https://')) {
			$today->link = 'http://'.$today->link;
		}
		
		$this->assign('today', $today);
		return parent::display();
	}
}