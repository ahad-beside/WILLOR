<?php
require_once '../../library/config.php';
require_once '../library/functions.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addCreditCard();
		break;  

	case 'update' :
		updateCreditCard();
		break;
	
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function addCreditCard()
{
    $userId		= (int)$_POST['userId'];
	$ccnumber	= $_POST['ccnumber'];
	$name		= strtoupper($_POST['noc']);
	$ctype 		= $_POST['ctype'];
	$cvv2 		= (int)$_POST['cvv2'];
	$emonth 	= $_POST['emonth'];
	$eyear 		= $_POST['eyear'];
	$limit 		= $_POST['limit'];
	
	$edate = $emonth."/".$eyear;
	
	$sql = "INSERT INTO tbl_credit_cards (user_id, card_number, name_on_card, cvv, ctype, exp_date, with_limit, status, bdate) 
			VALUES ($userId, '$ccnumber', '$name', $cvv2, '$ctype', '$edate', $limit, 'INACTIVE', NOW())";
	dbQuery($sql);
	header('Location: index.php?msg=' . urlencode('Credit card details successfully added.'));
	exit();
}

function updateCreditCard()
{
    $userId		= (int)$_POST['userId'];
	$ccId		= (int)$_POST['ccId'];
	$ccnumber	= $_POST['ccnumber'];
	$name		= strtoupper($_POST['noc']);
	$ctype 		= $_POST['ctype'];
	$cvv2 		= (int)$_POST['cvv2'];
	$emonth 	= $_POST['emonth'];
	$eyear 		= $_POST['eyear'];
	$limit 		= $_POST['limit'];
	$status 	= $_POST['status'];
	
	$edate 		= $emonth."/".$eyear;
	
	$sql = "UPDATE tbl_credit_cards 
			SET card_number = '$ccnumber', name_on_card = '$name', cvv = $cvv2,
				ctype = '$ctype', exp_date = '$edate', with_limit = $limit, status = '$status' 
			WHERE id = $ccId AND user_id = $userId";
	dbQuery($sql);
	header('Location: index.php?view=view&ccId='.$ccId.'&msg=' . urlencode('Credit card details successfully edited.'));
	exit();
}

?>