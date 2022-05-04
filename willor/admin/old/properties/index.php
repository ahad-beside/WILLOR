<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'update' :
		$content 	= 'update.php';		
		$pageTitle 	= 'Update Property value';
	break;
	
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'List properties';
	break;
}

$script    = array('user.js');

require_once '../include/template.php';
?>
