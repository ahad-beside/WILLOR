<?php
ob_start();
session_start();
require_once 'db.php';
include 'functions.php';
if(isset($_SESSION['user'])){
    header("location: index");
}

if(isset($_POST['submit']))
{
    $firstname = pvalidate($_POST['firstname']);
    $lastname = pvalidate($_POST['lastname']);
    $email = pvalidate($_POST['email']);
    $role = 'user';
    $password = pvalidate($_POST['password']);
    $cpassword = pvalidate($_POST['confirmpassword']);
    $options = [ 'cost' => 11];
    $hpassword = password_hash($password, PASSWORD_BCRYPT, $options);
    $date = date("Y-m-d");
    $query_email = mysqli_query($conn,"select email from users where email = '$email'");
    if(empty($email) or empty($password) or empty($firstname)){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Please fill all required fields
            </div>";
    }elseif($password != $cpassword){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Passwords doesnt match
            </div>";
    }elseif(strlen($password)<6){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Password must be 6 characters long
            </div>";
    }elseif(mysqli_num_rows($query_email) > 0){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Email already exists!!
            </div>";
    }else{
            $query = "INSERT INTO users (id, firstname, lastname, email, password, role) VALUES (NULL, '$firstname', '$lastname', '$email', '$hpassword', '$role')";
            if(mysqli_query($conn, $query)){
                $to = $email;
                $subject = 'Welcome to Will Or Trust';
                include 'mails/welcome.php';
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: <ctrlplusv@ctrlplusv.com>' . "\r\n";
                mail($to, $subject, $message, $headers);
                $msg = "<div class='alert alert-success'>
                <strong>Success!</strong> Your account has been created. You will receive an Email after your account has been approved by Admin.
                </div>";
            }else{
            echo mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Will Or Trust - User Registration</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body>
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w wider">
        <div class="logo-w">
          <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
         Will Or Trust - User Registration
        </h4>
        <form action="" method="post">
         <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> First Name</label><input required class="form-control" placeholder="First Name" type="text" name="firstname">
                <div class="pre-icon os-icon os-icon-user"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Last Name</label><input required class="form-control" placeholder="Last Name" type="text" name="lastname">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for=""> Email address</label><input required class="form-control" placeholder="Enter email" type="email" name="email">
            <div class="pre-icon os-icon os-icon-email-2-at2"></div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> Password</label><input required class="form-control" placeholder="Password" type="password" name="password">
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="">Confirm Password</label><input required class="form-control" placeholder="Password" type="password" name="confirmpassword">
              </div>
            </div>
          </div>
          <?php echo isset($msg)?$msg:''; ?>
          <div class="buttons-w">
            <div class="form-group">
                <button class="btn btn-primary" name="submit">Register Now</button>
            </div>
          </div>
          <div class="buttons-w">
            Already have an account? <a href="login">Login</a> Now
          </div>
        </form>
      </div>
    </div>
  </body>
</html>