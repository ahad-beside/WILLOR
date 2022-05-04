<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
	$propId = (int)$_GET['id'];
} else {
	header('Location: index.php');
}


$sql 	= "SELECT * FROM tbl_properties WHERE id = $propId ORDER BY id";
$result = dbQuery($sql);
while($row = dbFetchAssoc($result)) {
	extract($row);
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
?> 

<link href="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textfieldvalidation/SpryValidationTextField.js" type="text/javascript"></script>

<link href="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/spry/textareavalidation/SpryValidationTextarea.js" type="text/javascript"></script>

<p align="center" id="mainHead">Update Properties value</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="process.php?action=update" method="post" name="frmAddUser" id="frmAddUser">
 <table width="60%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">Property Name</td>
   <td class="content">
   	<span style="color:#0000FF;font-family:verdana;font-weight:bold;"><?php echo $name; ?></span>
	<input type="hidden" name="propId" value="<?php echo $propId; ?>" />
	</td>
  </tr>
  <tr>
    <td class="label">Current Value</td>
    <td class="content">&nbsp;<?php echo $value; ?></td>
  </tr>
  <tr> 
   <td width="150" class="label">New Property Value</td>
   <td class="content">
   		<span id="sprytf_value">
           <input name="value" type="text" class="box" id="value" size="30" maxlength="60">
            <br/>
            <span class="textfieldRequiredMsg">Property Value is required.</span>
			<span class="textfieldMinCharsMsg">Property Value must specify at least 1 characters.</span>
			<span class="textfieldInvalidFormatMsg">Property Value must be Integer.</span>
		</span>	
   
     </td>
  </tr>
  <tr> 
   <td width="150" valign="top" class="label">Description</td>
   <td class="content">
   	<span id="sprytf_desc">
    	<textarea name="description" id="description" cols="35" rows="2">
			<?php echo $description; ?>
		</textarea>
        <br/>
        <span class="textareaRequiredMsg">Description is required.</span>
		<span class="textareaMinCharsMsg">Description must specify at least 10 characters.</span>
	</span>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="submit" value="Edit Property">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>
<script type="text/javascript">
<!--
var sprytf_charge = new Spry.Widget.ValidationTextField("sprytf_value", 'none', {minChars:1, validateOn:["blur", "change"]});
var sprytf_desc = new Spry.Widget.ValidationTextarea("sprytf_desc", {isRequired:true, validateOn:["blur", "change"]});
//-->
</script>