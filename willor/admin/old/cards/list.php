<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql 	= "SELECT cc.*, u.fname, u.lname, u.id AS user_id, a.id AS acc_id, a.acc_no AS acc_no 
		   FROM tbl_credit_cards cc, tbl_users u, tbl_accounts a 
		   WHERE cc.user_id = u.id AND u.id = a.user_id ORDER BY cc.id DESC LIMIT 20";
$result = dbQuery($sql);

$msg = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '&nbsp;';
$error = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?>
<p align="center" id="mainHead">Credit Card Issued List</p>
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:10px;">
List of all users who have credit cards with there status. You can change the status by clicking on the status of a perticular entry in row.
</p>

<span class="errorMessage"><?php echo $error; ?></span>
<span class="msg"><?php echo $msg; ?></span>


<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  	<tr align="center" id="listTableHeader"> 
		<td>Username (Account)</td>
		<td>Card Number / CVV</td>
		<td>Card Type</td>
		<td>Expiry Date</td>
		<td width="120">Withdrawal Limit (&euro;)</td>
		<td>Status</td>
		<td width="70">Action</td>
  	</tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	$class = $i%2 ? 'row1': 'row2';
	$i += 1;
?>
	<tr class="<?php echo $class; ?>"> 
		<td>&nbsp;<?php echo $name_on_card ?>&nbsp;
		(&nbsp;<a href="<?php echo WEB_ROOT; ?>admin/account/?view=detail&accId=<?php echo $acc_id; ?>">
			<?php echo $acc_no; ?>
		</a>&nbsp;)		</td>
		<td><div align="center"><?php echo $card_number; ?>&nbsp;/&nbsp;<?php echo $cvv; ?></div></td>
		<td><div align="center"><?php echo $ctype; ?></div></td>
		<td><div align="center"><?php echo $exp_date; ?></div></td>
		<td width="120" align="center"><div align="center">&euro;&nbsp;<?php echo number_format($with_limit, 2); ?></div></td>
		<td><div align="center"><?php echo $status; ?></div></td>
		<td width="70" align="center"><a href="javascript:editCreditCard(<?php echo $id; ?>);">Edit</a></td>
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
<script language="javascript">
function editCreditCard(creditId) 
{
	if (confirm('Are you sure you want to edit credit card ?')) 
	{
		window.location.href = 'index.php?view=view&ccId=' + creditId;
	}
}
</script>
