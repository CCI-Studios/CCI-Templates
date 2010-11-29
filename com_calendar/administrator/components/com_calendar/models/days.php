<?php
defined('KOOWA') or die;


class ComCalendarModelDays extends KModelTable {
	
	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state
			->insert('date', 'date')
			->insert('id', 'int')
			->insert('ids', 'raw')
			->insert('month', 'date')
			->insert('status', 'int')
			->insert('user_id', 'int')
			;
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query) {

		if ($this->_state->date) {
			$query->where('date', '=', $this->_state->date);
		}
		
		if ($this->_state->month) {
			$query->where('YEAR(date)', '=', substr($this->_state->month, 0, 4));
			$query->where('MONTH(date)', '=', substr($this->_state->month, 5, 2));
		}
		
		if ($this->_state->id) {
			$query->where('calendar_day_id', '=', $this->_state->id);
		}
		
		if ($this->_state->ids) {
			$query->where('calendar_day_id', 'IN', $this->_state->ids);
		}
		
		if ($this->_state->status) {
			$query->where('status', '=', $this->_state->status);
		}
		
		if ($this->_state->user_id) {
			$query->where('user_id', '=', $this->_state->user_id);
		}

		parent::_buildQueryWhere($query);
	}
}