<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT * FROM tbl_transfer_charges
		ORDER BY id DESC LIMIT 20";
$result = dbQuery($sql);
while($row = dbFetchAssoc($result)) {
	extract($row);
	$tf_no = $type == "IT" ? "International Transfer": "Local Transfer";
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?> 

<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

<p align="center" id="mainHead">Update Transfer Charge</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="process.php?action=update" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="60%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Transfer Type </td>
   <td class="content">
   	<span style="color:#0000FF;font-family:verdana;font-weight:bold;"><?php echo $tf_no; ?></span>
	<input type="hidden" name="chargeId" value="<?php echo $_REQUEST['id']; ?>" />
	</td>
  </tr>
  <tr>
    <td class="label">Current Charge</td>
    <td class="content"><span style="color:#FF3300;font-family:verdana;font-weight:bold;">&euro;&nbsp;<?php echo $charge; ?></span></td>
  </tr>
  <tr> 
   <td width="150" class="label">New Charge </td>
   <td class="content">
   		<span id="sprytf_charge">
           <input name="charge" type="text" class="box" id="charge" size="10" maxlength="10">&nbsp;&euro;
            <br/>
            <span class="textfieldRequiredMsg">Transfer Charges is required.</span>
			<span class="textfieldMinCharsMsg">Transfer Charges must specify at least 1 characters.</span>
			<span class="textfieldInvalidFormatMsg">Transfer Charges must be Integer.</span>
		</span>	
   
     </td>
  </tr>
  <tr> 
   <td width="150" valign="top" class="label">Transfer Description</td>
   <td class="content">
   	<span id="sprytf_desc">
    	<textarea name="description" id="description" cols="35" rows="2"></textarea>
        <br/>
        <span class="textareaRequiredMsg">Description is required.</span>
		<span class="textareaMinCharsMsg">Description must specify at least 10 characters.</span>
	</span>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit" value="Edit Transfer Charge">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>
<script type="text/javascript">
<!--
var sprytf_charge = new Spry.Widget.ValidationTextField("sprytf_charge", 'integer', {minChars:1, validateOn:["blur", "change"]});
var sprytf_desc = new Spry.Widget.ValidationTextarea("sprytf_desc", {isRequired:true, validateOn:["blur", "change"]});
//-->
</script>