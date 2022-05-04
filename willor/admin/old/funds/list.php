<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT * FROM tbl_transaction WHERE status = 'PENDING'
		ORDER BY id DESC LIMIT 20";
$result = dbQuery($sql);

$errorMessage = (isset($_GET['msg']) && $_GET['msg'] != '') ? $_GET['msg'] : '&nbsp;';
$msgMessage = (isset($_GET['success']) && $_GET['success'] != '') ? $_GET['success'] : '&nbsp;';

?> 

<p align="center" id="mainHead">International Funds transfer</p>
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px;">
All International fund transfer request will be in <span style="color:#FF0000;font-weight:bold;">PENDING</span> status until administrator approves the request.</p>

<div id="errorCls" style="color:#FF0000 !important;font-size:14px;font-weight:bold;"><?php echo $errorMessage; ?></div>
<div style="color:#99FF00 !important;font-size:14px;font-weight:bold;"><?php echo $msgMessage; ?></div>

<form action="process.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Transaction No.#</td>
   <td>Amount (€)</td>
   <td>Type</td>
   <td>Date</td>
   <td width="120">Comments</td>
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
?>
  <tr class="<?php echo $class; ?>">
   <td><div align="center">#<?php echo $tx_no; ?></div></td> 
   <td><div align="center">&euro;<?php echo $amount; ?></div></td>
   <td width="100"><div align="center"><?php echo strtoupper($tx_type); ?></div></td>
   <td><div align="center"><?php echo $tdate; ?></div></td>
   <td width="180" align="center"><div align="center"><?php echo $comments; ?></div></td>
   <td width="100" align="center"><div align="center"><a href="javascript:approveFunds(<?php echo $id; ?>);">Approve</a>&nbsp;/&nbsp;<a href="javascript:rejectFunds(<?php echo $id; ?>);">Reject</a></div></td>
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