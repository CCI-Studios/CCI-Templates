<?php
defined('KOOWA') or die;
jimport('joomla.plugin');

$mainframe->registerEvent('onAfterDispatch', 'plgCalendarBG');

function plgCalendarBG() {
	// dont run on calendar pages
	$option = KRequest::get('get.option', 'cmd');
	$view	= KRequest::get('get.view', 'cmd');	
	
	if ($option === 'com_calendar') {
		if ($view === 'day' ||
			$view === 'month' ||
			$view === 'donate') {
			return;
		}
	}

	$component 	= JComponentHelper::getComponent('com_calendar');
	$params 	= new JParameter($component->params);
	$today 		= KFactory::tmp('site::com.calendar.model.days')
					->set('id', $params->get('available_day_id'))
					->getList()->current();

	$document = &JFactory::getDocument();
	$css = 	"#content > div > div > div {".
			"	background: url(/media/com_calendar/uploads/day_{$today->filename}) top left no-repeat; }";
	$document->addStyleDeclaration($css);
}