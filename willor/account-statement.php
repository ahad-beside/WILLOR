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

<table width="100%" border="0" cellspacing="5" cellpadding="5">
  <tbody>
    <tr>
      <td height="72" align="left" class="welcome">User Account Statement<br>
        <img src="images/line-yellow.png" width="408" height="4" alt=""/></td>
      </tr>
    
    <tr>
      <td height="88"><table width="100%" cellpadding="10" cellspacing="10" class="">
                      <thead>
                        <tr>
                          <th width="133" bgcolor="#E7EFFF" class="normal">
                          Status                        </th>
                          <th width="96" bgcolor="#FFEFB2" class="normal">
                          Date                        </th>
                          <th width="89" bgcolor="#E7EFFF" class="normal">
                          Completion Date                        </th>
                          <th width="89" bgcolor="#FFEFB2" class="normal">
                          Type                        </th>
                          
                          <th width="118" bgcolor="#E7EFFF" class="normal">
                          Amount                        </th>
                          <th width="77" bgcolor="#0100FF" class="text-center"><span class="news">
                            Actions
                        </span></th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $query = "select * from transfers where userid='$userid' order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                        <tr>
                          <td bgcolor="#E7EFFF" class="nowrap">
                            <span class="normal">
                            <?php if(empty($row['finishdate'])){ ?>
                            <em>Not Started</em>
<?php }elseif(date('Y-m-d')<$row['finishdate']){ ?>
                            </span><span class="warning">In Progress </span><span class="normal">
                            <?php }elseif(date('Y-m-d')>=$row['finishdate']){ ?>
                            </span><span class="register">Completed</span><span class="normal">
<?php } ?>
                            </span></td>
                          <td bgcolor="#FFEFB2">
                            <span class="normal"><?php echo $row['date']; ?>
                            </span></td>
                          <td bgcolor="#E7EFFF">
                              <span class="normal">
                              <?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?>
                              </span></td>
                          <td bgcolor="#FFEFB2" class="cell-with-media">
                            <span class="normal"><?php echo ucwords($row['ttype']); ?>
                            </span></td>
                          
                          <td bgcolor="#E7EFFF" class="text-right bolder nowrap">
                            <span class="normal">
                            <?php if($row['ttype']=='credit'){ ?>
                            + <?php echo number_format($row['amount']); ?><?php echo $userdata['accounttype']; ?>
                            <?php }else{ ?>
                            - <?php echo number_format($row['amount']); ?><?php echo $userdata['accounttype']; ?>
                            <?php } ?>
                            </span></td>
                          <td bgcolor="#0100FF" class="text-center">
                              <span class="normal"><a href="transfer-details?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Details</a>
                              </span></td>
                        </tr>
                        <?php }} ?>
                      </tbody>
          </table></td>
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
