<?php
include 'auth.php';
include '../functions.php';
if(isset($_GET['id'])){
    $userid = validate($_GET['id']);
    $query = "SELECT * FROM users where id = '$userid'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)> 0){
        $row = mysqli_fetch_array($run);
        $userdata = $row;
    }else{
        header('location:index');
    }
}else{
    header('location:index');
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

      <table width="99%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td width="14%" height="50" align="center" class="welcome"><img src="../images/user-icon.png" width="33" height="30" alt=""/></td>
      <td width="86%" class="admin-welcome"><span class="welcome">User Account Details</span><br>
        <img src="../images/line-yellow.png" width="408" height="4" alt=""/> <br></td>
    </tr>
    <tr>
      <td colspan="2" valign="top"><form id="form1" name="form1" method="post">
        <table width="88%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td width="47%"><label for="textfield" class="formtext">First Name :</label>
                <br>
<input name="textfield" type="text" class="input-admin" id="textfield" value="<?php echo $userdata['firstname']; ?>"></td>
              <td width="53%"><label for="textfield2" class="formtext">Last Name:</label>
                <br>
<input name="textfield2" type="text" class="input-admin" id="textfield2" value="<?php echo $userdata['lastname']; ?>"></td>
            </tr>
            <tr>
              <td><label for="textfield3" class="formtext">Email:</label>
                <br>
<input name="textfield3" type="text" class="input-admin" id="textfield3" value="<?php echo $userdata['email']; ?>"></td>
              <td><label for="textfield4"><span class="formtext">Balance:</span><br>
              </label>
                <input name="textfield4" type="text" class="input-admin" id="textfield4" value="<?php echo $userdata['balance']; ?>"></td>
            </tr>
            <tr>
              <td><label for="textfield5" class="formtext">Phone Number:</label>
                <br>
<input name="textfield5" type="text" class="input-admin" id="textfield5" value="<?php echo $userdata['phone']; ?>"></td>
              <td><label for="textfield6" class="formtext">Account Number:</label>
                <br>
<input name="textfield6" type="text" class="input-admin" id="textfield6" value="<?php echo $userdata['accountno']; ?>"></td>
            </tr>
            <tr>
              <td valign="top"><br>
                <label for="textarea" class="formtext">Address :</label>
                <textarea name="text" wrap="soft" class="input-admin" id="textarea"><?php echo $userdata['address']; ?></textarea></td>
              <td valign="top"><label for="textfield12" class="formtext">Account Type :</label>
                <br>
                <input name="textfield11" type="text" class="input-admin" id="textfield12" value="<?php echo $userdata['accounttype']; ?>"></td>
            </tr>
            <tr>
              <td height="142" colspan="2"><table width="100%" border="0" cellspacing="5" cellpadding="5">
                <tbody>
                  <tr>
                    <td><label for="textfield8" class="formtext">City:</label>
                      <br>
<input name="textfield8" type="text" class="input-admin" id="textfield8" value="<?php echo $userdata['city']; ?>"></td>
                    <td><label for="textfield9" class="formtext">State:</label>
                      <br>
<input name="textfield9" type="text" class="input-admin" id="textfield9" value="<?php echo $userdata['state']; ?>"></td>
                    <td><label for="textfield10" class="formtext">Zip:</label>
                      <br>
<input name="textfield10" type="text" class="input-admin" id="textfield10" value="<?php echo $userdata['zip']; ?>"></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
            <tr>
              <td colspan="2"><label for="textfield11" class="normal">:</label>
                <br>
                <br></td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="normal">&nbsp;</td>
    </tr>
  </tbody>
</table>  </div>
<?php include 'includes/footer.php';?>
</body>
</html>
