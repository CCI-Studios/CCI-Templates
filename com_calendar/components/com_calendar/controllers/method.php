<?php
defined('KOOWA') or die;

class ComCalendarControllerMethod extends ComDefaultControllerDefault {
	
	public function getRequest() {
		if (KFactory::get('lib.koowa.user')->gid < 19) {
			KFactory::get('lib.koowa.application')->
				redirect('/index.php?option=com_calendar&view=review');
		}
				
        return parent::getRequest();
	}	
}