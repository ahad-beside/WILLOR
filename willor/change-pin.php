<?php
include 'auth.php';
include 'functions.php';
$pin = $userdata['pin'];
if(isset($_POST['submit']))
{
    $pin = pvalidate($_POST['pin']);

    $options = [
    'cost' => 11,
    ];

    $query = "UPDATE users SET pin='$pin' WHERE id ='$userid'";
    if(empty($pin)){
        $msg= "<div class='warning'>
              <strong >Error!</strong> PIN is required
        </div>";
    }elseif(!is_numeric($pin)){
        $msg= "<div class='warning'>
              <strong class='warning'>Error!</strong> PIN must contains ONLY Numbers
        </div>";
        $pin = $userdata['pin'];
    }else{
        if(mysqli_query($conn, $query)){
            $msg= "<div class=' register'>
                  <strong>Success!</strong> PIN Updated!!
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
      <td height="46" align="left" class="welcome">Change PIN<br>
        <span class="register">We recommend to change your PIN every 45 days to stay secure.<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/>        <br><?php echo isset($msg)?$msg:''; ?>
        </span></td>
      </tr>
    <tr>
      <td><form  method="post">
        <table width="52%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td><label for="textfield"><span class="formtext">Change PIN*</span>:</label>
                <input required class="input-admin" id="pin" type="password" value="<?php echo $pin; ?>" name="pin"></td>
              </tr>
            <tr>
              <td><label class="form-check-label"><input onclick="myFunction()" class="formtext" type="checkbox">
                <span class="formtext">Show PIN</span></label></td>
              </tr>
            <tr>
              <td><input name="submit" type="submit" class="button" value="Update"></td>
              </tr>
            </tbody>
          </table>
        </form></td>
    </tr>
    <tr>
      <td align="left" class="normal">&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>

</div>
<?php include 'includes/footer.php';?>

 <script>
    function myFunction() {
          var x = document.getElementById("pin");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }  
  </script>
</body>
</html>
