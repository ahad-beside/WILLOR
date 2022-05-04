<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'update' :
		updatePropertyValue();
		break;  

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function updatePropertyValue()
{
    $propId		= $_POST['propId'];
	$value 		= $_POST['value'];
	$desc 		= $_POST['description'];
	
	$sql = "UPDATE tbl_properties 
			SET value = '$value',
				description = '$desc',
				up_date = NOW() 
			WHERE id = $propId";
	dbQuery($sql);
	header('Location: index.php');
	exit();
}

?>