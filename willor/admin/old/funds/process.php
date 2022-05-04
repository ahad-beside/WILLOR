<?php
require_once '../../library/config.php';
require_once '../library/functions.php';
require_once '../../library/mail.php';

checkAdmin();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'approve' :
		approveFundTransfer();
		break;  

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}


function approveFundTransfer()
{
    $id	= $_GET['id'];
	
	//First, get the balance, userid from account number.
	$balance_sql = "SELECT to_accno, tx_no, amount, status, description 
					FROM tbl_transaction 
					WHERE id = $id 
					AND STATUS = 'PENDING'";
	
	$bal_result  = dbQuery($balance_sql);
	$bal_arr 	 = dbFetchAssoc($bal_result);
	$sacc_no 	 = $bal_arr['to_accno'];
	$t_amount 	 = $bal_arr['amount'];
	$tx_no		 = $bal_arr['tx_no'];
	$descr		 = $bal_arr['description'];
	//-----------------------------------------------
	$s_sql		= "SELECT acc_no, user_id, balance FROM tbl_accounts WHERE acc_no = $sacc_no";
	$s_result 	= dbQuery($s_sql);
	$s_acc 		= dbFetchAssoc($s_result);
	
	//check if senders balance is not enough
	$s_bal 		= $s_acc['balance']; 
	$s_uid 		= $s_acc['user_id']; 
	$s_accno 	= $s_acc['acc_no'];
	
	//Now set the transfer charges and see.
	$tf_charges 	= get_pf_value('international.transfer.fees');
	$total_deduct 	= $t_amount + percentage($tf_charges, $t_amount);
		
	$d_total 		= ($s_bal - $total_deduct);
	
	if($s_bal < $total_deduct) {
		header('Location: index.php?v=Transfer&msg=' . urlencode('User do not have enough balance to proceed with this transfer.'));
		exit();	
	}
	//-----------------------------------------------
	// Now, proceed with transfer
	//-----------------------------------------------
	
	//update sender's account balance
	$update_balance		= "UPDATE tbl_accounts SET balance = $d_total 
				  		  WHERE user_id = $s_uid 
				  		  AND acc_no = $s_accno";
	dbQuery($update_balance);
	$name = $_SESSION['hlbank_user_name'];
	//$desc = sprintf("Fund transfer of $%u to %s Account %u Reference# %s is payment approved.", $t_amount, $name, $sacc_no, $tx_no);
	$desc = str_replace('PENDING for approval', 'payment approved', $descr);
	$update_status	= "UPDATE tbl_transaction 
					  SET status = 'SUCCESS', description = '$desc', 
					  date = NOW() 
					  WHERE id = $id";
	dbQuery($update_status);
	
	//email details...
	int_funds_transfer_mail($s_uid, $t_amount, $s_accno);
	header('Location: index.php');
	exit();
}

function int_funds_transfer_mail($user_id, $amt, $sacc_no) {

	$subject = "Debit Transfer Notification";
	
	$user_sql 		= "SELECT email FROM tbl_users WHERE id = $user_id";
	$user_result	= dbQuery($user_sql);
	$user_arr 	 	= dbFetchAssoc($user_result);
	$to_email 		= $user_arr['email'];
	
	$msg_body = sprintf("Dear Customer,<br/><br/>
		This is to inform you that an amount of &euro; %u  has been debited from your Account No. %s on account of 
		Funds Transfer on %s using Capital Trust Realty Ltd.<br/><br/>In case you need any further clarification for the same, 
		please do get in touch with your Relationship Manager.<br/><br/>
		Regards,<br/><br/>Capital Trust Realty Ltd.", 
		$amt, $sacc_no, date('M-d-Y')
	);
	
	$mail_data = array('to' => $to_email, 'sub' => $subject, 'msg' => 'transfer', 'body' => $msg_body);
	send_email($mail_data);
}

function percentage($val1, $val2, $precision = 2) 
{
	$res = round(($val1/100)* $val2,$precision);
	return $res;
}

function get_pf_value($name) {
	$sql 	= "SELECT value FROM tbl_properties WHERE name = '$name'";
	$result = dbQuery($sql);
	extract(dbFetchAssoc($result));
	return $value;
}

?>