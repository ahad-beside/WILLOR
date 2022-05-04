<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'view' :
		$content 	= 'view.php';		
		$pageTitle 	= 'View user feedback';
	break;
	
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'User feedback';
	break;
}

$script    = array('user.js');

require_once '../include/template.php';
?>
