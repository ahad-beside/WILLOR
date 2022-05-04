<?php
include 'auth.php';
include '../functions.php';
if(isset($_POST['submit'])){
    $senderaccount = pvalidate($_POST['senderaccount']);
    $senderbank = pvalidate($_POST['senderbank']);
    $amount = pvalidate($_POST['amount']);
    $purpose = pvalidate($_POST['purpose']);
    $date = date('Y-m-d');
    $userid = validate($_POST['userid']);
    $query = "INSERT INTO transfers (id, userid, amount, receiverbank, receiveraccount, date, finishdate, type, status, ttype, purpose) VALUES (NULL, '$userid', '$amount', '$senderbank', '$senderaccount' , '$date', '$date', '', '1', 'credit', '$purpose')";
    if(mysqli_query($conn, $query)){
        $query = "update users set balance= balance+'$amount' where id='$userid'";
        mysqli_query($conn, $query);
        $msg = '<div class=" register">
          <strong>Success!</strong> Amount Credited to User Account.
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
<link href="../css/style.css" rel="stylesheet" type="text/css"/>
<link href="../css/divstyle.css" rel="stylesheet" type="text/css"/>
<link href="https://fonts.googleapis.com/css?family=Anton&display=swap" rel="stylesheet">

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
<?php include 'includes/header.php';?>
<?php include 'includes/sidebar.php';?>
<?php include 'includes/banner.php';?>
<!--- sidemenu ended -->
<div id="admin-mainbody">
  <table width="80%" border="0" cellspacing="10" cellpadding="10">
    <tbody>
      <tr>
        <td><span class="welcome">Credit Account</span><br>
          <span class="register">Add Balance to the Existing Will Or Trust Accounts </span><br>
          <img src="../images/line-yellow.png" width="408" height="4" alt=""/> <br>
          <?php echo isset($msg)?$msg:''; ?></td>
      </tr>
      <tr>
        <td>
        <form id="formValidate" method="post">
        <table width="86%" border="0" cellspacing="10" cellpadding="10">
          <tbody>
            <tr>
              <td colspan="2"><span class="formtext"> User Account:</span>
                <select required name="userid" class="input-admin" id="">
                      <option value="">Select</option>
                      <?php
                        $query = "select * from users order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                       <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'].' '.$row['lastname'].' - Account No. '.$row['accountno']; ?></option>
                       <?php }} ?>
                  </select></td>
            </tr>
            <tr>
              <td width="52%"><label for="" class="formtext">Sender Account No*</label>
                  <input required class="input-admin" type="text" value="" name="senderaccount"></td>
              <td width="48%"><label for="" class="formtext">Sender Bank*</label>
                  <input required class="input-admin" type="text" value="" name="senderbank"></td>
            </tr>
            <tr>
              <td valign="top"><label for="" class="formtext">Amount ($)</label>
                  <input  required  class="input-admin" type="number" value="" name="amount"></td>
              <td><label for="" class="formtext">Purpose</label>
                  <input  class="input-admin" type="text" value="" name="purpose"></td>
            </tr>
            <tr>
              <td colspan="2"><button class="Rbutton" name="submit"> Submit</button> </td>
            </tr>
          </tbody>
        </table>
        </form>
        </td>
      </tr>
    </tbody>
  </table>
</div>
</div><?php include 'includes/footer.php';?>
</body>
</html>
