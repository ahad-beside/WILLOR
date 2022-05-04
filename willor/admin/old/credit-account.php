<?php
include 'auth.php';
include '../functions.php';
if(isset($_POST['submit'])){
    $senderaccount = pvalidate($_POST['senderaccount']);
    $senderbank = pvalidate($_POST['senderbank']);
    $amount = pvalidate($_POST['amount']);
    $purpose = pvalidate($_POST['purpose']);
    $date = date('Y-m-d');
    $userid = validate($_POST['userid']);
    $query = "INSERT INTO transfers (id, userid, amount, receiverbank, receiveraccount, date, finishdate, type, status, ttype, purpose) VALUES (NULL, '$userid', '$amount', '$senderbank', '$senderaccount' , '$date', '$date', '', '1', 'credit', '$purpose')";
    if(mysqli_query($conn, $query)){
        $query = "update users set balance= balance+'$amount' where id='$userid'";
        mysqli_query($conn, $query);
        $msg = '<div class="alert alert-success">
          <strong>Success!</strong> Amount Credited to User Account.
        </div>';
    }
    }
    
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Credit Account</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='creditaccount'; include 'includes/sidebar.php'; ?>
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
              <span>Credit Account</span>
            </li>
          </ul>
          <!--------------------
          END - Breadcrumbs
          -------------------->
          
          <div class="content-i">
    <div class="content-box">
    <div class="row">

  <div class="col-sm-12">
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
                  Credit Account
                </h5>
                <div class="element-inner-desc">
                  Add Balance to the Existing Will Or Trust Accounts
                </div>
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for=""> User Account*</label>
                  <select required name="userid" class="form-control" id="">
                      <option value="">Select</option>
                      <?php
                        $query = "select * from users order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                       <option value="<?php echo $row['id'] ?>"><?php echo $row['firstname'].' '.$row['lastname'].' - Account No. '.$row['accountno']; ?></option>
                       <?php }} ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Sender Account No*</label>
                  <input required class="form-control" type="text" value="" name="senderaccount">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Sender Bank*</label>
                  <input required class="form-control" type="text" value="" name="senderbank">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Amount ($)</label>
                  <input  required  class="form-control" type="number" value="" name="amount">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="">Purpose</label>
                  <input  class="form-control" type="text" value="" name="purpose">
                </div>
              </div>
            </div>
            
            <div class="form-buttons-w">
            <button class="btn btn-primary" name="submit"> Submit</button>
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
