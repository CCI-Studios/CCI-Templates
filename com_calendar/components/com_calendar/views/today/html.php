<?php
defined('KOOWA') or die;

class ComCalendarViewTodayHtml extends ComDefaultViewHtml {

	public function display() {
		$this->_auto_assign = false;
		$today = KFactory::tmp('site::com.calendar.model.sponsors')->getList();
	
		if (count($today) > 0) {
			$today = $today->current();
		} else {
			$today = null;
		}
		
		$this->assign('today', $today);
		return parent::display();
	}
}