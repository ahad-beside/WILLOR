<?php 
include 'auth.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Will Or Trust Dashboard</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen">
    <div class="all-wrapper solid-bg-all">
      <!--------------------
      START - Top Bar
      -------------------->
    <?php include 'includes/nav.php'; ?>
      <!--------------------
      END - Top Bar
      -------------------->

      <div class="layout-w">
        <?php $page='index'; include 'includes/sidebar.php'; ?>
        <div class="content-w">
          <div class="content-i">
            <div class="content-box">
              <div class="element-wrapper compact pt-4">
                <div class="element-actions">
                  <a class="btn btn-primary btn-sm" href="local-transfer.php"><i class="os-icon os-icon-ui-22"></i><span>Add Account</span></a>
                </div>
                <h6 class="element-header">
                  Overview
                </h6>
                <div class="element-box-tp">
                  <div class="row">
                    <div class="col-lg-12 col-xxl-6">
                      <!--START - BALANCES-->
                      <div class="element-balances">
                        <div class="balance hidden-mobile">
                          <div class="balance-title">
                            Total Users
                          </div>
                          <div class="balance-value">
                           <?php
                                $query = "select count(*) as totalusers from users";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $totalusers = $row['totalusers'];
                           ?>
                            <span><?php echo $totalusers; ?></span>
                          </div>
                          <div class="balance-link">
                            <a class="btn btn-link btn-underlined" href="account-statement.php"><span>View Users</span><i class="os-icon os-icon-arrow-right4"></i></a>
                          </div>
                        </div>
                        <div class="balance">
                          <div class="balance-title">
                            Total Transfer Requests
                          </div>
                          <div class="balance-value success">
                           <?php
                                $query = "select count(*) as totalrequests from transfers where status='0'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $totalrequests = $row['totalrequests'];
                           ?>
                            <?php echo number_format($totalrequests); ?>
                          </div>
                          <div class="balance-link">
                            <a class="btn btn-link btn-underlined" href="account-statement.php"><span>View Requests</span><i class="os-icon os-icon-arrow-right4"></i></a>
                          </div>
                        </div>
                        <div class="balance">
                          <div class="balance-title">
                            Total Pending Accounts
                          </div>
                          <div class="balance-value success">
                           <?php
                                $query = "select count(*) as totalamount from users where status='0'";                 
                                $run = mysqli_query($conn, $query);
                                $row = mysqli_fetch_array($run);
                                $totalamount = $row['totalamount'];
                           ?>
                            <?php echo number_format($totalamount); ?>
                          </div>
                          <div class="balance-link">
                            <a class="btn btn-link btn-underlined" href="account-statement.php"><span>View Requests</span><i class="os-icon os-icon-arrow-right4"></i></a>
                          </div>
                        </div>
                        
                      </div>
                      <!--END - BALANCES-->
                    </div>
                    <div class="col-lg-5 col-xxl-6">
                      <!--START - MESSAGE ALERT-->
                      
                      <!--END - MESSAGE ALERT-->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
               
              <!--START - Transactions Table-->
              <div class="col-lg-12">
                <h6 class="element-header">
                  Recent Transaction Requests
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
                            Date Initiated
                          </th>
                          <th>
                            Completion Date
                          </th>
                          <th class="text-center">
                            Type
                          </th>
                          <th class="text-right">
                            Amount
                          </th>
                          <th class="text-center">
                            Update
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $query = "select * from transfers where ttype='debit' AND finishdate='' order by id desc limit 10";                 
                        $run = mysqli_query($conn, $query);
                        if(mysqli_num_rows($run)> 0){
                            while($row = mysqli_fetch_array($run)){
                            $id = $row['id'];
                       ?>
                        <tr>
                          <td class="nowrap">
                            <?php if(empty($row['finishdate'])){ ?>
                            <span class="status-pill smaller red"></span><span>Not Started</span>
                            <?php }elseif(date('Y-m-d')<$row['finishdate']){ ?>
                            <span class="status-pill smaller yellow"></span><span>In Progress</span>
                            <?php }elseif(date('Y-m-d')>=$row['finishdate']){ ?>
                            <span class="status-pill smaller green"></span><span>Completed</span>
                            <?php } ?>
                          </td>
                          <td>
                            <span><?php echo $row['date']; ?></span>
                          </td>
                            <td>
                              <?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?>
                          </td>
                          <td class="text-center">
                            <?php echo ucwords($row['ttype']); ?>
                          </td>
                          <td class="text-right bolder nowrap">
                            
                            <span class=""><?php echo number_format($row['amount']); ?> USD</span>
                          </td>
                          <td class="text-center">
                              <a href="transfer?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="os-icon os-icon-ui-49"></i></a>
                          </td>
                        </tr>
                        <?php }} ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--END - Transactions Table--><!--------------------
              START - Color Scheme Toggler
              -------------------->
              
              <!--------------------
              END - Chat Popup Box
              -------------------->
            </div>
          </div>
        </div>
      </div>
      <div class="display-type"></div>
    </div>
    
    <?php include 'includes/scripts.php'; ?>
  </body>
</html>
