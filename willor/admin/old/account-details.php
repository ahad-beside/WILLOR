<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Account Details</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='accountdetails'; include 'includes/sidebar.php'; ?>
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
              <span>Account Details</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
          <div class="content-i">
    <div class="content-box">
    <div class="row">

  <div class="col-sm-12">
    <div class="element-wrapper">
      <div class="element-box">
        <form id="formValidate">
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-wallet-loaded"></div>
              </div>
              <div class="element-info-text">
                <h5 class="element-inner-header">
                  User Account Details
                </h5>
                <div class="element-inner-desc">
                  We recommend to change your password in every 45 days to be secure.
                </div>
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> First Name</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['firstname']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Last Name</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['lastname']; ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Email</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['email']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">PIN</label> (<label for=""><a id="pindisplay" onclick="myFunction()" href="#!" class="text-right">Show Pin</a>)</label> 
                  <input readonly class="form-control" id="pin" type="password" value="<?php echo $userdata['pin']; ?>">
                </div>
              </div>
            </div>
            <div class="row">
             <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Phone Number</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['phone']; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Account Number</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['accountno']; ?>">
                </div>
              </div>
              
            </div>
            <div class="row">
             <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Address</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['address']; ?>">
                </div>
              </div>
              
              
            </div>
            <div class="row">
             <div class="col-sm-4">
                <div class="form-group">
                  <label for="">City</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['city']; ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="">State</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['state']; ?>">
                </div>
              </div>
                <div class="col-sm-4">
                <div class="form-group">
                  <label for="">Zip</label>
                  <input readonly class="form-control" type="text" value="<?php echo $userdata['zip']; ?>">
                </div>
              </div>
              
              
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
    <script>
    function myFunction() {
          var x = document.getElementById("pin");
          if (x.type === "password") {
            x.type = "text";
            $("#pindisplay").text('Hide PIN');
          } else {
            x.type = "password";
            $("#pindisplay").text('Show PIN');
          }
        }  
    </script>
  </body>
</html>
