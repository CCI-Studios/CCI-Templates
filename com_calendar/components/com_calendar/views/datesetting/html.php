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
		
		JFactory::getDocument()->setTitle('Details for '.date('F d, Y', strtotime($day->date)));

		if (count($days) == 0) {
			if (KFactory::get('lib.koowa.user')->gid >= 19) {
				KFactory::get('lib.joomla.application')->redirect('/index.php?option=com_calendar&view=method');
			} else {
				KFactory::get('lib.joomla.application')->redirect('/index.php?option=com_calendar&view=review');
			}
		}
			
		$this->assign('day', $day);
		return parent::display();
	}
}