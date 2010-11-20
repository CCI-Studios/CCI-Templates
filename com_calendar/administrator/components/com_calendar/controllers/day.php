<?php
defined('KOOWA') or die;

class ComCalendarControllerDay extends ComDefaultControllerDefault {	
	
	public function _actionResize(KCommandContext $context) {
		$days = $this->getModel()->getList();
		
		foreach ($days as $day) 
			$day->createThumbs();
			
		$this->_redirect = KRequest::get('session.com.dispatcher.referrer', 'url');
		return $days;
	}
	
}