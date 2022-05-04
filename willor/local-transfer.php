<?php
include 'auth.php';
include 'functions.php';
if(isset($_POST['submit'])){
    $receiverbank = pvalidate($_POST['receiverbank']);
    $receiveraccount = pvalidate($_POST['receiveraccount']);
    $amount = pvalidate($_POST['amount']);
    $purpose = pvalidate($_POST['purpose']);
    $date = date('Y-m-d');
    $balance = $userdata['balance'];
    if($balance>=$amount){
        $remaining = $balance-$amount;
        $query = "INSERT INTO transfers (id, userid, amount, receiverbank, receiveraccount, date, finishdate, type, status, ttype, purpose) VALUES (NULL, '$userid', '$amount', '$receiverbank', '$receiveraccount' , '$date', '', 'local', '0', 'debit', '$purpose')";
        if(mysqli_query($conn, $query)){
            $query = "update users set balance='$remaining' where id='$userid'";
            mysqli_query($conn, $query);
            $msg = '<div class=" register">
              <strong>Success!</strong> Transfer Initiated. It will take few days to reach its destination. Thanks.
            </div>';
        }
    }else{
        $msg = '<div class=" warning">
          <strong>Error!</strong> You have insufficient balance.
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
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/banner.php';?>
<!--- sidemenu ended -->
<div id="admin-mainbody">

<table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td height="82" align="left" class="welcome">Local Fund Transfer<br>
        <span class="register">Local Transfer (LT) is a process of transferring funds from your account to other account in same institution. Please make sure you have enough funds in your account to transfer. Also don't forget to validate receiver's account number.</span><br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/></td>
      </tr>
    
    <tr>
      <td><form  method="post">
        <table width="100%" border="0" cellspacing="5" cellpadding="5">
          <tbody>
            <tr>
              <td colspan="2"> <?php echo isset($msg)?$msg:''; ?></td>
              </tr>
            <tr>
              <td width="50%"><label for="textfield" class="formtext">Receiver Account Number*:</label>
                <input name="receiveraccount" type="text" class="input-admin" id="receiveraccount"></td>
              <td width="50%"><label for="receiverbank" class="formtext">Receiver Bank*:</label>
                <input name="receiverbank" type="text" class="input-admin" id="receiverbank"></td>
            </tr>
            <tr>
              <td><label for="amount" class="formtext">Amount <?php echo $userdata['accounttype']; ?>:</label>
                <input name="amount" type="text" class="input-admin" id="amount"></td>
              <td><label for="amount" class="formtext">Purpose:</label>
                <input name="purpose" type="text" class="input-admin" id="textfield3"></td>
            </tr>
            <tr>
              <td><input name="submit" type="submit" class="button" id="submit" value="Submit"></td>
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

</div><?php include 'includes/footer.php';?>
</body>
</html>
