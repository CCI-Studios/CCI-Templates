<?php

class ModCalendarHtml extends ModDefaultHtml {
	
	public function display() {
		$component 		= JComponentHelper::getComponent('com_calendar');
		$cParams 		= new JParameter($component->params);
		$blank_month	= $cParams->get('available_month_id');
		$blank_year		= $cParams->get('available_year_id');

		$date = date('Y-m');
		list($year, $month) = explode('-', $date);

		if ($this->params->get('is_year') === '1') {
			$today = $this->_getYear($month, $year, $blank_year);
		} else {
			$today = $this->_getMonth($month, $year, $blank_month);
		}
		
		$this->assign('row', $today);
		parent::display();
	}
	
	protected function _getMonth($month, $year, $default) {
		$table = KFactory::tmp('admin::com.calendar.database.table.sponsors');
		$query = $table->getDatabase()->getQuery()
				->where('MONTH(date)', '=', $month)
				->where('YEAR(date)', '=', $year)
				->where('calendar_sponsor_id', '=', $default, 'or')
				->order('calendar_sponsor_id', 'desc')
				->limit(2);
		$result = $table->select($query);

		if ((count($result) === 2 && $result->current()->id != $default) || count($result) === 1) {
			return $result->current();
		} else {
			$result->next();
			return $result->current();
		}
	}
	
	protected function _getYear($month, $year, $default) {
		$table = KFactory::tmp('admin::com.calendar.database.table.sponsors');
		$query = $table->getDatabase()->getQuery()
				->where("((YEAR(date) = '".$year."' AND MONTH(date) = '12') OR ".
					"(YEAR(date) = '".($year+1)."' AND MONTH(date) <> '12'))")
				->where('calendar_sponsor_id', '=', $default, 'or')
				->order('calendar_sponsor_id', 'desc')
				->limit(2);	
		$result = $table->select($query);
				
		if ((count($result) === 2 && $result->current()->id != $default) || count($result) === 1) {
			return $result->current();
		} else {
			$result->next();
			return $result->current();
		}
	}
}
