<?php
// ------------------ standard plugin initialize function - don't change ---------------------------
global $sh_LANG, $sefConfig; 
$shLangName = '';;
$shLangIso = '';
$title = array();
$shItemidString = '';
$dosef = shInitializePlugin( $lang, $shLangName, $shLangIso, $option);
// ------------------ standard plugin initialize function - don't change ---------------------------

shRemoveFromGETVarsList('option');
shRemoveFromGETVarsList('lang');
if (!empty($Itemid)) 
	shRemoveFromGETVarsList('Itemid');
// optional removal of limit and limitstart
if (!empty($limit))                       // use empty to test $limit as $limit is not allowed to be zero 
	shRemoveFromGETVarsList('limit'); 
if (isset($limitstart))                   // use isset to test $limitstart, as it can be zero
	shRemoveFromGETVarsList('limitstart');

if (isset($view)) {
	$title[] = $view;
	shRemoveFromGETVarsList('view');
} else {
	$title[] = 'day';
}

if (isset($date)) {
	$title[] = $date;
	shRemoveFromGETVarsList('date');
} else {
	$title[] = date('Y-m-d');
}

// ------------------ standard plugin finalize function - don't change --------------------------- 
if ($dosef){ 
$string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString,
(isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null),
(isset($shLangName) ? @$shLangName : null));
}
// ------------------ standard plugin finalize function - don't change ---------------------------