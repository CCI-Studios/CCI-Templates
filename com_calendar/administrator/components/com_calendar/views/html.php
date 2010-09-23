<?php
defined('KOOWA') or die;

class ComCalendarViewHtml extends ComDefaultViewHtml {
	
	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->views = array(
			'dashboard'		=> JText::_('Dashboard'),
			'sponsors'		=> JText::_('Sponsors'),
		);
	
	}


	public function display() {
		return parent::display();
	}

}