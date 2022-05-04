
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

<table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    
    <tr>
      <td width="22%" align="center" valign="top"><img src="images/<?php echo $userdata['pics']; ?>" width="200" height="200" alt=""/>
      
      
      </td>
      <td width="38%" valign="middle" bgcolor="#E2F1FF"><table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td height="38" class="normal" style=" padding:10px;">WELCOME, </td>
          </tr>
          <tr>
            <td height="44" class="topbar-summery"><?php echo $userdata['firstname']; ?>&nbsp;<?php echo $userdata['lastname']; ?></td>
          </tr>
          <tr>
            <td height="44" align="left" class="normal">
            <?php
echo "DATE: " . date("Y/m/d") . "<br>";
?> | 
            <?php
echo "TIME: " . date("h:i:sa");
?>            <br></td>
          </tr>
        </tbody>
      </table></td>
      <td width="40%" valign="middle" bgcolor="#FFF3C4"><table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td height="30" class="topbar">BALANCE</td>
          </tr>
          <tr>
            <td height="49" class="topbar-summery" style=" padding:10px;"><?php echo $userdata['accounttype']; ?><?php echo $userdata['balance']; ?></td>
          </tr>
          <tr>
            <td height="44" class="topbar" style=" padding:10px;">We recommend to change your password in every 45 days to be secure.</td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td align="center" bgcolor="#F8F8F8" class="normal"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <td height="38" bgcolor="#0000E0"><p class="news" style=" padding:10px;"><a href="local-transfer.php">LOCAL TRANSFER</a></p></td>
          </tr>
          <tr>
            <td height="42" bgcolor="#0200FF"><p class="normal-admin" style=" padding:10px;"><a href="international-transfer.php">INTERN. TRANSFER</a></p></td>
          </tr>
        </tbody>
      </table></td>
      <td align="center" bgcolor="#FFF3C4" class="normal"><table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td>TOTAL CREDIT</td>
          </tr>
          <tr>
            <td class="topbar-summery"><?php
                                $query = "select SUM(amount) as totalamount from transfers where userid='$userid'  AND ttype='credit'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $amount = $row['totalamount'];
                           ?>
              <span class="topbar-summery" style=" padding:10px;"><?php echo $userdata['accounttype']; ?></span><?php echo number_format($amount); ?></td>
          </tr>
        </tbody>
      </table></td>
      <td align="center" bgcolor="#E2F1FF" class="normal"><table width="100%" border="0" cellspacing="5" cellpadding="0">
        <tbody>
          <tr>
            <td>TOTAL DEBIT</td>
          </tr>
          <tr>
            <td><span class="topbar-summery">
            <?php
                                $query = "select SUM(amount) as totalamount from transfers where userid='$userid' AND ttype='debit'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $amount = $row['totalamount'];
                           ?>
            <span class="topbar-summery" style=" padding:10px;"><?php echo $userdata['accounttype']; ?></span><?php echo number_format($amount); ?> </span></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    
    <tr>
      <td colspan="3" align="left" class="normal"><table width="100%" cellpadding="10" cellspacing="10" class="table table-padded">
        <thead>
          <tr>
            <th colspan="6" align="left" bgcolor="#FFF3C4"><span class="topbar">RECENT TRANSACTION :</span></th>
          </tr>
          <tr>
            <th width="188" bgcolor="#FFFCF2" class="normal"> Status </th>
            <th width="109" bgcolor="#DCE6FF" class="normal"> Date </th>
            <th width="133" bgcolor="#FFFCF2" class="normal"> Completion Date </th>
            <th width="78" bgcolor="#DCE6FF" class="normal"> Type </th>
            <th width="180" bgcolor="#FFFCF2" class="normal"> Amount </th>
            <th width="52" bgcolor="#A7C0FF" class="normal"> Actions </th>
          </tr>
        </thead>
        <tbody>
          <?php
                        $query = "select * from transfers where userid='$userid' order by id desc limit 10";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
          <tr>
            <td bgcolor="#FFFCF2" class="nowrap"><?php if(empty($row['finishdate'])){ ?>
              <span class="message">Not Started</span>
              <?php }elseif(date('Y-m-d')<$row['finishdate']){ ?>
              <span class="warning">In Progress
              </span>
              <?php }elseif(date('Y-m-d')>=$row['finishdate']){ ?>
              <span class="register">Completed</span>
              <?php } ?></td>
            <td bgcolor="#DCE6FF" class="normal"><span><?php echo $row['date']; ?></span></td>
            <td bgcolor="#FFFCF2" class="normal"><?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?></td>
            <td bgcolor="#DCE6FF" class="normal"><?php echo ucwords($row['ttype']); ?></td>
            <td bgcolor="#FFFCF2" class="normal"><?php if($row['ttype']=='credit'){ ?>
              <span class="text-success">+ <?php echo $userdata['accounttype']; ?>&nbsp;<?php echo number_format($row['amount']); ?></span>
              <?php }else{ ?>
              <span class="text-danger">- <?php echo number_format($row['amount']); ?>&nbsp;<?php echo $userdata['accounttype']; ?></span>
              <?php } ?></td>
            <td class="text-center"><a href="transfer-details.php?id=<?php echo $row['id']; ?>" class="view-button">Details</a></td>
          </tr>
          <?php }} ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" align="left" class="normal">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" align="left" class="normal">&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>

</div><?php include 'includes/footer.php';?>
</body>
</html>
