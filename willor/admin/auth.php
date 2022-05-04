<?php
ob_start();
$status = session_status();

if($status == PHP_SESSION_NONE){
    session_start();
}

else if($status == PHP_SESSION_DISABLED){
    //Sessions are not available
}

else if($status == PHP_SESSION_ACTIVE){
    //Destroy current and start new one
    session_destroy();
    session_start();
}

if(!isset($_SESSION['admin']))
{
    header('Location: login.php');
    exit();
}

else {
    include "../db.php";
    $admin = $_SESSION['admin'];
    /*$query = "SELECT * FROM admin where id = '$userid'";
    $run = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($run)> 0){
        $row = mysqli_fetch_array($run);
        $userdata = $row;
    }*/
}

?>