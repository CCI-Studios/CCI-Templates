<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

echo KFactory::get('site::mod.date.html', array(
	'params'  => $params,
	'module'  => $module,
	'attribs' => $attribs
))->display();