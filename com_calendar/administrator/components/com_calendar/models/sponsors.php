<?php
defined('KOOWA') or die;

class ComCalendarModelSponsors extends KModelTable {

	public function __construct(KConfig $config) {
		parent::__construct($config);
		
		$this->_state->insert('day', 'int', date('d'))
			->insert('month', 'int', date('m'))
			->insert('year', 'int', date('Y'));		
	}
	
	protected function _buildQueryWhere(KDatabaseQuery &$query) {
		parent::_buildQueryWhere($query);
		
		$app = KFactory::get('lib.joomla.application');

		if ($app->getName() == 'site') {
			$date = $this->_state->year.'-'.$this->_state->month.'-'.$this->_state->day;
			$query->where('date', '=', $date);
		}		
	}

}