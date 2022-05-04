<?php
include 'auth.php';
include 'functions.php';
if(isset($_POST['submit'])){
    $comment = pvalidate($_POST['receiverbank']);
    $reason = pvalidate($_POST['receiveraccount']);
    $subject = pvalidate($_POST['amount']);
   
    if(!empty($comment) or !empty($reason) or !empty($subject)){
        include('mails/contact.php');
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: <ctrlplusv@ctrlplusv.com>' . "\r\n";
        if(mail($to,$subject,$message,$headers)){
            $msg = "<div class='alert alert-success'>
            Message Sent Successfuly!! We will be in touch with you shortly.
            </div>";
        }
    }
    
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Contact Us</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='contactus'; include 'includes/sidebar.php'; ?>
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
              <span>Contact Us</span>
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
                  Contact Manager
                </h5>
                <div class="element-inner-desc">
                 If you have any query, complain or suggestion then feel free to contact us. Our Support staff will respond you as soon as possible.
                </div>
              </div>
            </div>
          </div>
          
          

          <fieldset class="form-group">
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for=""> Subject*</label>
                  <input required class="form-control" type="text" value="" name="subject">
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Reason</label>
                  <input  required  class="form-control" type="text" value="" name="reason">
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="">Comment</label>
                  <textarea required name="comment" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
              </div>
            </div>
            <div class="form-buttons-w">
            <button class="btn btn-primary" type="submit" name="submit"> Submit</button>
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
