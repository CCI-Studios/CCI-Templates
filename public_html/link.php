<?php
$root 		= "/home/staging/subdomains/calendar/";
$site		= $root."public_html/";
$nooku 		= $root."nooku/";
$calendar	= $root."com_calendar/";

/* install nooku */
shell_exec("rm ".$site."administrator/components/com_default");
shell_exec("ln -s ".
	$nooku		."administrator/components/com_default ".
	$site		."administrator/components/com_default");
shell_exec("rm ".$site."administrator/modules/mod_default");
shell_exec("ln -s ".
	$nooku		."administrator/modules/mod_default ".
	$site		."administrator/modules/mod_default");

shell_exec("rm ".$site."libraries/koowa");
shell_exec("ln -s ".
	$nooku		."libraries/koowa ".
	$site		."libraries/koowa");
	
shell_exec("rm ".$site."media/com_default");
shell_exec("ln -s ".
	$nooku		."media/com_default ".
	$site		."media/com_default");
shell_exec("rm ".$site."media/lib_koowa");
shell_exec("ln -s ".
	$nooku		."media/lib_koowa ".
	$site		."media/lib_koowa");
	
shell_exec("rm ".$site."plugins/koowa/default.php");
shell_exec("ln -s ".
	$nooku		."plugins/koowa/default.php ".
	$site		."plugins/koowa/default.php");
shell_exec("rm ".$site."plugins/system/koowa.php");
shell_exec("ln -s ".
	$nooku		."plugins/system/koowa.php ".
	$site		."plugins/system/koowa.php");
shell_exec("rm ".$site."plugins/system/koowa.xml");
shell_exec("ln -s ".
	$nooku		."plugins/system/koowa.xml ".
	$site		."plugins/system/koowa.xml");
	
shell_exec("rm ".$site."components/com_default");
shell_exec("ln -s ".
	$nooku		."site/components/com_default ".
	$site		."components/com_default");
	
shell_exec("rm ".$site."modules/com_default");
shell_exec("ln -s ".
	$nooku		."site/modules/com_default ".
	$site		."modules/com_default");
	
echo "<p>Nooku Installed</p>";

/* install calendar */
shell_exec("rm ".$site."administrator/com_calendar");
shell_exec("ln -s ".
	$calendar	."administrator/components/com_calendar ".
	$site		."administrator/components/com_calendar");
shell_exec("rm ".$site."modules/mod_calendar");
shell_exec("ln -s ".
	$calendar	."modules/mod_calendar ".
	$site		."modules/mod_calendar");


echo "<p>Calendar installed</p>";