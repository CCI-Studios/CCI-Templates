<?php
defined('KOOWA') or die;

class ComCalendarViewThankyouHtml extends ComCalendarViewHtml {
	
	public function display() {
		JFactory::getDocument()->setTitle('Thank You!');
		
		return parent::display();
	}
}