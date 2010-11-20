<?php

class ComCalendarToolbarButtonResize extends KToolbarButtonDefault {
	
	public function __construct(KConfig $config) {
		$config->icon = 'icon-32-move';
		
		parent::__construct($config);
	}
	
	public function getOnClick() {
		$option	= KRequest::get('get.option', 'cmd');
		$view	= KRequest::get('get.view', 'cmd');
		$token	= JUtility::getToken();
		$json 	= "{method:'post', url:'index.php?option=$option&view=$view', params:{action:'resize', _token:'$token'}}";

		$msg 	= JText::_('Are you sure you want to recreate all thumbnails?');
		return 'var answer = confirm(\''.$msg.'\');'
			.'if(answer){new KForm('.$json.').submit();} '
			.'else { return false; }';
	}
	
}