<?php
defined( '_JEXEC' ) or die( 'Restricted access' );

echo KFactory::tmp('site::mod.datestrip.html', array(
	'params'  => $params,
	'module'  => $module,
	'attribs' => $attribs
))->display();