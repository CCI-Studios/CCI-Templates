<?php
defined('KOOWA') or die;
jimport('joomla.plugin');

$mainframe->registerEvent('onAfterDispatch', 'plgCalendarBG');

function plgCalendarBG() {
	// dont run on calendar pages
	if (KRequest::get('get.option', 'cmd') === 'calendar')
		return;

	$today = KFactory::tmp('admin::com.calendar.model.days')
				->set('date', date('Y-m-d'))
				->limit(1)
				->getList()->current();
				
	if (!$today) {
		$params = &JComponentHelper::getParams('com_calendar');
		$blank	= $params->get('available_day_id');
		$today = KFactory::tmp('site::com.calendar.model.days')
					->set('id', $blank)
					->getList()->current();
	}
	
	$document = &JFactory::getDocument();
	$css = 	"#content > div > div {".
			"	background: url(/media/com_calendar/uploads/day_{$today->filename}) top left repeat-y; }";
	$document->addStyleDeclaration($css);
	

}