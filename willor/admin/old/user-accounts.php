<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>User Accounts</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='useraccounts'; include 'includes/sidebar.php'; ?>
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
              <span>User Accounts</span>
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
                  Accounts
                </h5>
                
              </div>
            </div>
          </div>
          
          <div class="element-wrapper">
                <h6 class="element-header">
                  Users
                </h6>
                <div class="element-box-tp">
                  <div class="table-responsive">
                    <table class="table table-padded">
                      <thead>
                        <tr>
                          <th>
                            Status
                          </th>
                          <th>
                            Name
                          </th>
                          <th>
                            Email
                          </th>
                          <th class="text-center">
                            Account Number
                          </th>
                          <th class="text-right">
                            Balance
                          </th>
                          <th class="text-center">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $query = "select * from users order by id desc";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                        <tr>
                          <td class="nowrap">
                            <?php if($row['status']==0){ ?>
                            <span class="status-pill smaller yellow"></span><span>Pending</span>
                            <?php }else{ ?>
                            <span class="status-pill smaller green"></span><span>Active</span>
                            <?php } ?>
                          </td>
                          <td>
                            <span><?php echo $row['firstname'].' '.$row['lastname']; ?></span>
                          </td>
                          <td class="cell-with-media">
                            <?php 
                                echo $row['email']
                            ?>
                          </td>
                          <td class="text-center">
                            <span><?php echo $row['accountno']; ?></span>
                          </td>
                          <td class="text-right bolder nowrap">
                            <span class=""><?php echo number_format($row['balance']); ?> USD</span>
                          </td>
                          <td class="text-center">
                              <a href="view-user?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">view</a>
                              <a href="update-user?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">update</a>
                          </td>
                        </tr>
                        <?php }} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>         
          
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
