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
              <td width="50%"><label for="textfield" class="formtext">Account Number:</label>
                <input name="textfield" type="text" class="input-admin" id="textfield"></td>
              <td width="50%"><label for="textfield2" class="formtext">Bank:</label>
                <input name="textfield2" type="text" class="input-admin" id="textfield2"></td>
            </tr>
            <tr>
              <td colspan="2"><label for="select" class="formtext">Country:</label>
                <select name="select" class="input-admin" id="select">
                </select></td>
            </tr>
            <tr>
              <td><label for="number" class="formtext">Amount:</label>
                <input name="number" type="number" class="input-admin" id="number"></td>
              <td><label for="textfield3" class="formtext">Purpose:</label>
                <input name="textfield3" type="text" class="input-admin" id="textfield3"></td>
            </tr>
            <tr>
              <td><label for="date" class="formtext">Transfer Initiated Date:</label>
                <input name="date" type="date" class="input-admin" id="date"></td>
              <td><label for="date2" class="formtext">Transfer Completion Date:</label>
                <input name="date2" type="date" class="input-admin" id="date2"></td>
            </tr>
            <tr>
              <td colspan="2">&nbsp;</td>
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
