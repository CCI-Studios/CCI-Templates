<?php
defined('KOOWA') or die;

class ComCalendarViewMethodHtml extends ComCalendarViewHtml {
	
	public function display() {
		JFactory::getDocument()->setTitle('Payment Method');
		return parent::display();
	}
}