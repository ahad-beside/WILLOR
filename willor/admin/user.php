<?php 
include 'auth.php';
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
<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>

<script>
$ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
	$(id).style.display ='block';
}
var hide = function(id) {
	$(id).style.display ='none';
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

      <table width="90%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td width="7%" height="50" align="center" class="welcome"><img src="../images/user-icon.png" width="33" height="30" alt=""/></td>
      <td width="93%" class="admin-welcome"><span class="welcome">User Account</span><br>
        <img src="../images/line-yellow.png" width="408" height="4" alt=""/></td>
    </tr>
    <tr>
      <td height="128" colspan="2"><table width="100%" cellpadding="10" cellspacing="10" >
        <thead>
          <tr>
            <th width="15%" bgcolor="#F5F5F5"><span class="normal"> Status </span></th>
            <th width="22%" bgcolor="#FEF1CA"><span class="normal"> Name </span></th>
            <th width="10%" bgcolor="#E7E7FF"><span class="normal"> Email </span></th>
            <th width="17%" bgcolor="#FEF1CA" class="text-center"><span class="normal"> Account Number </span></th>
            <th width="18%" bgcolor="#E7E7FF" class="text-right"><span class="normal"> Balance </span></th>
            <th colspan="2" class="text-center"><span class="shoppingonline"> Actions </span></th>
          </tr>
        </thead>
        <tbody>
          <?php
                        $query = "select * from users order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
          <tr>
            <td align="center" bgcolor="#F5F5F5"><span class="warning">
              <?php if($row['status']==0){ ?>
              Pending</span> <span class="register">
                <?php }else{ ?>
                <strong class="register">Active</strong></span> <span class="normal">
                  <?php } ?>
                </span></td>
            <td align="center" bgcolor="#FEF1CA"><span class="normal"><?php echo $row['firstname'].' '.$row['lastname']; ?></span></td>
            <td align="center" bgcolor="#E7E7FF" class="cell-with-media"><span class="normal">
              <?php 
                                echo $row['email']
                            ?>
            </span></td>
            <td align="center" bgcolor="#FEF1CA" class="text-center"><span class="normal"><?php echo $row['accountno']; ?></span></td>
            <td align="center" bgcolor="#E7E7FF" class="text-right bolder nowrap"><span class="normal"><?php echo number_format($row['balance']); ?> USD </span></td>
            <td width="9%" align="center" class="text-center"><span class="normal"><a href="view-user.php?id=<?php echo $row['id']; ?>" class="view-button" style="text-decoration:none">view</a> </span></td>
            <td width="9%" align="center" class="text-center"><a href="update-user.php?id=<?php echo $row['id']; ?>" class="update-button" style="text-decoration:none">update</a></td>
          </tr>
          <?php }} ?>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td height="41" colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td height="41" colspan="2">&nbsp;</td>
    </tr>
  </tbody>
</table>  </div>
<?php include 'includes/footer.php';?>

</body>
</html>
