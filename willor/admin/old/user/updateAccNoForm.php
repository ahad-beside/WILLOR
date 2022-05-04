<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT u.id, u.fname, u.lname, a.acc_no
        FROM tbl_users u, tbl_accounts a
		WHERE u.id = a.user_id
		ORDER BY id DESC LIMIT 20";
$result = dbQuery($sql);

$result = dbQuery($sql);		
extract(dbFetchAssoc($result));


?> 
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="processUser.php?action=acc_no" method="post" >
 <table width="500px" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr>
    <td colspan="2" class="label">Change Account Number </td>
    </tr>
  <tr> 
   <td width="150" class="label">User Name</td>
   <td class="content">
   	<input name="txtUserName" type="text" class="box" id="txtUserName" value="<?php echo $fname. ' '.$lname; ?>" size="30"  readonly="readonly">
    <input name="hidUserId" type="hidden" id="hidUserId" value="<?php echo $id; ?>"> </td>
  </tr>
  <tr> 
   <td width="150" class="label">Old Account Number</td>
   <td class="content">
   	<input name="old_acc" type="text" class="box" value="<?php echo $acc_no; ?>" id="old_acc" size="30" readonly="readonly">
   </td>
  </tr>
  
   <tr> 
   <td width="150" class="label">New Account Number</td>
   <td class="content">
   	<input name="new_acc" type="text" class="box"  id="new_acc" size="30">
   </td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnModifyUser" type="submit" id="btnModifyUser" value="Modify Acc Number" >
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" value="Cancel" onClick="window.location.href='index.php';" >  
 </p>
</form>