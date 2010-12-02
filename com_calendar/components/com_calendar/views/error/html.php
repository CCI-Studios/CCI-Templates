<?php
defined('KOOWA') or die;

class ComCalendarViewErrorHtml extends ComCalendarViewHtml {
	
	public function display() {
		JFactory::getDocument()->setTitle('Processing Error');
		
		return parent::display();
	}
}