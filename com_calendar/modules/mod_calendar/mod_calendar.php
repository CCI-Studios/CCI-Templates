<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

echo KFactory::tmp('site::mod.calendar.html', array(
	'params'  => $params,
	'module'  => $module,
	'attribs' => $attribs
))->display();