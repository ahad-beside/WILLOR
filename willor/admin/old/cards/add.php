<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
	$id = (int)$_GET['id'];
} else {
	header('Location: index.php');
}


$sql 	= "SELECT fname, lname FROM tbl_users WHERE id = $id ORDER BY id";
$result = dbQuery($sql);
while($row = dbFetchAssoc($result)) {
	extract($row);
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?> 

<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/radiovalidation/SpryValidationRadio.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/radiovalidation/SpryValidationRadio.js" type="text/javascript"></script>


<p align="center" id="mainHead">Add New Credit Card Details</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="process.php?action=add" method="post" name="frmAddUser" id="frmAddUser">
 <table width="60%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
  	<input type="hidden" name="userId" value="<?php echo $id; ?>" />
   <td width="150" class="label">Credit Card Number</td>
   <td class="content">
   	<span id="sprytf_ccnumber">
        <input name="ccnumber" type="text" class="box" id="ccnumber" size="30" maxlength="60" >
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
        <input name="noc" type="text" class="box" id="noc" size="30" maxlength="60" value="<?php echo strtoupper($fname. " ".$lname); ?>">
        <br/>
        <span class="textfieldRequiredMsg">Name on Card is required.</span>
	</span> 
   </td>
  </tr>
  
  <tr>
    <td class="label">Card Type</td>
    <td class="content">
	<span id="sprytf_ctype">
	<input type="radio" name="ctype" value="MASTER" /><img src="<?php echo WEB_ROOT; ?>images/cards/mastercard.png" />
	<input type="radio" name="ctype" value="VISA" /><img src="<?php echo WEB_ROOT; ?>images/cards/visa.png" />
	 <br/>
     <span class="radioRequiredMsg">Please select any Card type.</span>
	</span> 
	</td>
  </tr>
   <tr>
    <td class="label">Card CVV2</td>
    <td class="content">
	<span id="sprytf_cvv2">
	<input name="cvv2" type="text" class="box" id="cvv2" size="10" maxlength="10">
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
		<option value="<?php echo $em; ?>">
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
		<option value="<?php echo $ee; ?>"><?php echo $ee; ?></option>
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
	<input name="limit" type="text" class="box" id="limit" size="10" maxlength="10">
	<br/>
     <span class="textfieldRequiredMsg">Withdrawal Limit is required.</span>
	 <span class="textfieldInvalidFormatMsg">Withdrawal Limit must be Integer.</span>
	</span>
	</td>
  </tr>
  

 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit" value="Add Credit Card">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>
<script type="text/javascript">
<!--
var sprytf_ccnumber = new Spry.Widget.ValidationTextField("sprytf_ccnumber", 'integer', {validateOn:["blur", "change"]});
var sprytf_noc = new Spry.Widget.ValidationTextField("sprytf_noc", 'none', {validateOn:["blur", "change"]});
var sprytf_ctype = new Spry.Widget.ValidationRadio("sprytf_ctype");
var sprytf_cvv2 = new Spry.Widget.ValidationTextField("sprytf_cvv2", 'integer', {validateOn:["blur", "change"]});
var sprytf_limit = new Spry.Widget.ValidationTextField("sprytf_limit", 'integer', {validateOn:["blur", "change"]});

//-->
</script>
<script language="javascript">
$(document).ready(function(){
	/*
	var format = function(num){
		var str = num.toString().replace("$", ""), parts = false, output = [], i = 1, formatted = null;
		if(str.indexOf(".") > 0) {
			parts = str.split(".");
			str = parts[0];
		}
		str = str.split("").reverse();
		for(var j = 0, len = str.length; j < len; j++) {
			if(str[j] != ",") {
				output.push(str[j]);
				if(i%3 == 0 && j < (len - 1)) {
					output.push(",");
				}
				i++;
			}
		}
		formatted = output.reverse().join("");
		return("$" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
	};
	
	$('#withLimit').keyup(function(e){
		$(this).val(format($(this).val()));
	});
	*/
});//ready
</script>