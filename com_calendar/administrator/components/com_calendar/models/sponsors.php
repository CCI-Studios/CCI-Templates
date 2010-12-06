<?php
defined('KOOWA') or die;

class ComCalendarModelSponsors extends KModelTable {

	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state->insert('month', 'int')
			->insert('year', 'int')
			->insert('id', 'int');	
	}
	
	protected function _buildQueryWhere(KDatabaseQuery &$query) {
		parent::_buildQueryWhere($query);
		
		if (is_numeric($this->_state->month)) {
			$query->where('MONTH(date)', '=', $this->_state->month);
		}
		if (is_numeric($this->_state->year)) {
			$query->where('YEAR(date)', '=', $this->_state->year);
		}
		
		if (is_numeric($this->_state->id)) {
			$query->where('calendar_sponsor_id', '=', $this->_state->id);
		}
	}

}