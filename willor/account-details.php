<?php
include 'auth.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Willor Trust Limited</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/divstyle.css" rel="stylesheet" type="text/css"/>
<link href="css/ajxmenu.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
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
      <td height="62" align="left" class="welcome">Account Details<br>
        <span class="register">We recommend to change your password in every 45 days to be secure.<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/>        </span></td>
      </tr>
    
    <tr>
      <td><form  method="post">
        <table width="80%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td width="51%"><label for="firstname"><span class="formtext">First Name:</span><br>
              </label>
                <input name="firstname" type="text" class="input-admin" id="firstname" value="<?php echo $userdata['firstname']; ?>"></td>
              <td width="49%"><label for="lastname"><span class="formtext">Last Name:</span><br>
              </label>
                <input name="lastname" type="text" class="input-admin" id="lastname" value="<?php echo $userdata['lastname']; ?>"></td>
            </tr>
            <tr>
              <td><label for="email" class="formtext">Email:</label>
                <input name="email" type="text" class="input-admin" id="email" value="<?php echo $userdata['email']; ?>"></td>
              <td><label for="pin" class="formtext">PIN(Show Pin):<br>
              </label>
                <input name="pin" type="text" class="input-admin" id="pin" value="<?php echo $userdata['pin']; ?>"></td>
            </tr>
            <tr>
              <td><label for="phonenumber"><span class="formtext">Phone Number:</span><br>
              </label>
                <input name="phonenumber" type="number" class="input-admin" id="phonenumber" value="<?php echo $userdata['phone']; ?>"></td>
              <td><label for="textfield6"><span class="formtext">Account Number:</span><br>
              </label>
                <input name="accountnumber" type="text" class="input-admin" id="accountnumber" value="<?php echo $userdata['accountno']; ?>"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="address"><span class="formtext">Address:</span><br>
              </label>
                <input name="address" type="text" class="input-admin" id="address" value="<?php echo $userdata['address']; ?>"></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%" border="0" cellspacing="2" cellpadding="2">
                <tbody>
                  <tr>
                    <td width="32%"><p>
                      <label for="city" class="formtext">City:</label>
                      <input name="city" type="text" class="input-admin" id="city" value="<?php echo $userdata['city']; ?>">
                    </p></td>
                    <td width="35%"><p>
                      <label for="state" class="formtext">State:</label>
                      <input name="state" type="text" class="input-admin" id="state" value="<?php echo $userdata['state']; ?>">
                    </p></td>
                    <td width="33%"><label for="zip" class="formtext">Zip:</label>
                      <input name="zip" type="text" class="input-admin" id="zip" value="<?php echo $userdata['zip']; ?>"></td>
                  </tr>
                </tbody>
              </table></td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
    <tr>
      <td align="center" class="normal">&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
