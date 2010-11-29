<?php
defined('KOOWA') or die;

class ComCalendarViewReviewHtml extends ComCalendarViewHtml {

	public function display() {
		$days = KFactory::tmp('site::com.calendar.model.days')
					->set('user_id', KFactory::tmp('lib.koowa.user')->id)
					->set('status', 1)
					->getList();

		$this->assign('days', $days);
		return parent::display();
	}
	
}