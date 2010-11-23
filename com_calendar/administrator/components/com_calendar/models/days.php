<?php
defined('KOOWA') or die;


class ComCalendarModelDays extends KModelTable {
	
	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state
			->insert('date', 'date')
			->insert('id', 'int')
			->insert('month', 'date');
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
		parent::_buildQueryWhere($query);
	}
}