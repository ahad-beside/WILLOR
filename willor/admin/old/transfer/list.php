<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT * FROM tbl_properties ORDER BY id DESC LIMIT 20";
$result = dbQuery($sql);

?> 

<p align="center" id="mainHead">Transfer Charge List</p>
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px;">
Transfer charges for all Local and International fund transfer are listed below. All fund transfer eitehr local or international will be entitle to deduct this transfer charges based on Fund trasffer type.</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Charges (&euro;)</td>
   <td>Transfer Type</td>
   <td>Description</td>
   <td width="120">Update Date</td>
   <td width="70">Action</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	$i += 1;
	$tf_no = $type == "IT" ? "International": "Local";
?>
  <tr class="<?php echo $class; ?>"> 
   <td>$<?php echo $charge; ?></td>
   <td><?php echo $tf_no; ?></td>
   <td><?php echo $description; ?></td>
   <td width="120" align="center"><?php echo $up_date; ?></td>
   
   <td width="70" align="center"><a href="javascript:editTransferCharges(<?php echo $id; ?>);">Update</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>