<?php

function _symlink($source, $destination, $path, $prefix = '') {
	if ($prefix) $prefix .= '/';
	
	shell_exec("rm ".$destination.$path);
	shell_exec("ln -s ".$source.$prefix.$path.' '.$destination.$path);
	echo $source.$prefix.$path.'<br/>'.$destination.$path.'<br/><br/>';
}
$root 		= "/home/staging/subdomains/calendar/";
$site		= $root."public_html/";
$nooku 		= $root."nooku/";
$calendar	= $root."com_calendar/";

/* install nooku */
_symlink($nooku, $site, 'administrator/components/com_default');
_symlink($nooku, $site, 'administrator/modules/com_default');
_symlink($nooku, $site, 'libraries/koowa');
_symlink($nooku, $site, 'media/com_default');
_symlink($nooku, $site, 'media/lib_koowa');
_symlink($nooku, $site, 'plugins/koowa/default.php');
_symlink($nooku, $site, 'plugins/system/koowa.php');
_symlink($nooku, $site, 'plugins/system/koowa.xml');
_symlink($nooku, $site, 'components/com_default', 'site');
_symlink($nooku, $site, 'modules/mod_default', 'site');
	
echo "<p>Nooku Installed</p>";

/* install calendar */
_symlink($calendar, $site, 'administrator/components/com_calendar');
_symlink($calendar, $site, 'components/com_calendar');
_symlink($calendar, $site, 'modules/mod_calendar');
_symlink($calendar, $site, 'modules/mod_date');
_symlink($calendar, $site, 'media/com_calendar');
_symlink($calendar, $site, 'plugins/content/plgCalendarBG.php');
_symlink($calendar, $site, 'plugins/content/plgCalendarBG.xml');

echo "<p>Calendar installed</p>";