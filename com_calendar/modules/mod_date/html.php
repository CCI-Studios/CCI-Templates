<?php
defined('KOOWA') or die;

class ModDateHtml extends ModDefaultHtml {
	
	public function display() {
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		
		$option = KRequest::get('get.option', 'cmd');
		$view 	= KRequest::get('get.view', 'cmd');
		
		if ($option === 'com_calendar' && $view === 'day') {
			$day = KFactory::tmp('site::com.calendar.model.days')
				->set('date', KRequest::get('get.date', 'date', date('Y-m-d')))
				->limit(1)
				->getList()->current();
			
			if ($day) {
				$date	= date('F j, Y', strtotime($day->date));
				$title	= $day->title;
			} else {
				$date	= date('F j, Y');
				$title	= "What's Your Day?";
			}
		} else if ($option == 'com_calendar' && $view === 'month') {
			$date	= KRequest::get('get.date', 'date', date('F d, Y'));
			
			if (strtotime($date) < strtotime(date('2011-01-01'))) {
				$date = date('2011-01-01');
			}
			
			$date	= date('F, Y', strtotime($date));
			$title	= "What's Your Day?";
		} else {
			$date	= date('F j, Y');
			$title	= "What's Your Day?";
		}

		$this->assign('date', $date);
		$this->assign('title', $title);
		parent::display();
	}
}
