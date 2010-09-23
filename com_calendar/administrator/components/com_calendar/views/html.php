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
		$name 	= $this->getName();
		$plural = KInflector::pluralize($name);
		
		if ($name == $plural) {
			KFactory::get('admin::com.calendar.toolbar.'.$name)
				->setTitle('Calendar: <small>'.ucfirst($name).'</small>')
				->append('divider')
				->append('publish')
				->append('unpublish');
		}	
	
		return parent::display();
	}

}