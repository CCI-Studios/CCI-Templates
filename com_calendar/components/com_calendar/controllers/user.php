<?php
defined('KOOWA') or die;

class ComCalendarControllerUser extends ComDefaultControllerDefault {
	public function getRequest() {
		if (KFactory::get('lib.koowa.user')->guest === 1) {
			KFactory::get('lib.koowa.application')->
				redirect('/index.php?option=com_user&view=login&return='.
					base64_encode('index.php?option=com_calendar&view=user'));
		}
				
        return parent::getRequest();
	}
}
?>