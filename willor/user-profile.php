<?php
include 'auth.php';
include 'functions.php';
$firstname = $row['firstname'];
$lastname = $row['lastname'];
$phone = $row['phone'];
$address = $row['address'];
$city = $row['city'];
$state = $row['state'];
$zip = $row['zip'];
if(isset($_POST['submit']))
{
    $firstname = pvalidate($_POST['firstname']);
    $lastname = pvalidate($_POST['lastname']);
    $phone = pvalidate($_POST['phone']);
    $address = pvalidate($_POST['address']);
    $city = pvalidate($_POST['city']);
    $state = pvalidate($_POST['state']);
    $zip = pvalidate($_POST['zip']);

    
    if(empty($firstname) or empty($lastname) or empty($lastname)){
        $msg= "<div class=' warning'>
        <strong>Error!</strong> Please fill the required fields
        </div>";
    }else{
        $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', phone='$phone', address='$address', city='$city', state='$state', zip='$zip' WHERE id ='$userid'";
        if(mysqli_query($conn, $query)){
            $msg= "<div class=' register'>
                  <strong>Success!</strong> Profile Updated!!
            </div>";
        }
    }
}


if(isset($_POST['changeavatar'])){
    $avatar_temp = $_FILES['avatar']['tmp_name'];
    $avatar = $_FILES['avatar']['name'];
    move_uploaded_file($avatar_temp, "img/User_$userid.jpg");
    $msg= "<div class=' register'>
    <strong>Success!</strong> Avatar Uploaded!!
    </div>";
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
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/banner.php';?>
<!--- sidemenu ended -->
<div id="admin-mainbody">

<table width="80%" border="0" cellspacing="5" cellpadding="5">
  <tbody>
    <tr>
      <td height="36" align="left" class="welcome">User Profile<br>
        <span class="register">We recommend to change your password in every 45 days to be secure.</span><br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/><br> <?php echo isset($msg)?$msg:''; ?></td>
      </tr>
    
    <tr>
      <td><form  method="post">
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td width="33%" height="106"><label for="textfield" class="formtext">First Name:</label>
                <input required name="firstname" class="input-admin" type="text" value="<?php echo $firstname; ?>"></td>
              <td width="28%"><label for="textfield2" class="formtext">Last Name:</label>
                <input required name="lastname" class="input-admin" type="text" value="<?php echo $lastname; ?>"></td>
              <td width="39%"><label for="textfield3" class="formtext">Phone Number:</label>
                <input required name="phone" class="input-admin" type="text" value="<?php echo $phone; ?>"></td>
            </tr>
            <tr>
              <td colspan="3"><label for="textfield4" class="formtext">Address:</label>
                <input name="address" type="text" required class="input-admin" value="<?php echo $address; ?>"></td>
            </tr>
           
            <tr>
              <td><label for="textfield5" class="formtext">City:</label>
                <input name="city"  class="input-admin" type="text" value="<?php echo $city; ?>"></td>
              <td><label for="textfield6" class="formtext">State:</label>
                <input name="state"  class="input-admin" type="text" value="<?php echo $state; ?>"></td>
              <td><label for="textfield7" class="formtext">Zip:</label>
                <input name="zip" type="text" class="input-admin" id="zip" value="<?php echo $zip; ?>"></td>
            </tr> <tr>
              <td><input name="submit" type="submit" class="button" id="submit" value="Submit"></td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
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

</div>
<?php include 'includes/footer.php';?>

<script>
        $(".changeavatar").click(function(){
           $('#file').trigger('click'); 
        });
        
        $("#file").change(function(){
           $("#uploadForm").submit(); 
        });
    </script>
</body>
</html>
