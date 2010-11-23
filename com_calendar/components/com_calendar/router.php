<?php
defined('KOOWA') or die;

function CalendarBuildRoute(&$query) {
	$menu =& JSite::getMenu();
	$itemId = (isset($query['Itemid']))? $query['Itemid']: null;
	if (isset($query['Itemid'])) {
		$item = &$menu->getItem($itemId);
	} else {
		$item = &$menu->getActive();
	}
	$segments = array();
	
	$mView = (isset($item->query['view']))? $item->query['view']: null;
	$mDate = (isset($item->query['date']))? $item->query['date']: null;
	$qView = (isset($query['view']))? $query['view']: null;
	$qDate = (isset($query['date']))? $query['date']: null;
	
	if ($qView) {
		$segments[] = $qView;
		unset($query['view']);
	}
	
	if ($mView) {
		$segments[] = $mView;
	}
	
	if ($qDate) {
		$segments[] = $qDate;
		unset($query['date']);
	}
	
	if ($mDate) {
		$segments[] = $mDate;
	}
	
	
	
	return $segments;
}

function CalendarParseRoute($segments) {
	$vars = array();
	$menu =& JMenu::getInstance();
	$item =& $menu->getActive();

	if (!isset($item)) {
		$vars['view'] = $segments[0];
		$vars['date'] = $segments[1];
	} else {
		$vars['view'] = $item->query['view'];
		$vars['date'] = $item->query['date'];
	}
	
	return $vars;
}