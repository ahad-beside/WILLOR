
<?php
ob_start();
session_start();
require_once 'db.php';
if(isset($_SESSION['user']))
{
    header("location: index.php");
}


if(isset($_POST['submit'])){
    $_accountno = mysqli_real_escape_string($conn, strip_tags($_POST['accountno'])) ;
    $_password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    
    $query = "SELECT * from users WHERE accountno = '$_accountno'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        $db_accountno = $row['accountno'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        $role = $row['role'];
        $status = $row['status'];
        
        $pin = $row['pin'];
        
       if($status==0){
            $error = '<div class="alert alert-warning" role="alert">
            <strong>Error!</strong> Please wait until your account is activated by the Admin.
            </div>';
       }elseif($_accountno == $db_accountno && password_verify($_password, $db_password)){
            $_SESSION['user'] = $db_id;
            $_SESSION['role'] = $role;
            $_SESSION['role'] = $pin;
            
    		ob_start();
            session_start();
            
            header('location:index.php');
            
        }else {
            $error = '<div class="alert alert-danger" role="alert">
            <strong class="register">Error!</strong> <span class="warning">Wrong Account Number or Password.</span>
            </div>';
        }
    }
 else {
        $error = '<div class="alert alert-danger" role="alert">
        <strong class="register">Error!</strong> <span class="warning">Wrong Account Number or Password.</span>
        </div>';
    }
}


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


<div id="admin-header">
<table width="100%" border="0" class="topbar" cellpadding="5">
  <tbody>
    <tr>
      <td width="38%" height="46" align="center" bgcolor="#FFCE00"> <em class="special-button">- We do things differently -</em></td>
      <td width="8%" align="left" bgcolor="#2807FF" >  <span class="news" style="margin-left:5px"> News :</span></td>
      <td width="41%" bgcolor="#FFCE00">
      
     <marquee behavior="scroll" direction="left" scrollamount="3" class="normal" onmouseover="this.stop();" onmouseout="this.start();"><span class="warning">Ensure no one is looking over your shoulders as you use your card. Make sure you observe your surroundings. </span>|<span class="special-button"> Your Account User ID and Password are confidential. Do not disclose them to anyone.</span> | <span class="register">Always log on to our internet banking service via our website - www.willortrust.com </span>
        </marquee></td>
      <td width="13%" align="center" bgcolor="#FFCE00" >&nbsp;</td>
    </tr>
  </tbody>
</table> 
<!--<div id="logo">
  <img src="images/wt-logo.png" width="150" height="107" alt="" style="margin-top:10px;"/> </div>-->

<!-- side menu begins -->
</div>
<!--- header ends -->
<!-- sidebar begins -->

<div id="admin-sidemenu"><!-- DivTable.com -->
  <table width="100%" border="0" bordercolor="" cellpadding="5" cellspacing="5">
  <tbody>
    <tr>
      <td bgcolor="#0200FF"><table width="100%" border="0" class="maimlogotable">
        <tbody>
          <tr>
            <td height="152" align="center" valign="middle"><img src="https://willortrust.com/willor/images/wt-logo2.png" width="88" height="76" alt=""/><strong><span class="news"><br>
              </span><span class="willor">WILLOR TRUST</span></strong></td>
            </tr>
        </tbody>
      </table></td>
    </tr >
    <tr>
      <td height="50" align="center" bgcolor="#FFCD04" class="normal"><strong>SECURITY INFO</strong></td>
    </tr>
    <tr>
      <td height="50" align="center" bgcolor="#0000E0" class="news"><a href="../willor/index.php"><br>
          <table width="100%" border="0">
            <tbody>
              <tr>
                <td width="17%"><img src="images/key.png" width="55" height="57" alt=""/></td>
                <td width="83%"><strong  >You're logging into a secure site</strong><br>
                  How can I tell that this <br>
                  site is secure?</td>
              </tr>
            </tbody>
          </table>
      </a></td>
      </tr>
    <tr>
      <td height="50" bgcolor="#0100F3" class="news"><a href="../willor/account-details.php"><br>
        <p align="justify"><strong>Willor Trust e-Account</strong><br>
          Willor Trust uses secure accress, which has two step login mechanism to make your online banking even safer.</p>
        <p align="justify">A personalised picture and message will help you autenticate our website; meanwhile and mutilayer autentication proccess requires registration for any third party transaction.</p>
        <p>&nbsp;</p>
      </a></td>
      </tr>
    <tr>
      <td height="50" align="center" bgcolor="#0200FF" class="news"><p><a href="../willor/account-details.php"><strong>Note:</strong></a><span class="notes"> <strong>Willor Trust will never send you a link to your email to access your account.</strong></span></p></td>
    </tr>
    </tbody>
</table>


</div>


<!-- sidebar ends -->
<!-- banner begins -->

<div id="admin-banner"> </div>
<!-- banner ends -->

<!--- sidemenu ended -->
<div id="admin-mainbody">
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tbody>
    <tr>
      <td>
      <table><tbody>
    <tr>
      <td width="647" colspan="3"> <blockquote>
        <p><span class="shoppingonline">Welcome to</span><span class="welcome"> <br>
          Willor Trust e-Account. </span><span class="login">LOGIN</span><br>
          <span class="normal"><br>
          If you don't already use Willor Trust e-Account, it's simple, </span>
          
          
          
          <span class="register" ><a href="register.php" class="special-button" style="text-decoration:none;" >Click to Register</a></span><br>
        </p>
      </blockquote></td></tr></tbody></table>
      
      
      
      
      
      
      </td>
    </tr>
    <tr>
      <td>
      
      <form action="" method="post">
            <table width="70%" border="0" cellpadding="5" cellspacing="5" style=" background-color:">
  <tbody>
    <tr>
      <td width="12%" align="center" style="margin-right:5px;"><img src="images/person1.png" width="35" height="34" alt=""/></td>
      <td width="13%" class="passacc">Account<br>
Number :</td>
      <td width="75%"><input name="accountno" type="text" required class="field-login" id="accountno"></td>
    </tr>
    <tr>
      <td align="center" style="margin-right:5px;"><img src="images/passx.png" width="35" height="34" alt=""/></td>
      <td class="passacc">Password:</td>
      <td><input name="password" type="password" required class="field-login" id="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <?php echo isset($error)?$error:''; ?>
      <td><input name="submit" type="submit" class="button" id="submit" value="Continue"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right" class="register">Forgotten your logon details? Click Here</td>
    </tr>
  </tbody>
</table>

            </form> <!-- form ends -->
      
      
      
      
      </td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="5" cellpadding="5">
        <tbody>
          <tr>
            <td width="8%"><blockquote>
              <p><img src="images/orange-button.png" width="33" height="43" alt=""/></p>
            </blockquote></td>
            <td width="92%"><blockquote>
              <p><span class="shoppingonline">Shopping and banking online is changing</span><br>
                <span class="normal">Soon, all banks will be carrying out extra security checks to make sure it’s really you when you’re shopping and banking online. To make it easier, please make sure we have your up-to-date contact number. Find out more now.</span></p>
            </blockquote></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>



</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
