<?php
include 'auth.php';
include '../functions.php';
if(isset($_GET['id'])){
    $userid = validate($_GET['id']);
    $query = "SELECT * FROM users where id = '$userid'";
    $run = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($run)> 0){
        $row = mysqli_fetch_array($run);
        $status = $row['status'];
        $accountno = $row['accountno'];
    }else{
        header('location:index');
    }
}else{
    header('location:index');
}

if(isset($_POST['submit']))
{
    
    $status = pvalidate($_POST['status']);
    $accountno = pvalidate($_POST['accountno']);
    $query_email = mysqli_query($conn,"select * from users where accountno = '$accountno' AND id!='$userid'");
    
    if(empty($accountno)){
        $msg= "<div class='alert alert-danger'>
        <strong>Error!</strong> Please fill the required fields
        </div>";
    }elseif(mysqli_num_rows($query_email) > 0){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Account No. already exists!!
            </div>";
    }else{
        $query = "UPDATE users SET accountno='$accountno', status='$status' WHERE id ='$userid'";
        if(mysqli_query($conn, $query)){
            $msg= "<div class=' register'>
                  <strong>Success!</strong> User Profile Updated!!
            </div>";
        }
    }
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Willor Trust Limited</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../css/divstyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>

<script>
$ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
	$(id).style.display ='block';
}
var hide = function(id) {
	$(id).style.display ='none';
}

</script>
</head>
<style type="text/css">
body {
margin-left:0px;
margin-bottom:0px;
margin-right:0px;
margin-top:0px;
background-color:;

}

</style>

<body>
<div id="container">
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/banner.php';?>
<!--- sidemenu ended -->
<div id="admin-mainbody">

      <table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td height="55" align="left" class="welcome"><img src="../images/user-icon.png" width="33" height="30" alt=""/>User Account Number<br>
        <img src="../images/line-yellow.png" width="408" height="4" alt=""/></td>
      </tr>
    <tr>
      <td class="warning"><p>
        <?php if($status==0){ ?>
        <br>
          <span class="warning">This User is Not Active</span></p>
        <?php } ?>
        <?php echo isset($msg)?$msg:''; ?></td>
      </tr>
    <tr>
      <td><form id="form1" name="form1" method="post">
        <table width="66%" border="0" cellspacing="10" cellpadding="10">
          <tbody>
            <tr>
              <td width="50%" valign="top"><label for="accountno" class="formtext">NEW ACCOUNT NUMBER :</label>
                <br>
                <br>
                <input name="accountno" type="text" class="input-admin" id="accountno" value="<?php echo $accountno; ?>"></td>
              <td width="50%" valign="top"><label for="status" class="formtext">STATUS :</label>
                <br>
                <br>
                <select name="status" class="input-admin" id="">
                  <option <?php echo $status==0?'selected':''; ?> value="0">In Active</option>
                      <option <?php echo $status==1?'selected':''; ?> value="1">Active</option>
              </select></td>
            </tr>
            <tr>
              <td><input name="submit" type="submit" class="button" id="submit" value="Submit"></td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td height="78" class="normal"><a href="user.php">BACK</a></td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" class="normal">Copyright © 2019. All rights reserved. Willor Trust (New Zealand) Inc.</td>
    </tr>
  </tbody>
</table>  </div>

</body>
</html>
