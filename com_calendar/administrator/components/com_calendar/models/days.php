<?php
defined('KOOWA') or die;


class ComCalendarModelDays extends KModelTable {
	
	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state
			->insert('date', 'date')
			->insert('month', 'date');
	}
	
	protected function _buildQueryWhere(KDatabaseQuery $query) {

		if ($this->_state->date) {
			$query->where('date', '=', $this->_state->date);
		}
		
		if ($this->_state->month) {
			$query->where('YEAR(date)', '=', 'YEAR('.$this->_state->month.')');
			$query->where("MONTH(date) = MONTH(\"".$this->_state->month."\")");
		}
		
//
		parent::_buildQueryWhere($query);
	}
	
}