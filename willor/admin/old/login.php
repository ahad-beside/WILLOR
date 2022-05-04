<?php
ob_start();
session_start();
require_once '../db.php';
if(isset($_SESSION['user']))
{
    header("location: index");
}


if(isset($_POST['submit'])){
    $_email = mysqli_real_escape_string($conn, strip_tags($_POST['email'])) ;
    $_password = mysqli_real_escape_string($conn, strip_tags($_POST['password']));
    
    $query = "SELECT * from admin WHERE email = '$_email'";
    $run = mysqli_query($conn, $query);
    if(mysqli_num_rows($run)>0)
    {
        $row = mysqli_fetch_array($run);
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_id = $row['id'];
        
        if($_email == $db_email && password_verify($_password, $db_password)){
            $_SESSION['admin'] = $db_id;
    		ob_start();
            session_start();
            header('location:index');
        }else {
            $error = '<div class="alert alert-danger" role="alert">
            <strong>Error!</strong> Wrong Email or Password.
            </div>';
        }
    }
 else {
        $error = '<div class="alert alert-danger" role="alert">
        <strong>Error!</strong> Wrong Email or Password.
        </div>';
    }
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Will Or Trust - Admin Login</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="#!"><img alt="" src="../img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
          Login - Admin
        </h4>
        <form action="" method="post">
          <div class="form-group">
            <label for="">Email</label><input class="form-control" placeholder="Enter your email" type="email" name="email">
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          </div>
          <div class="form-group">
            <label for="">Password</label><input class="form-control" placeholder="Enter your password" type="password" name="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
            
          </div>
          <?php echo isset($error)?$error:''; ?>
          <div class="buttons-w">
            <div class="form-group">
                <button class="btn btn-primary" name="submit">Log me in</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </body>
</html>
