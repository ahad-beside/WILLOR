<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql 	= "SELECT * FROM tbl_properties ORDER BY id DESC LIMIT 20";
$result = dbQuery($sql);

?>
<p align="center" id="mainHead">List of System Properties</p>
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:20px;">
System properties are used to configure banking system by setting values of pre-added properties available in system. Admin can set the values
</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
	<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  	<tr align="center" id="listTableHeader"> 
		<td>Property Name</td>
		<td>Property Value</td>
		<td>Description</td>
		<td width="120">Update Date</td>
		<td width="70">Action</td>
  	</tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	$class = $i%2 ? 'row1': 'row2';
	$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
		<td>&nbsp;<?php echo $name; ?></td>
		<td><?php echo $value; ?></td>
		<td><?php echo $description; ?></td>
		<td width="120" align="center"><?php echo $up_date; ?></td>
		<td width="70" align="center"><a href="javascript:editProperty(<?php echo $id; ?>);">Update</a></td>
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