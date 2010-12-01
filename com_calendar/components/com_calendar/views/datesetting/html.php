<?php
defined('KOOWA') or die;

class ComCalendarViewDateSettingHtml extends ComCalendarViewHtml {
	
	
	public function display() {
		$pending = KRequest::get('session.com.calendar.days.selected', 'raw');

		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('status', 0)
					->set('ids', $pending)
					->sort('date')
					->limit(1)
					->getList();
		$day = $days->current();

		if (count($days) == 0) {
			KFactory::get('lib.joomla.application')->redirect('/index.php?option=com_calendar&view=review');
		}
			
		$this->assign('day', $day);
		return parent::display();
	}
}