<?php
defined('KOOWA') or die;
jimport('joomla.plugin');

$mainframe->registerEvent('onAfterDispatch', 'plgCalendarBG');

function plgCalendarBG() {
	// dont run on calendar pages
	$option = KRequest::get('get.option', 'cmd');
	$view	= KRequest::get('get.view', 'cmd');
	if ($option === 'calendar') {
		if ($view === 'day' ||
			$view === 'month' ||
			$view === 'donate' ||
			$view === 'review') {
			return;
		}
	}

	$today = KFactory::tmp('admin::com.calendar.model.days')
				->set('date', date('Y-m-d'))
				->limit(1)
				->getList()->current();				
				
	if (!$today) {
		$component 	= JComponentHelper::getComponent('com_calendar');
		$params 	= new JParameter($component->params);
		$blank		= $params->get('available_day_id');		
		$today 		= KFactory::tmp('site::com.calendar.model.days')
						->set('id', $blank)
						->getList()->current();
	}
	
	$document = &JFactory::getDocument();
	$css = 	"#content > div > div {".
			"	background: url(/media/com_calendar/uploads/day_{$today->filename}) top left no-repeat; }";
	$document->addStyleDeclaration($css);
}