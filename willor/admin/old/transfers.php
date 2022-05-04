<?php
include 'auth.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Transfers</title>
    <?php include 'includes/head.php'; ?>
  </head>
  <body class="menu-position-side menu-side-left full-screen with-content-panel">
    <div class="all-wrapper with-side-panel solid-bg-all">
        <?php include 'includes/nav.php'; ?>
      <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <?php $page='transfers'; include 'includes/sidebar.php'; ?>
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
              <span>Transfers</span>
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
                  Transfers
                </h5>
                
              </div>
            </div>
          </div>
          
          <div class="element-wrapper">
                <h6 class="element-header">
                  Transactions
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
                            Date
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
                          <th class="">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                       <?php
                        $query = "select * from transfers order by id desc";                 
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
                          <td class="cell-with-media">
                            <?php 
                                if(empty($row['finishdate'])){
                                    echo 'Not Specified';
                                }else{
                                    echo $row['finishdate'];
                                }
                           
                            ?>
                          </td>
                          <td class="text-center">
                            <span><?php echo $row['ttype']; ?></span>
                          </td>
                          <td class="text-right bolder nowrap">
                            <span class=""><?php echo number_format($row['amount']); ?> USD</span>
                          </td>
                          <td class="">
                              <a href="view-transfer?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm"><i class="os-icon os-icon-ui-37"></i></a>
                              <?php if($row['ttype']!='credit'){ ?>
                                  <?php if(empty($row['finishdate']) || date('Y-m-d')<$row['finishdate']){ ?>
                                  <a href="transfer?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm"><i class="os-icon os-icon-ui-49"></i></a>
                                  <?php } ?>
                              <?php } ?>
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
