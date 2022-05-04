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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

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

      <table width="100%" border="0" cellspacing="10" cellpadding="10">
  <tbody>
    <tr>
      <td width="8%" height="59" align="center" class="welcome"><img src="../images/user-icon.png" width="33" height="30" alt=""/></td>
      <td width="92%" class="admin-welcome"><span class="welcome">Transfer Transactions</span><br>
        <img src="../images/line-yellow.png" width="408" height="4" alt=""/></td>
    </tr>
    <tr>
      <td colspan="2">
     <table width="100%" cellpadding="10" cellspacing="10" class="table table-padded">
       <thead>
         <tr>
           <th width="13%" height="48" bgcolor="#F4F4F4" class="normal"> Status </th>
           <th width="26%" bgcolor="#FEF1CA" class="normal"> Date </th>
           <th width="13%" bgcolor="#E7E7FF" class="normal"> Completion Date </th>
           <th width="16%" bgcolor="#FEF1CA" class="normal"> Type </th>
           <th width="21%" bgcolor="#E7E7FF" class="normal"> Amount </th>
           <th width="11%" bgcolor="#0000B3" class=""><span class="news"> Actions </span></th>
         </tr>
       </thead>
       <tbody>
         <?php
                        $query = "select * from transfers order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
         <tr>
           <td bgcolor="#F4F4F4" class="nowrap"><span class="normal">
             <?php if(empty($row['finishdate'])){ ?>
             </span><span class="formtext">Not Started</span><span class="normal">
<?php }elseif(date('Y-m-d')<$row['finishdate']){ ?>
             </span><span class="warning">In Progress</span><span class="normal">
<?php }elseif(date('Y-m-d')>=$row['finishdate']){ ?>
             </span>             <span class="register">Completed</span><span class="normal">
<?php } ?>
             </span></td>
           <td bgcolor="#FEF1CA"><span class="normal"><?php echo $row['date']; ?></span></td>
           <td bgcolor="#E7E7FF" class="cell-with-media"><span class="normal">
             <?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?>
           </span></td>
           <td bgcolor="#FEF1CA" class="text-center"><span class="normal"><?php echo $row['ttype']; ?></span></td>
           <td bgcolor="#E7E7FF" class="text-right bolder nowrap"><span class="normal"><?php echo number_format($row['amount']); ?> USD</span></td>
           <td bgcolor="#0000B3" class="">
           
           <a href="view-transfer.php?id=<?php echo $row['id'];  ?> class="fas fa-folder-open " > <span class="news" >view</span> <i class="fas fa-folder-open "></i></a>
                              <?php if($row['ttype']!='credit'){ ?>
                                  <?php if(empty($row['finishdate']) || date('Y-m-d')<$row['finishdate']){ ?>
                                  <a href="transfer.php?id=<?php echo $row['id']; ?>" class="news" ><span>| edit</span> <i  class="fas fa-layer-group"></i></a>
                                  <?php } ?>
                              <?php } ?>
          
           
           </td>
         </tr>
         <?php }} ?>
       </tbody>
     </table></td>
    </tr>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center" class="normal">&nbsp;</td>
    </tr>
  </tbody>
</table>  </div>
<?php include 'includes/footer.php';?>
</body>
</html>
