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
<table width="100%" border="0" cellpadding="20" cellspacing="20">
  <tbody>
    <tr>
      <td height="28" colspan="2" bgcolor="#FFF"><p><span class=" welcome">HELLO ADMIN, WELCOME .</span><span class="welcome"><br/>
      </span><br/><img src="../images/line-yellow.png" width="408" height="4" alt=""/><br/><span class="register">Summary for e-Account Management</span><br>
      </p></td>
      <td height="28" bgcolor="#F0F0F0" class="normal" align="center">
      <!-- date and time --->

<iframe src="http://free.timeanddate.com/clock/i6sfw8us/tct/pct/tt0/tw0/ts1/tb4" frameborder="0" width="130" height="36" allowTransparency="true"></iframe>
      
      </td>
      </tr>
    <tr>
      <td width="35%" height="113" bgcolor="#0100F3"><table width="100%" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td width="30%" rowspan="2">
              <span class="summery">
              <?php  $query = "select count(*) as totalusers from users";                 
              $run = mysqli_query($conn, $query);
              $row = mysqli_fetch_array($run);
              $totalusers = $row['totalusers'];
        ?>       
              <?php echo $totalusers; ?></span></td>
            <td class="willor">&nbsp;</td>
          </tr>
          <tr>
            <td width="70%" class="willor"><strong>TOTAL USERS</strong></td>
          </tr>
        </tbody>
      </table>
      
      </td>
      <td width="32%" bgcolor="#0000E0"><table width="88%" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td width="27%" rowspan="2" class="summery">
            
             <?php
                                $query = "select count(*) as totalrequests from transfers where status='0'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $totalrequests = $row['totalrequests'];
                           ?>
                            <?php echo number_format($totalrequests); ?>
              
              </td>
            <td height="38" bgcolor="#0000E0" class="willor">&nbsp;</td>
          </tr>
          <tr>
            <td width="73%" height="44" bgcolor="#0000E0" class="willor"><strong> <strong>TOTAL </strong>REQUEST</strong></td>
          </tr>
        </tbody>
      </table></td>
      <td width="33%" bgcolor="#0100F3"><table width="100%" border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td width="30%" rowspan="2" class="summery">
            <?php
                                $query = "select count(*) as totalamount from users where status='0'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $totalamount = $row['totalamount'];
                           ?>
                            <?php echo number_format($totalamount); ?>
            
            
            </td>
            <td class="willor">&nbsp;</td>
          </tr>
          <tr>
            <td width="70%" class="willor"><strong>PENDING ACCOUNTS</strong></td>
          </tr>
        </tbody>
      </table></td>
    </tr>
    <tr>
      <td colspan="3" ><p class="topbar">RECENT TRANSACTIONS
        </p>
        <table width="100%" cellpadding="5" cellspacing="5" class="table table-padded">
                      <thead>
                        <tr>
                          <th width="246" bgcolor="#EBEBEB"><span class="topbar">
                          Status
                        </span></th>
                          <th width="123" bgcolor="#EBEBEB"><span class="topbar">
                          Date Initiated
                        </span></th>
                          <th width="120" bgcolor="#EBEBEB"><span class="topbar">
                          Completion Date
                        </span></th>
                          <th width="53" bgcolor="#EBEBEB" class="text-center"><span class="topbar">
                          Type
                        </span></th>
                          <th width="83" bgcolor="#EBEBEB" class="text-right"><span class="topbar">
                          Amount
                        </span></th>
                          <th width="75" bgcolor="#FFCE00" class="text-center"><span class="topbar">
                          Update
                        </span></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $query = "select * from transfers where ttype='debit' AND finishdate='' order by id desc limit 10";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                        <tr>
                          <td bgcolor="#BFBFBF" class="nowrap">
                            <span class="topbar">
                            <?php if(empty($row['finishdate'])){ ?>
                            Not Started
                            <?php }elseif(date('Y-m-d')<$row['finishdate']){ ?>
                            In Progress
                            <?php }elseif(date('Y-m-d')>=$row['finishdate']){ ?>
                            Completed
                            <?php } ?>
                            </span></td>
                          <td bgcolor="#BFBFBF">
                            <span class="topbar"><?php echo $row['date']; ?>
                            </span></td>
                            <td bgcolor="#BFBFBF">
                              <span class="topbar">
                              <?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?>
                              </span></td>
                          <td bgcolor="#BFBFBF" class="text-center">
                            <span class="topbar"><?php echo ucwords($row['ttype']); ?>
                            </span></td>
                          <td bgcolor="#BFBFBF" class="text-right bolder nowrap">
                            
                            <span class="topbar"><?php echo number_format($row['amount']); ?> USD
                            </span></td>
                          <td bgcolor="#FFCE00" class="text-center">&nbsp;
                              </td>
                        </tr>
                        <?php }} ?>
                        
                      </tbody>
            </table>
        
        </p></td>
    </tr>
</div>

</div>
</div><?php include 'includes/footer.php';?>
</body>
</html>
