
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
        
       if($status==0){
            $error = '<div class="alert alert-warning" role="alert">
            <strong>Error!</strong> Please wait until your account is activated by the Admin.
            </div>';
       }elseif($_accountno == $db_accountno && password_verify($_password, $db_password)){
            $_SESSION['user'] = $db_id;
            $_SESSION['role'] = $role;
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
<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tbody>
    <tr>
      <td>
      <table><tbody>
    <tr>
      <td width="647" colspan="3"> <blockquote>
        <p><span class="shoppingonline">Welcome to</span><span class="welcome"> <br>
          Willor Trust e-Account. </span><br>
          <span class="normal"><br>
          If you don't already use Willor Trust e-Account, it's simple, </span>
          
          
          
          <span class="register" ><a href="register.php" class="special-button" style="text-decoration:none;" >Click to Register</a></span><br>
          </p>
        
 <p><span class="welcome">LOGIN</span> </p>
      </blockquote></td></tr></tbody></table>
      
      
      
      
      
      
      </td>
    </tr>
    <tr>
      <td>
      
      <form action="" method="post">
            <table width="100%" border="0">
  <tbody>
    <tr>
      <td align="center" style="margin-right:5px;">&nbsp;</td>
      <td class="passacc">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td width="12%" align="center" style="margin-right:5px;"><img src="images/person1.png" width="35" height="34" alt=""/></td>
      <td width="29%" class="passacc">Account Number :</td>
      <td width="59%"><input name="accountno" type="text" required class="input-admin" id="accountno"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td align="center" style="margin-right:5px;"><img src="images/passx.png" width="35" height="34" alt=""/></td>
      <td class="passacc">Password:</td>
      <td><input name="password" type="password" required class="input-admin" id="password"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <?php echo isset($error)?$error:''; ?>
      <td><input name="submit" type="submit" class="button" id="submit" value="Continue"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan="2" align="right" class="register">&nbsp;</td>
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
            <td width="8%"><img src="images/orange-button.png" width="33" height="43" alt=""/></td>
            <td width="92%">
            <p><span class="shoppingonline">Shopping and banking online is changing</span><br>
        <span class="normal">Soon, all banks will be carrying out extra security checks to make sure it’s really you when you’re shopping and banking online. To make it easier, please make sure we have your up-to-date contact number. Find out more now.</span></p>
            
            </td>
          </tr>
        </tbody>
      </table></td>
    </tr>
  </tbody>
</table>



</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
