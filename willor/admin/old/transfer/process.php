<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'update' :
		updateTransferCharges();
		break;  

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function updateTransferCharges()
{
    $chargeId	= $_POST['chargeId'];
	$charge 	= $_POST['charge'];
	$desc 		= $_POST['description'];
	
	$sql = "UPDATE tbl_transfer_charges 
			SET charge = $charge,
				description = '$desc',
				up_date = NOW() 
			WHERE id = $chargeId";
	dbQuery($sql);
	header('Location: index.php');
	exit();
}

?>