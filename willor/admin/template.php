<?php
ob_start();
session_start();
require_once '../db.php';
if(isset($_SESSION['user']))
{
    header("location: customer.php");
}


if(isset($_POST['submit'])){
    $_accountno = mysqli_real_escape_string($conn, strip_tags($_POST['accountno'])) ;
    $_password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    
    $query = "SELECT * from users WHERE accountno = '$_accountno'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        $db_accountno = $row['accountno'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        $role = $row['role'];
        $status = $row['status'];
        
       if($status==0){
            $error = '<div class="alert alert-warning" role="alert">
            <strong>Error!</strong> Please wait until your account is activated by the Admin.
            </div>';
       }elseif($_accountno == $db_accountno && password_verify($_password, $db_password)){
            $_SESSION['user'] = $db_id;
            $_SESSION['role'] = $role;
    		ob_start();
            session_start();
            header('location:customer.php');
        }else {
            $error = '<div class="alert alert-danger" role="alert">
            <strong class="register">Error!</strong> <span class="warning">Wrong Account Number or Password.</span>
            </div>';
        }
    }
 else {
        $error = '<div class="alert alert-danger" role="alert">
        <strong class="register">Error!</strong> <span class="warning">Wrong Account Number or Password.</span>
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
<!--- sidemenu ended -->
<div class="login" id="admin-mainbody">
hello
</div>

</div>
</body>
</html>
