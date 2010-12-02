<?php
defined('KOOWA') or die;

class ComCalendarViewClearHtml extends ComCalendarViewHtml {
	
	public function display() {
		$days = KFactory::get('site::com.calendar.model.days')
				->set('old', true)
				->getList();
				
		$ids = array();
		foreach($days as $day) {
			$day->delete();
			$ids[] = $day->id;
		}		
		
		$this->assign('ids', $ids);
		return parent::display();
	}
}
