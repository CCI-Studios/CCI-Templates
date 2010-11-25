<?php

class ModDateHtml extends ModDefaultHtml {
	
	public function display() {
		$date = KRequest::get('get.date', 'date', date('Y-m-d'));
		$view = KRequest::get('get.view', 'cmd', 'day');
		
		$component = JComponentHelper::getComponent('com_calendar');
		$params = new JParameter($component->params);
		$blank	= $params->get('available_day_id');

		$day	= substr($date, 8, 2);
		$month	= substr($date, 5, 2);
		$year	= substr($date, 0, 4);
		$month_name = date('F', mktime(0,0,0, $month, 1, $year));
		
		$table = KFactory::tmp('admin::com.calendar.database.table.days');
		$query = $table->getDatabase()->getQuery()
				->where('date', '=', $date)
				->where('calendar_day_id', '=', $blank, 'or')
				->order('calendar_day_id', 'desc')
				->limit(2);
		$result = $table->select($query);		
				
		if ((count($result) === 2 && $result->current()->id != $blank) || count($result) === 1) {
			$today = $result->current();
		} else {
			$today = $result->next();
		}
		
		$title = $today->dedication;		
		
		$this->assign('month_name', $month_name);
		$this->assign('month', $month);
		$this->assign('day', $day);
		$this->assign('year', $year);
		$this->assign('row', $today);
		parent::display();
	}
}
