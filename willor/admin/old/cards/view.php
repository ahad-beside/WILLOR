<?php

require_once '../../library/credit-cards.php';

if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['ccId']) && (int)$_GET['ccId'] > 0) {
	$id = (int)$_GET['ccId'];
} else {
	header('Location: index.php');
}

$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
$msg = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '&nbsp;';

$row = getCreditCardDetails($id);
?> 

<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/radiovalidation/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/radiovalidation/SpryValidationRadio.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/selectvalidation/SpryValidationSelect.js" type="text/javascript"></script>

<p align="center" id="mainHead">View Credit Card Details</p>
<span class="errorMessage"><?php echo $error; ?></span>
<span class="msg"><?php echo $msg; ?></span>

<?php 
if(count($row) > 0) {
	extract($row);
	$exp = explode("/", $exp_date);
	$exp_m = $exp[0];
	$exp_y = $exp[1];
?>

<form action="process.php?action=update" method="post" name="frmAddUser" id="frmAddUser">
 <table width="60%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  
  <tr> 
  	<input type="hidden" name="userId" value="<?php echo $user_id; ?>" />
	<input type="hidden" name="ccId" value="<?php echo $id; ?>" />
   <td width="150" class="label">Credit Card Number</td>
   <td class="content">
   	<span id="sprytf_ccnumber">
        <input name="ccnumber" type="text" class="box" id="ccnumber" size="30" maxlength="60" value="<?php echo $card_number; ?>">
        <br/>
        <span class="textfieldRequiredMsg">Credit Card Number is required.</span>
		<span class="textfieldInvalidFormatMsg">Credit Card Number must be Integer.</span>		
	</span>
   </td>
  </tr>
  <tr> 
  	<td width="150" class="label">Name on Card</td>
   <td class="content">
   	<span id="sprytf_noc">
        <input name="noc" type="text" class="box" id="noc" size="30" maxlength="60" value="<?php echo strtoupper($name_on_card); ?>">
        <br/>
        <span class="textfieldRequiredMsg">Name on Card is required.</span>
	</span> 
   </td>
  </tr>
  
  <tr>
    <td class="label">Card Type</td>
    <td class="content">
	<span id="sprytf_ctype">
	<input type="radio" name="ctype" value="MASTER" <?php echo $ctype == "MASTER" ? "checked=checked" : "" ?> />
	<img src="<?php echo WEB_ROOT; ?>images/cards/mastercard.png" />
	<input type="radio" name="ctype" value="VISA" <?php echo $ctype == "VISA" ? "checked=checked" : "" ?>/>
	<img src="<?php echo WEB_ROOT; ?>images/cards/visa.png" />
	 <br/>
     <span class="radioRequiredMsg">Please select any Card type.</span>
	</span> 
	</td>
  </tr>
   <tr>
    <td class="label">Card CVV2</td>
    <td class="content">
	<span id="sprytf_cvv2">
	<input name="cvv2" type="text" class="box" id="cvv2" size="10" maxlength="10" value="<?php echo $cvv; ?>">
	<br/>
     <span class="textfieldRequiredMsg">Card CVV2 is required.</span>
	 <span class="textfieldInvalidFormatMsg">Card CVV2 must be Integer.</span>
	</span>
	</td>
  </tr>
   <tr>
    <td class="label">Expiry Date</td>
    <td class="content">
	<select name="emonth">
		<?php for($em =1; $em <=12; $em++) {?>
		<option value="<?php echo $em; ?>" <?php echo $exp_m == $em ? "selected" : ""; ?> >
			<?php echo strlen($em) == 1 ? "0".$em : $em; ?>
		</option>
		<?php }?>
	</select>
	&nbsp;-&nbsp;
	<select name="eyear">
		<?php 
		$range = range(date('Y'), date('Y')+10);
		foreach($range as $ee) {
		?>
		<option value="<?php echo $ee; ?>" <?php echo $exp_y == $ee ? "selected" : ""; ?>>
			<?php echo $ee; ?>
		</option>
		<?php 
		}
		?>
	</select>&nbsp;(MM/YYYY)
	
	</td>
  </tr>
  
  <tr>
    <td class="label">Withdrawal Limit</td>
    <td class="content">
	<span id="sprytf_limit">
	<input name="limit" type="text" class="box" id="limit" size="10" maxlength="10" value="<?php echo $with_limit; ?>">
	<br/>
     <span class="textfieldRequiredMsg">Withdrawal Limit is required.</span>
	 <span class="textfieldInvalidFormatMsg">Withdrawal Limit must be Integer.</span>
	</span>
	</td>
  </tr>
  <tr>
    <td class="label">Card Status</td>
    <td class="content">
	<span id="sprytf_status">
	<select name="status">
		<option value="">-- select card status --</option>
		<option value="ACTIVE">ACTIVE</option>
		<option value="INACTIVE">INACTIVE</option>
	</select>
	<br/>
     <span class="selectRequiredMsg">Please select Credit Card status.</span>
	</span>
	</td>
  </tr>

 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit" value="Edit Credit Card">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>
<?php 
}//if
else {
?>
<p class="errorMessage">No credit card details Found.</p>
<?php
}
?>
<script type="text/javascript">
<!--
var sprytf_ccnumber = new Spry.Widget.ValidationTextField("sprytf_ccnumber", 'integer', {validateOn:["blur", "change"]});
var sprytf_noc = new Spry.Widget.ValidationTextField("sprytf_noc", 'none', {validateOn:["blur", "change"]});
var sprytf_ctype = new Spry.Widget.ValidationRadio("sprytf_ctype");
var sprytf_cvv2 = new Spry.Widget.ValidationTextField("sprytf_cvv2", 'integer', {validateOn:["blur", "change"]});
var sprytf_limit = new Spry.Widget.ValidationTextField("sprytf_limit", 'integer', {validateOn:["blur", "change"]});
var sprytf_status = new Spry.Widget.ValidationSelect("sprytf_status", {validateOn:["blur", "change"]});
//-->
</script>
<script language="javascript">
$(document).ready(function(){});//ready
</script>