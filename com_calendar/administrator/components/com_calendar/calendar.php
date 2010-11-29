<?php
defined('_JEXEC') or die;
if (!defined('KOOWA')) {
	JError::raiseWarning(500, "Please install the Nooku (Koowa) plugin");
	return;
}

echo KFactory::get('admin::com.calendar.dispatcher')
	->dispatch(KRequest::get('get.view', 'cmd', 'days'));