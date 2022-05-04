<?php
include 'auth.php';
include '../functions.php';
if(isset($_POST['submit']))
	{
        $currentpassword = pvalidate($_POST['currentpassword']);
        $newpassword = pvalidate($_POST['password']);
        $cpassword = pvalidate($_POST['cpassword']);
        
        $options = [
        'cost' => 11,
        ];
        
        $hashed = password_hash($newpassword, PASSWORD_BCRYPT, $options);
        $query = "SELECT password FROM admin where id = '$userid'";
                 
        $run = mysqli_query($conn, $query);
        
        if($newpassword!=$cpassword){
            $msg = "<div class='alert alert-danger'>
                          <strong>Error!</strong> Passwords Doesn't Match!!
                    </div>";
        }
       elseif(mysqli_num_rows($run)> 0)
         {
           $row = mysqli_fetch_array($run);
           $password = $row['password'];
            if(!password_verify($currentpassword, $password)){
                $msg = "<div class='alert alert-danger'>
                          <strong>Error!</strong> Wrong Current Password!!
                    </div>";
            
            }
           
           elseif(strlen($password)<6){
                $msg= "<div class='alert alert-danger'>
                          <strong>Error!</strong> Password must be atleast 6 characters!!
                    </div>";
           }
           
           else{
                    
                $query1 = "UPDATE admin SET password='$hashed' WHERE id ='$userid'";
                if(mysqli_query($conn, $query1)){
                    $msg= "<div class='alert alert-success'>
                          <strong>Success!</strong> Password Updated!!
                    </div>";
                }else{
                    echo "Opps There is some error";
                }
            }

        
        
        

        }




    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Change Password</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='changepassword'; include 'includes/sidebar.php'; ?>
        <div class="content-w">
          <!--------------------
          START - Top Bar
          -------------------->
         
          <!--------------------
          END - Top Bar
          --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
          <ul class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="index">Dashboard</a>
            </li>
            
            <li class="breadcrumb-item">
              <span>Change Password</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
          <div class="content-i">
    <div class="content-box">
    <div class="row">

  <div class="col-sm-8">
    <?php echo isset($msg)?$msg:''; ?>
    <div class="element-wrapper">
      <div class="element-box">
        <form id="formValidate" method="post">
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-wallet-loaded"></div>
              </div>
              <div class="element-info-text">
                <h5 class="element-inner-header">
                  Change Password
                </h5>
                <div class="element-inner-desc">
                 We recommend to change your Password every 45 days to stay secure.
                </div>
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Current Password*</label>
                  <input required class="form-control" type="password" value="" name="currentpassword">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">New Password*</label>
                  <input  required  class="form-control" type="password" value="" name="password">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Confirm New Password*</label>
                  <input  required  class="form-control" type="password" value="" name="cpassword">
                </div>
              </div>
            </div>
            <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit" name="submit"> Update</button>
          </div>
            
            
          </fieldset>
          
          
        </form>
      </div>
    </div>
  </div>
</div>
           
            </div>
      
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>
