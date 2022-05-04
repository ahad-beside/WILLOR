<?php 
include '../auth.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Willor Trust Limited</title>
<link href="../../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../../css/divstyle.css" rel="stylesheet" type="text/css"/>
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
<?php include 'include/header.php';?>
<?php include '..sidebar.php';?>
<?php include 'banner.php';?>
<!--- sidemenu ended -->
<div id="admin-mainbody">
<table width="100%" border="0" cellpadding="20" cellspacing="20">
  <tbody>
    <tr>
      <td height="28" colspan="3"><p><span class="welcome">HELLO ADMIN, WELCOME .<br>
      </span><span class="normal">Summary for e-Account Management</span><br>
        <br>
        </p></td>
      </tr>
    <tr>
      <td height="113">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
  </tbody>
</table>

</div>

</div>
</body>
</html>
