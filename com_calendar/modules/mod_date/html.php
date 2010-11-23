<?php

class ModDateHtml extends ModDefaultHtml {
	
	public function display() {
		$date = KRequest::get('get.date', 'date', date('Y-m-d'));
		$view = KRequest::get('get.view', 'cmd', 'day');
		

		$day	= substr($date, 8, 2);
		$month	= substr($date, 5, 2);
		$year	= substr($date, 0, 4);
		$month_name = date('F', mktime(0,0,0, $month, 1, $year));
		
		if ($view === 'day') {
			$title = KFactory::tmp('admin::com.calendar.model.days')
						->set('date', $date)
						->limit(1)
						->getList()->current();
			if ($title) {
				$title = $title->user_name;
			} else {
				$title = "AVAILABLE";
			}
		} else {
			$title = "SPONSOR NAME";
		}
		
		
		$this->assign('month_name', $month_name);
		$this->assign('month', $month);
		$this->assign('day', $day);
		$this->assign('year', $year);
		$this->assign('title', $title);
		parent::display();
	}
}
