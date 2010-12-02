<?php
defined('KOOWA') or die;

class ComCalendarViewUserHtml extends ComCalendarViewHtml {
	
	public function display() {
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('user_id', KFactory::tmp('lib.koowa.user')->id)
					->sort('date')
					->getList();
				
		JFactory::getDocument()->setTitle('User Details');		
		$this->assign('days', $days);
		return parent::display();
	}
}