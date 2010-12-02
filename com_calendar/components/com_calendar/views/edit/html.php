<?php
defined('KOOWA') or die;

class ComCalendarViewEditHtml extends ComCalendarViewHtml {
	
	
	public function display() {
		$date = KRequest::get('get.date', 'date');

		$day = KFactory::tmp('site::com.calendar.model.days')
					->set('date', $date)
					->limit(1)
					->getList()->current();
		
		JFactory::getDocument()->setTitle('Edit '.date('F d, Y', strtotime($day->date)));

		if (KFactory::get('lib.koowa.user')->id !== $day->user_id) {
			KFactory::get('lib.joomla.application')->redirect('/index.php?option=com_calendar&view=user');
		}
			
		$this->assign('day', $day);
		return parent::display();
	}
}