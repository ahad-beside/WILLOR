<?php
include 'auth.php';
include 'functions.php';
if(isset($_POST['submit']))
	{
        $currentpassword = pvalidate($_POST['currentpassword']);
        $newpassword = pvalidate($_POST['password']);
        $cpassword = pvalidate($_POST['cpassword']);
        
        $options = [
        'cost' => 11,
        ];
        
        $hashed = password_hash($newpassword, PASSWORD_BCRYPT, $options);
        $query = "SELECT password FROM users where id = '$userid'";
                 
        $run = mysqli_query($conn, $query);
        
        if($newpassword!=$cpassword){
            $msg = "<div class='alert alert-danger'>
                          <strong>Error!</strong> Passwords Doesn't Match!!
                    </div>";
        }
       elseif(mysqli_num_rows($run)> 0)
         {
           $row = mysqli_fetch_array($run);
           $password = $row['password'];
            if(!password_verify($currentpassword, $password)){
                $msg = "<div class=' special-button-red'>
                          <strong>Error!</strong> Wrong Current Password!!
                    </div>";
            
            }
           
           elseif(strlen($password)<6){
                $msg= "<div class=' special-button-red'>
                          <strong>Error!</strong> Password must be atleast 6 characters!!
                    </div>";
           }
           
           else{
                    
                $query1 = "UPDATE users SET password='$hashed' WHERE id ='$userid'";
                if(mysqli_query($conn, $query1)){
                    $msg= "<div class=' register'>
                          <strong>Success!</strong> Password Updated!!
                    </div>";
                }else{
                    echo "Opps There is some error";
                }
            }

        
        
        

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
        <td class="welcome">Change Password<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/><br><?php echo isset($msg)?$msg:''; ?></td>
      </tr>
      <tr>
        <td>
        <form id="" method="post">
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td width="18%" align="right" class="formtext">Current Password :</td>
              <td width="82%"><input required class="input-admin" type="password" value="" name="currentpassword"></td>
            </tr>
            <tr>
              <td align="right"><span class="formtext">New Password :</span></td>
              <td><input  required  class="input-admin" type="password" value="" name="password"></td>
            </tr>
            <tr>
              <td align="right"><span class="formtext">Confirm New Password :</span></td>
              <td><input  required  class="input-admin" type="password" value="" name="cpassword"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><button class="Rbutton" type="submit" name="submit"> Update</button></td>
            </tr>
          </tbody>
          </form>
        </table></td>
      </tr>
    </tbody>
  </table>



</div>
<?php include 'includes/footer.php';?>
</body>
</html>
