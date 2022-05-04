<?php
ob_start();
session_start();
require_once 'db.php';
if(isset($_SESSION['user']))
{
    header("location: customer.php");
}


if(isset($_POST['submit'])){
     /*$_accountno = mysqli_real_escape_string($conn, strip_tags($_POST['accountno'])) ; */
    $_pin = mysqli_real_escape_string($conn, strip_tags($_POST['pin']));
    
    $query = "SELECT * from users WHERE pin = '$_pin'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        $db_pin = $row['pin'];
       /* $db_password = $row['password'];*/
        $db_id = $row['id'];
        $role = $row['role'];
        $status = $row['status'];
        
       if($status==0){
            $error = '<div class="alert alert-warning" role="alert">
            <strong class="warning">Error!</strong> Please wait until your account is activated by the Admin.
            </div>';
       }elseif($_pin == $db_pin && pin_verify($_pin, $db_pin)){
            $_SESSION['user'] = $db_id;
            $_SESSION['role'] = $role;
    		ob_start();
            session_start();
            header('location:customer.php');
        }else {
           $error = '<div class="alert alert-danger" role="alert">
            <strong class="warning">Error!</strong> Wrong Pin.
            </div>';
        }
    }
 else {
        $error = '<div class="alert alert-danger" role="alert">
        <strong>Error!</strong> Wrong Pin.
        </div>';
    }
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css"/>
<link href="css/divstyle.css" rel="stylesheet" type="text/css"/>

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
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
<div id="header">
<table width="100%" border="0" class="topbar" cellpadding="5">
  <tbody>
    <tr>
      <td width="56%" height="46"><a class="normal" style="margin-left:20px">Policies   |  Complains  |   Application Form |  FAQs</a></td>
      <td width="9%" align="left" bgcolor="#0200ff" >  <span class="news" style="margin-left:5px"> News :</span></td>
      <td width="35%">
      <marquee behavior="scroll" direction="left" scrollamount="2" class="normal" onmouseover="this.stop();" onmouseout="this.start();">
Welcome to Willor Trust e-Account for any enquiry call : +1 340 330 494 55
      </marquee>
      </td>
    </tr>
  </tbody>
</table> 
<!--<div id="logo">
  <img src="images/wt-logo.png" width="150" height="107" alt="" style="margin-top:10px;"/> </div>-->

<!-- side menu begins -->
</div>
<div id="sidemenu">
<div class="divTable" style="width: 100%;border:0px;" >
<div class="divTableBody">
<div class="divTableRow">

<!-- fixing logo and name -->
<div class="divTableCell" >
  <table width="100%" border="0" class="maimlogotable">
    <tbody>
      <tr >
        <td width="33%" height="117"><img src="images/wt-logo2.png" style="padding:5px;" width="109" height="95" alt=""/></td>
        <td width="67%"><span class="logo-name">WILLOR TRUST<br>
LIMITED</span></td>
      </tr>
    </tbody>
</table>
</div>
</div>
<div class="divTableRow">
<div class="divTableCell" ><img src="images/TYPE2.png" width="442" height="306" alt=""/></div>
</div>
<div class="divTableRow">
<div class="divTableCell">
<div class="topbar" style="color:#fff" >
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
 </div>
 <div class="divTableRow" ><hr width="80%"  style="border-color:#FFF">
   <blockquote>
     <p class=" news" style=" text-align:justify;"><br>
       
       <strong style="font-size:16px;">Willor Trust e-Account</strong><br>
       Willor Trust uses secure accress, which has two step login mechanism to make your online banking even safer.
       <p class=" news" style=" text-align:justify;">
       A personalised picture and message will help you autenticate our website; meanwhile and mutilayer autentication proccess requires registration for any third party transaction.</p>
       <p class="notes" style=" text-align:justify;">
       <strong>Note:</strong> Willor Trust will never send you a link to your email to access your account.</p>
     </p>
   </blockquote>
 </div>
</div>
</div>
</div>
</div>
<!-- DivTable.com -->
</div>
<!--- sidemenu ended -->
<div id="banner" style="background-image:url(images/banner.png)">
</div>

<div id="mainbody">
<table width="100%" border="0">

  <tbody>
    <tr>
      <td colspan="3"> <blockquote>
        <p><span class="welcome">LOGIN STEP2 -</span><span class="login"> PIN VERIFICATION</span><span class="normal"><br>
          If you don't already use Willor Trust e-Account, it's simple, </span><strong> 
          <br>
          </strong></p>
      </blockquote></td>
    </tr>
    <tr>
      <td colspan="3"><blockquote>
        <table width="70%%" border="0" align="left" cellpadding="20" cellspacing="5">
          <tbody>
            <tr bgcolor="#EDEDED">
              <!-- main login form is here -->
              <td height="175" bgcolor="#FFF6D2">
            <form  action="" method="post">
            <p class="warning"><?php echo isset($error)?$error:''; ?>
            </p>
            <table width="100%" border="0">
              <tbody>
    <tr>
      <td width="12%" align="center" style="margin-right:5px;"><img src="images/passx.png" width="35" height="34" alt=""/></td>
      <td width="29%" class="passacc">PIN NUMBER:</td>
      <td width="59%"><input name="password" type="password" required class="input" id="password" value="pass" maxlength="4"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input name="submit" type="submit" class="button" id="submit" value="Validate Pin"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right" class="register">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right" class="register">Forgotten your pin?<a href="#" class="warning" style="text-decoration:none;"> Click Here</a></td>
    </tr>
  </tbody>
</table>

            </form>
              </td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
      </blockquote></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
      </tr>
    <tr>
      <td width="5%" bgcolor="#FFFFFF">&nbsp;</td>
      <td width="6%" valign="top" bgcolor="#FFFFFF"><img src="images/orange-button.png" width="33" height="43" alt=""/></td>
      <td width="89%" bgcolor="#FFFFFF"><p><span class="shoppingonline">Shopping and banking online is changing</span><br>
        <span class="normal">Soon, all banks will be carrying out extra security checks to make sure it’s really you when you’re shopping and banking online. To make it easier, please make sure we have your up-to-date contact number. Find out more now.</span></p>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
      <td height="32" colspan="3" align="right" class="normal" style="margin-left:5px; margin-right:5px; text-align: center;">&nbsp;</td>
    </tr>
  </tbody>
</table>


</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
