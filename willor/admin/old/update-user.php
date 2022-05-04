<?php
include 'auth.php';
include '../functions.php';
if(isset($_GET['id'])){
    $userid = validate($_GET['id']);
    $query = "SELECT * FROM users where id = '$userid'";
    $run = mysqli_query($conn, $query);
    
    if(mysqli_num_rows($run)> 0){
        $row = mysqli_fetch_array($run);
        $status = $row['status'];
        $accountno = $row['accountno'];
    }else{
        header('location:index');
    }
}else{
    header('location:index');
}

if(isset($_POST['submit']))
{
    
    $status = pvalidate($_POST['status']);
    $accountno = pvalidate($_POST['accountno']);
    $query_email = mysqli_query($conn,"select * from users where accountno = '$accountno' AND id!='$userid'");
    
    if(empty($accountno)){
        $msg= "<div class='alert alert-danger'>
        <strong>Error!</strong> Please fill the required fields
        </div>";
    }elseif(mysqli_num_rows($query_email) > 0){
            $msg = "<div class='alert alert-danger'>
            <strong>Error!</strong> Account No. already exists!!
            </div>";
    }else{
        $query = "UPDATE users SET accountno='$accountno', status='$status' WHERE id ='$userid'";
        if(mysqli_query($conn, $query)){
            $msg= "<div class='alert alert-success'>
                  <strong>Success!</strong> User Profile Updated!!
            </div>";
        }
    }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Profile</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='userprofile'; include 'includes/sidebar.php'; ?>
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
              <span>User Profile</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
  <div class="content-i">
    <div class="content-box">
    <div class="row">

  <div class="col-sm-9">
  <?php if($status==0){ ?>
  <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                This User is not Active
            </div>
        </div>
    </div>
  <?php } ?>
   <?php echo isset($msg)?$msg:''; ?>
    <div class="element-wrapper">
      <div class="element-box">
        <form id="formValidate" method="post">
          <div class="element-info">
            <div class="element-info-with-icon">
              <div class="element-info-icon">
                <div class="os-icon os-icon-user"></div>
              </div>
              <div class="element-info-text">
                <h5 class="element-inner-header">
                  User Account
                </h5>
               
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for=""> Account Number</label>
                  <input required name="accountno" class="form-control" type="text" value="<?php echo $accountno; ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Status</label>
                  <select required name="status" id="" class="form-control">
                      <option <?php echo $status==0?'selected':''; ?> value="0">In Active</option>
                      <option <?php echo $status==1?'selected':''; ?> value="1">Active</option>
                  </select>
                </div>
              </div>
            </div>

            
              
              
        <div class="form-buttons-w">
            <button class="btn btn-primary" type="" name="submit"> Submit</button>
            <a class="btn btn-primary" href="user-accounts.php"> Go Back</a>
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
        $(".changeavatar").click(function(){
           $('#file').trigger('click'); 
        });
        
        $("#file").change(function(){
           $("#uploadForm").submit(); 
        });
    </script>
  </body>
</html>
