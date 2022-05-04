<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT u.id AS user_id, u.fname, u.lname, u.email, c.id AS c_id, c.subject, c.reason, c.comments, c.dates 
		FROM tbl_contact_us c, tbl_users u
		WHERE c.user_id = u.id 
		ORDER BY c.id DESC LIMIT 20";
$result = dbQuery($sql);
?> 

<p align="center" id="mainHead">User Feedbacks</p>
<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px;">
List of all feedbacks/suggestion given by customer to admin. Admin is requested to take care of them and responde to each one of them as soon as possible.
</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Name/Email</td>
   <td>Subject</td>
   <td>Reason</td>
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
   <td><?php echo strtoupper( $fname. ' '. $lname); ?></a>&nbsp;(<?php echo $email; ?>)</td>
   <td><?php echo $subject?></td>
   <td><?php echo $reason; ?></td>
   <td width="120" align="center"><?php echo $comments; ?></td>
   <td width="70" align="center"><a href="<?php echo WEB_ROOT; ?>admin/contact/?view=view&cId=<?php echo $c_id; ?>">View</a></td>
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