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

<table width="80%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td height="46" align="left" valign="top" class="welcome">International Fund Transfer<br>
        <span class="register">International Transfer (IT) is a process of transferring funds from your account to other account in another institution. Please make sure you have enough funds in your account to transfer. Also don't forget to validate receiver's account number.<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/>        </span></td>
      </tr>
    
    <tr>
      <td><form  method="post">
        <table width="100%" border="0" cellspacing="2" cellpadding="2">
          <tbody>
            <tr>
              <td width="48%"><label for="textfield" class="formtext"><span class="formtext">Receiver Account Number*</span>:</label>
                <input name="textfield" type="text" class="input-admin" id="textfield"></td>
              <td width="52%"><label for="textfield2" class="formtext">Receiver Bank*:</label>
                <input name="textfield2" type="text" class="input-admin" id="textfield2"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="select" class="formtext">Country:</label>
                <select name="select" class="input-admin" id="select">
                </select></td>
            </tr>
            <tr>
              <td><label for="textfield3" class="formtext">Amount <?php echo $userdata['accounttype']; ?>:</label>
                <input name="textfield3" type="text" class="input-admin" id="textfield3"></td>
              <td><label for="textfield4" class="formtext">Purpose:</label>
                <input name="textfield4" type="text" class="input-admin" id="textfield4"></td>
            </tr>
            <tr>
              <td><input name="submit" type="submit" class="button" id="submit" value="Submit"></td>
              <td>&nbsp;</td>
            </tr>
          </tbody>
        </table>
      </form></td>
    </tr>
  </tbody>
</table>
</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
