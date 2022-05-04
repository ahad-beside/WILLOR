<?php
ob_start();
session_start(); 
require_once 'db.php';
include 'functions.php';
if(isset($_SESSION['user'])){
    header("location: index");
}

if(isset($_POST['submit']))
{
  $firstname = pvalidate($_POST['firstname']);
  $lastname = pvalidate($_POST['lastname']);
	$gender = pvalidate($_POST['gender']);
	$bdate = pvalidate($_POST['bdate']);
	$phone = pvalidate($_POST['phone']);
  $email = pvalidate($_POST['email']);
	$address = pvalidate($_POST['address']);
  $city = pvalidate($_POST['city']);
	$state = pvalidate($_POST['state']);
	$country = pvalidate($_POST['country']);
	$zip = pvalidate($_POST['zip']);
	$accounttype = pvalidate($_POST['accounttype']);
	
	$pics = pvalidate($_FILES['pics']['name']);
	
	//$image = $_FILES["pics"] ["name"];
	$image_name= addslashes($_FILES['pics']['name']);
	$size = $_FILES["pics"] ["size"];
	$error = $_FILES["pics"] ["error"];
	
  $role = 'user';
  $password = pvalidate($_POST['password']);
  $cpassword = pvalidate($_POST['confirmpassword']);
  $options = ['cost' => 11];
  //$options = [ 'cost' => 11, 'salt' => '$P27r06o9!nasda57b2M22' ];
  $hpassword = password_hash($password, PASSWORD_BCRYPT, $options);
	$pin = pvalidate($_POST['pin']);
	$date = date("Y-m-d");
    $query_email = mysqli_query($conn,"select email from users where email = '$email'");
    if(empty($email) or empty($password) or empty($firstname)){
            $msg = "<div class= 'special-button-red'>
            <p><strong>Error!</strong> Please fill all required fields</p>
            </div>";
    }elseif($password != $cpassword){
            $msg = "<div class= 'special-button-red'>
            <p><strong>Error!</strong> Passwords doesnt match
            </div>";
    }elseif(strlen($password)<6){
            $msg = "<div class= 'special-button-red'>
            <p><strong>Error!</strong> Password must be 6 characters long</p>
            </div>";
    }elseif(mysqli_num_rows($query_email) > 0){
            $msg = "<div class= 'special-button-red'>
            <p><strong>Error!</strong> Email already exists!!</p>
            </div>";
    }else{
            move_uploaded_file($_FILES["pics"]["tmp_name"],"images/" . $_FILES["pics"]["name"]);		
		    //$pics=$image_name;
		    
            $query = "INSERT INTO users (id, firstname, lastname, gender, bdate, phone, email, address, city, state, country, zip, accounttype, pics, password, pin, role) VALUES (NULL, '$firstname', '$lastname', '$gender', '$bdate', '$phone', '$email', '$address', '$city', '$state', '$country', '$zip', '$accounttype', '$pics', '$hpassword', '$pin', '$role')";
            if(mysqli_query($conn, $query)){
                $to = $email;
                $subject = 'Welcome to Will Or Trust';
                include 'mails/welcome.php';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <support@willortrust.com>' . "\r\n";
                mail($to, $subject, $message, $headers);
                $msg = "<div class='special-button-green'>
                <p><strong>Success!</strong> Your account has been created. You will receive an Email after your account has been approved by Admin.</p><p></p>
                </div>";
				
        }
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
background-color:#FFF6D2;

}

</style>

<body>


<div id="container" style="background-color:#FFF6D2">
<div id="header">
  <table width="100%" border="0" class="topbar" cellpadding="5">
    <tbody>
      <tr>
        <td width="33%" height="46" bgcolor="#FFCE00"><a class="normal" style="margin-left:20px"><em class="special-button">We do things differently</em></a></td>
        <td width="12%" align="left" bgcolor="#0200FF" ><span class="news" style="margin-left:5px"> News :</span></td>
        <td width="55%" bgcolor="#FFCE00"><marquee behavior="scroll" direction="left" scrollamount="2" class="normal" onmouseover="this.stop();" onmouseout="this.start();">
         <span class="warning">Ensure no one is looking over your shoulders as you use your card. Make sure you observe your surroundings. </span>|<span class="special-button"> Your Account User ID and Password are confidential. Do not disclose them to anyone.</span> | <span class="register">Always log on to our internet banking service via our website - www.willortrust.com </span>
        </marquee></td>
      </tr>
    </tbody>
  </table>
</div><div id="header-logo">
<table width="100%" border="0" cellpadding="10px">
  <tbody>
    <tr>
      <td width="32%"><img src="images/wt-logo2.png" width="55" height="47" alt=""/></td>
      <td width="68%" class="news"><strong class="willor">WILLOR TRUST</strong></td>
    </tr>
  </tbody>
</table>
</div>
<div id="mainbody2" style="background-color:#FFF6D2">
  <form method="post" enctype="multipart/form-data" action="">
    <table width="80%" border="0" align="center" cellpadding="10" cellspacing="10" style="background-color: #FFF6D2">
      <tbody>
        <tr >
          <td height="38" colspan="4" align="center"><?php echo isset($msg)?$msg:''; ?></td>
        </tr>
        <tr>
          <td height="124" colspan="4" align="center"><span class="login">Register Account</span><br>
            <span class="normal">Please register your account with us to take the benefit of our online e-Account System.</span><span class="register"><br>
            <br>
            </span><span class="normal">You already have an account,</span> <span class="register"><a href="login.php" class="view-button" style=" text-decoration:none;"> LOGIN </a></span></td>
          </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" class="topbar" style=" border-radius:10px; border: none;">PERSONAL INFORMATION :</td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td width="10%" align="right" class="passacc"><img src="images/person1.png" width="44" height="43" alt=""/></td>
          <td width="19%" class="passacc">FIRST NAME :</td>
          <td width="60%"><input name="firstname" type="text" required class="input-register" id="firstname"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/person1.png" width="44" height="43" alt=""/></td>
          <td><span class="passacc">LAST NAME :</span></td>
          <td><input name="lastname" type="text" required class="input" id="lastname"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/gender.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="gender">GENDER :</label></td>
          <td>
          <select name="gender"  required class="inputselect" id="gender">
            <option value="male" selected="selected">Male</option>
            <option value="Female">Female</option>
          </select>
          
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/birth.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="bdate">DATE OF BIRTH :</label></td>
          <td><input name="bdate" type="date" required class="inputselect" id="bdate" max="2011-01-01" min="1890-01-01" value="2000-01-01"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/phone.png" width="37" height="36" alt=""/></td>
          <td class="passacc"><label for="phone">PHONE NUMBER :</label></td>
          <td><input name="phone" type="number" required class="input" id="phone"></td>
        </tr>
        
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td class="passacc"><label for="email">E-MAIL :</label></td>
          <td>
            <input name="email" type="email" class="input" id="email"></td>
        </tr>
        
        
        <tr>
          <td colspan="4" bgcolor="#e6e7e8" class="topbar" style=" border-radius:10px; border: none;">ADDRESS INFORMATION :
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/address.png" width="40" height="39" alt=""/></td>
          <td><label for="address" class="passacc">ADDRESS :</label></td>
          <td><textarea name="address" rows="5" required class="input" id="address"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/city.png" width="44" height="43" alt=""/></td>
          <td><label for="city" class="passacc">CITY :</label></td>
          <td><input name="city" type="text" required="required" class="input" id="city"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/circle.png" width="42" height="41" alt=""/></td>
          <td><label for="city" class="passacc">STATE :</label></td>
          <td><input name="state" type="text" required="required" class="input" id="state"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/country.png" width="44" height="43" alt=""/></td>
          <td><label for="city" class="passacc">COUNTRY :</label></td>
          <td><input name="country" type="text" required="required" class="input" id="country"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/zip.png" width="40" height="39" alt=""/></td>
          <td><label for="city" class="passacc">ZIPCODE :</label></td>
          <td><input name="zip" type="text" required="required" class="input" id="zip"></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" style=" border-radius:10px; border: none;"><span class="topbar" >ACCOUNT INFORMATION : </span></td>
          </tr>
        <tr>
          <td class="passacc">&nbsp;</td>
          <td align="right" class="passacc"><img src="images/acc.png" width="44" height="43" alt=""/></td>
          <td class="passacc"><label for="accounttype">ACCOUNT TYPE :</label></td>
          <td><p>
            <select name="accounttype" size="1" required class="inputselect" id="accounttype">
              <option value="$">($) Dollar Account</option>
              <option value="€">(€) Euro Account</option>
          </select>
            <br>
          </p></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td class="passacc">PROFILE PICTURE UPLOAD :</td>
          <td><input name="pics" type="file" required="required" class="inputselect" id="pics"></td>
        </tr>
        <tr>
          <td colspan="4" bgcolor="#E6E7E8" class="topbar" style=" border-radius:10px; border: none;">SECURITY :</td>
          </tr>
        <tr>
          <td align="right"></td>
          <td align="right"><img src="images/passx.png" width="44" height="43" alt=""/></td>
          <td><label for="password" class="passacc">PASSWORD :</label></td>
          <td><input name="password" type="password" required="required" class="inputselect" id="password"></td>
        </tr>
        <tr>
          <td align="right"></td>
          <td align="right"><img src="images/dots.png" width="44" height="43" alt=""/></td>
          <td><label for="password" class="passacc">CONFIRM PASSWORD :</label></td>
          <td><input name="confirmpassword" type="password" required="required" class="inputselect" id="password"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right"><img src="images/pin.png" width="44" height="43" alt=""/></td>
          <td ><label for="password" class="passacc">PIN :</label></td>
          <td><input name="pin" type="text" required class="inputselect" id="pin" ></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="right">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="11%">&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td class="normal">Make sure you fill out all the fields needed to setup your account.</td>
        </tr>
        
        <tr>
        
          <td>&nbsp;</td>
          <td colspan="2">&nbsp;</td>
          <td><button class="button" name="submit">Register Now</button</td>
          </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
  </form>
</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
