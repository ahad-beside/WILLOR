<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$self = WEB_ROOT . 'admin/index.php';
?>
<html>
<head>
<title><?php echo $pageTitle; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php echo WEB_ROOT;?>admin/include/admin.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/javascript" src="<?php echo WEB_ROOT;?>library/common.js"></script>
<style>
body {background-color:#999999;}
</style>
<?php
$n = count($script);
for ($i = 0; $i < $n; $i++) {
	if ($script[$i] != '') {
		echo '<script language="JavaScript" type="text/javascript" src="' . WEB_ROOT. 'admin/library/' . $script[$i]. '"></script>';
	}
}
?>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="1" class="graybox">
  <tr style="background-color:#FFFFFF">
    <td colspan="2"><img src="<?php echo WEB_ROOT; ?>images/OnlineBanking-logo.png" ></td>
  </tr>
  <tr>
    <td width="150" valign="top" class="navArea"><p>&nbsp;</p>
      <a href="<?php echo WEB_ROOT; ?>admin/" class="leftnav">Home</a>
	  <a href="<?php echo WEB_ROOT; ?>admin/user/" class="leftnav">User Details</a> 
	  <a href="<?php echo WEB_ROOT; ?>admin/account/" class="leftnav">Account Details</a>
	  <a href="<?php echo WEB_ROOT; ?>admin/funds/" class="leftnav">Fund Transfers</a>
	  <a href="<?php echo WEB_ROOT; ?>admin/cards/" class="leftnav">Credit Card</a>
	  <a href="<?php echo WEB_ROOT; ?>admin/properties/" class="leftnav">Properties</a>
	  <a href="<?php echo WEB_ROOT; ?>admin/contact/" class="leftnav">Contact us</a>
	  <a href="<?php echo $self; ?>?logout" class="leftnav">Logout</a>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p></td>
    <td width="750" valign="top" class="contentArea">
	 <table width="100%" border="0" cellspacing="0" cellpadding="20">
        <tr>
          <td>
			<?php require_once $content;?>
          </td>
        </tr>
      </table>
	 </td>
  </tr>
   <tr>
	<td class="contentArea" style="border-top:#999999 thin dashed;padding:20px;" colspan="2">
		<p style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px; margin-bottom:40px; text-align:center;">
			<?php echo $site_footer; ?>
		</p>
	</td>
  </tr>
</table>

</body>
</html>
