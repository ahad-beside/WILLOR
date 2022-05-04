<?php
$url = 'http://'.$_SERVER['HTTP_HOST'].'/demos/willortrust';
include 'auth.php';
include 'functions.php';
if(isset($_POST['submit'])){
    $comment = pvalidate($_POST['comment']);
    $reason = pvalidate($_POST['reason']);
    $subject = pvalidate($_POST['subject']);
   
    if(!empty($comment) or !empty($reason) or !empty($subject))
    {
        include('mails/contact.php');
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <ctrlplusv@ctrlplusv.com>' . "\r\n";
        if(mail('hassanrrs@gmail.com',$subject,$message,$headers)){
            $msg = "<div class='alert alert-success'>
            Message Sent Successfuly!! We will be in touch with you shortly.
            </div>";
        }else{
			die('Error');
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

<table width="80%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td height="46" align="left" class="welcome">Contact Manager<br>
        <span class="register">If you have any query, complain or suggestion then feel free to contact us. Our Support staff will respond you as soon as possible.<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/>        <br><?php echo isset($msg)?$msg:''; ?>
        </span></td>
      </tr>
    
    <tr>
      <td><form  method="post">
        <table width="60%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td><label for="subject" class="formtext">Subject:</label>
                <input name="subject" type="text" class="input-admin" ></td>
            </tr>
            <tr>
              <td><label for="subject" class="formtext">Reason:</label>
                <input name="reason" type="text" class="input-admin" ></td>
            </tr>
            <tr>
              <td><label for="comment" class="formtext">Comment:</label>
                <textarea name="comment" rows="3" class="input-admin" ></textarea></td>
            </tr>
            <tr>
              <td><input name="submit" type="submit" class="Rbutton" id="submit" value="Submit"></td>
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

</div><?php include 'includes/footer.php';?>
</body>
</html>
