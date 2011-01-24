<?php
function _symlink($src, $target, $path, $prefix = '') {
	if ($prefix) $prefix .= '/';
	
	shell_exec('rm '.$target.$path);
	shell_exec('ln -s '.$src.$prefix.$path.' '.$target.$path);
	echo 'Link: '.$path.'<br/>';
}

$root = str_replace('public_html', '', trim(shell_exec('pwd')));
$site = $root.'public_html/';

/* nooku */
$nooku = $root.'nooku/';

/* template */
$template = $root.'template/';
_symlink($template, $site, 'templates/gtbr_2011');