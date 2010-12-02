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
	shRemoveFromGETVarsList('view');
} else {
	$title[] = 'day';
}

switch($view) {
	case 'donate':
		$title[] = 'donate';
		$title[] = 'pick-your-day';		
		break;
	case 'summary':
		$title[] = 'donate';
		$title[] = 'summary';
		break;
	case 'datesetting':
		$title[] = 'donate';
		$title[] = 'details';
		break;
	case 'method':
		$title[] = 'donate';
		$title[] = 'checkout-method';
		break;
	case 'review':
		$title[] = 'donate';
		$title[] = 'checkout';

		if (!$layout || $layout === 'default' || $layout === '') {
			$title[] = 'credit-card';
		} else {
			$title[] = $layout;
		}
		shRemoveFromGETVarsList('layout');

		break;	
	case 'thankyou':
		$title[] = 'donate';
		$title[] = 'thank-you';
		break;
	case 'error':
		$title[] = 'donate';
		$title[] = 'error';
		break;

	case 'user':
		$title[] = 'user';
		break;
	case 'edit':
		$title[] = 'edit-day';
		break;				
			
	case 'day':
	case 'month':
	default:
		$title[] = $view;
		break;
}

// ------------------ standard plugin finalize function - don't change --------------------------- 
if ($dosef){ 
$string = shFinalizePlugin( $string, $title, $shAppendString, $shItemidString,
(isset($limit) ? @$limit : null), (isset($limitstart) ? @$limitstart : null),
(isset($shLangName) ? @$shLangName : null));
}
// ------------------ standard plugin finalize function - don't change ---------------------------