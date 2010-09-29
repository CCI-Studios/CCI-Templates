<?php
defined('_JEXEC') or die;
if (!defined('KOOWA')) {
	JError::raiseWarning(500, "Please install the Nooku (Koowa) plugin");
	return;
}

KFactory::map('site::com.calendar.model.sponsors', 'admin::com.calendar.model.sponsors');

KFactory::get('site::com.calendar.dispatcher')
	->dispatch(KRequest::get('get.view', 'cmd', 'sponsor'));