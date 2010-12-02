<?php
defined('KOOWA') or die;


class ComCalendarModelDays extends KModelTable {
	
	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state
			->insert('date', 	'date')
			->insert('id', 		'int')
			->insert('ids', 	'raw')
			->insert('day', 	'int')
			->insert('month', 	'int')
			->insert('year', 	'int')
			->insert('status', 	'int')
			->insert('user_id', 'int')
			->insert('old', 	'boolean')
			;
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query) {

		if ($this->_state->date) {
			$query->where('date', '=', $this->_state->date);
		}
		
		if ($this->_state->day) {
			$query->where('DAY(date)', '=', $this->_state->day);
		}
		
		if ($this->_state->month) {
			$query->where('MONTH(date)', '=', $this->_state->month);
		}
		
		if ($this->_state->year) {
			$query->where('YEAR(date)', '=', $this->_state->year);
		}
		
		
		if (is_numeric($this->_state->id)) {
			$query->where('calendar_day_id', '=', $this->_state->id);
		}
		
		if ($this->_state->ids) {
			$query->where('calendar_day_id', 'IN', $this->_state->ids);
		}
		
		if (is_numeric($this->_state->status)) {
			$query->where('status', '=', $this->_state->status);
		}
		
		if (is_numeric($this->_state->user_id)) {
			$query->where('user_id', '=', $this->_state->user_id);
		}

		if ($this->_state->old) {
			$query->where('TIMEDIFF(NOW(), locked_at) > TIME(\'00:30:00\')');
			$query->where('status', '<>', 2);
		}
		
		parent::_buildQueryWhere($query);
	}
}