<?php
defined('KOOWA') or die;

class ComCalendarViewHtml extends ComDefaultViewHtml {
	
	public function display() {
		return JHTML::_('content.prepare', parent::display());
	}
}