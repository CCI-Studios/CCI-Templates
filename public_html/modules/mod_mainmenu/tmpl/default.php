<?php

// no direct access
defined('_JEXEC') or die('Restricted access');

if ( ! defined('modMainMenuXMLCallbackDefined') )
{
function modMainMenuXMLCallback(&$node, $args)
{
	$user	= &JFactory::getUser();
	$menu	= &JSite::getMenu();
	$active	= $menu->getActive();
	$path	= isset($active) ? array_reverse($active->tree) : null;
	
	if (($args['end']) && ($node->attributes('level') >= $args['end']))
	{
		$children = $node->children();
		foreach ($node->children() as $child)
		{
			if ($child->name() == 'ul') {
				$node->removeChild($child);
			}
		}
	}

	if ($node->name() == 'ul') {
		$children = count($node->children());
		foreach ($node->children() as $index=>$child)
		{
			if ($child->attributes('access') > $user->get('aid', 0)) {
				$node->removeChild($child);
			}
			
			if ($index === 0) {
				if ($child->attributes('class')) {
					$child->addAttribute('class', $child->attributes('class').' first');
				} else {
					$child->addAttribute('class', 'first');
				}
			}				
			if ($index === $children - 1) {
				if ($child->attributes('class')) {
					$child->addAttribute('class', $child->attributes('class').' last');
				} else {
					$child->addAttribute('class', 'last');
				}
			}
		}
	}

	if (($node->name() == 'li') && isset($node->ul)) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' parent');
		} else {
			$node->addAttribute('class', 'parent');
		}
	}

	if (isset($path) && (in_array($node->attributes('id'), $path) || in_array($node->attributes('rel'), $path)))
	{
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' active');
		} else {
			$node->addAttribute('class', 'active');
		}
	}
	else
	{
		if (isset($args['children']) && !$args['children'])
		{
			$children = $node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}
	}

	if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' item'.$id);
		} else {
			$node->addAttribute('class', 'item'.$id);
		}
	}

	if (isset($path) && $node->attributes('id') == $path[0]) {
		$node->addAttribute('id', 'current');
	} else {
		$node->removeAttribute('id');
	}
	$node->removeAttribute('rel');
	$node->removeAttribute('level');
	$node->removeAttribute('access');
}
	define('modMainMenuXMLCallbackDefined', true);
}

modMainMenuHelper::render($params, 'modMainMenuXMLCallback');
