<?php
ob_start();
session_start();
require_once '../db.php';
if(isset($_SESSION['user']))
{
    header("location:index.php");
}


if(isset($_POST['submit'])){
    $_email = mysqli_real_escape_string($conn, strip_tags($_POST['email'])) ;
    $_password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    
    $query = "SELECT * from admin WHERE email = '$_email'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        
        if($_email == $db_email && password_verify($_password, $db_password)){
            $_SESSION['admin'] = $db_id;
    		ob_start();
            session_start();
            header('location:index.php');
        }else {
            $error = '<div class= "warning" role="alert">
            <strong>Error!</strong> Wrong Email or Password.
            </div>';
        }
    }
 else {
        $error = '<div class= " warning" role="alert">
        <strong>Error!</strong> Wrong Email or Password.
        </div>';
    }
}


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<title>Willor Trust Limited</title>
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../css/divstyle.css" rel="stylesheet" type="text/css"/>

<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
<style type="text/css">
body {
margin-left:0auto;
margin-bottom:auto;
margin-right:auto;
margin-top:5%;
background-color: #1F52A4;
background-image: ;
background-repeat:repeat;
background-attachment:fixed;
opacity:30%;

}

</style>
</head>

<body>
<table width="484" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#C5C5C5" border-radius="20px">
  <tbody>
    <tr valign="middle">
      <td width="484" height="48" align="left" bgcolor="#FFFFFF" class="login"><p><img src="../images/adminlogin.png" width="500" height="210" alt=""/><br>
      <span class="shoppingonline" style=" padding-left:20px">ADMIN LOGIN</span></td>
    </tr>
    <tr>
      <td bgcolor="#FFFFFF"><form id="form1" name="form1" method="post">
        <table width="80%" border="0" align="center" cellpadding="5" cellspacing="5" bordercolor="#FFFFFF" background="#Fff">
          <tbody>
            <tr>
              <td bgcolor="#FFFFFF"<span style=" padding-left:20px"><?php echo isset($error)?$error:''; ?></span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="formtext">USERNAME :</span>
                <input name="email" type="email" required class="input-admin" id="email"></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="formtext">PASSWORD :</span>
                <input name="password" type="password" required class="input-admin" id="password"></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#FFFFFF"><input name="submit" type="submit" class="inputbutton" id="submit" value="Access"></td>
            </tr>
          </tbody>
        </table>
        <p>&nbsp;</p>
      </form></td>
    </tr>
  </tbody>
</table>
</body>
</html>