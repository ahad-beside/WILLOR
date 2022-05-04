<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkAdmin();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	
	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Add credit card';
	break;
	
	case 'view' :
		$content 	= 'view.php';		
		$pageTitle 	= 'View credit card details';
	break;
	
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'List Credit cards';
	break;
}

$script    = array('user.js','jquery.min.js');

require_once '../include/template.php';
?>
