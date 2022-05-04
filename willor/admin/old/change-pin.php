<?php
include 'auth.php';
include 'functions.php';
$pin = $userdata['pin'];
if(isset($_POST['submit']))
{
    $pin = pvalidate($_POST['pin']);

    $options = [
    'cost' => 11,
    ];

    $query = "UPDATE users SET pin='$pin' WHERE id ='$userid'";
    if(empty($pin)){
        $msg= "<div class='alert alert-danger'>
              <strong>Error!</strong> PIN is required
        </div>";
    }elseif(!is_numeric($pin)){
        $msg= "<div class='alert alert-danger'>
              <strong>Error!</strong> PIN must contains ONLY Numbers
        </div>";
        $pin = $userdata['pin'];
    }else{
        if(mysqli_query($conn, $query)){
            $msg= "<div class='alert alert-success'>
                  <strong>Success!</strong> PIN Updated!!
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Change PIN</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='changepin'; include 'includes/sidebar.php'; ?>
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
              <span>Change PIN</span>
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
                  Change PIN
                </h5>
                <div class="element-inner-desc">
                 We recommend to change your PIN every 45 days to stay secure.
                </div>
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Change PIN*</label>
                  <input required class="form-control" id="pin" type="password" value="<?php echo $pin; ?>" name="pin">
                  
                </div>
                 <div class="form-check">
                    <label class="form-check-label"><input onclick="myFunction()" class="form-check-input" type="checkbox">Show PIN</label>
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
    <script>
    function myFunction() {
          var x = document.getElementById("pin");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }  
    </script>
  </body>
</html>
