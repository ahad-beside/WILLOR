<?php
if (!defined('WEB_ROOT')) {
	exit;
}

if (isset($_GET['cId']) && $_GET['cId'] > 0) {
	$cId = $_GET['cId'];
} else {
	header('Location: index.php');
}

$sql = "SELECT u.id AS user_id, u.fname, u.lname, u.email, c.id AS c_id, c.subject, c.reason, c.comments, c.dates 
		FROM tbl_contact_us c, tbl_users u
		WHERE c.user_id = u.id AND c.id = $cId 
		ORDER BY c.id DESC LIMIT 20";
$result = dbQuery($sql);
while($row = dbFetchAssoc($result)) {
	extract($row);
}
?> 

<p align="center" id="mainHead">View User Feedback</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
 <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr> 
   <td width="150" class="label">User Name</td>
   <td class="content">
   	<?php echo strtoupper( $fname. ' '. $lname); ?>
	</td>
  </tr>
  <tr>
    <td class="label">Email ID</td>
    <td class="content"><?php echo $email; ?></td>
  </tr>
  <tr>
    <td class="label">Subject</td>
    <td class="content"><?php echo $subject; ?></td>
  </tr>
  <tr>
    <td class="label">Reason</td>
    <td class="content"><?php echo $reason; ?></td>
  </tr>
  <tr>
    <td class="label">Comments</td>
    <td class="content"><?php echo $comments; ?></td>
  </tr>
  <tr>
    <td class="label">Date</td>
    <td class="content"><?php echo $dates; ?></td>
  </tr>
 
 
 </table>
 <p align="center"> 
 <input name="btnCancel" type="button" id="btnCancel" value="Go Back" onClick="window.location.href='index.php';" >  
 </p>

