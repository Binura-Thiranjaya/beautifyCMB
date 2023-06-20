<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>
  <?php
  $viewAll = false;
  if((isset($_GET['viewAll'])) AND (get('viewAll') == "true")){
    $viewAll = true;
  }
  ?>

  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>
    <!-- Main Start -->
    <main class="main">
      <!-- Breadcrumb Start -->
      <div class="breadcrumb-wrap">
        <div class="banner">
          <img class="bg-img bg-top" src="../assets/images/inner-page/banner-p.jpg" alt="banner" />

          <div class="container-lg">
            <div class="breadcrumb-box">
              <div class="heading-box">
                <h1>User Dashboard</h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>

                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>

                <li class="current"><a href="my-dashboard.php">My Dashboard</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Dashboard Start -->
      <section class="user-dashboard">
        <div class="container-lg">
          <div class="row g-3 g-xl-4 tab-wrap">
            <?php include 'includes/dashboard-nav.php';?>

            <div class="col-lg-8 col-xl-9">
              <div class="right-content tab-content" id="myTabContent">
                <!-- My Dashboard Start -->
                <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                  <div class="profile">
                    
                  <?php if(getMyOrders() == "N/A") { ?>
                    <div class="title-box5">
                    <h5 class="sub-title"><span class="line"></span> NO ORDERS</h5>
                    <h2 class="main-title">There are no orders from you.</h2>
                    <div>
                    <a class="btn btn-solid round-corner line-none btn-solid2 btn-outline" href="shop.php">Shop Now</a>
                    </div>
                  </div>
                  <?php } else { ?>
                    <div class="title-box3">
                      <h3>My <?php if(!$viewAll) { ?>Latest 10<?php } ?> Orders</h3>
                    </div>

                    <?php if(!$viewAll) { ?>
                      <a href="my-orders.php?viewAll=true" class="btn-solid checkout-btn btn-outline w-100 justify-content-center checkout-btn"> View All Orders</a>
                    <?php } ?>

                    <table class="table">
                      <thead>
                        
                        <tr>
                          <th class="d-sm-table-cell">Order ID</th>
                          <th class="d-sm-table-cell">Status</th>
                          <th class="d-sm-table-cell">Payment Status</th>
                          <th class="d-sm-table-cell">Ordered On</th>
                          <th class="d-sm-table-cell">Total</th>
                          <th class="d-sm-table-cell">Action</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                      <?php 
                      if(!$viewAll) {
                        $orders = getMyLatest10Orders();
                      } else {
                        $orders = getMyOrders();
                      }


                        foreach($orders as $order) { 
                          $orderID = $order['order_id'];
                        ?>
                        <tr>
                          <td><?=$order['order_id'];?></td>
                          <td><?=getOrderStatusOrder($orderID);?></td>
                          <td><?=getPaymentStatusOrder($orderID);?></td>
                          <td><?=$order['order_on'];?></td>
                          <td>Rs.<?=$order['order_totalAmount'];?>.00</td>
                          <td><a href="my-orderView.php?order=<?=$orderID;?>" class="btn-solid checkout-btn btn-outline w-100 justify-content-center checkout-btn"> View </a></td>
                        </tr>
                        <?php } ?>
                      
                      </tbody>
                    </table>
                    <?php } ?>
                  </div>
                </div>
                
                <!-- My Dashboard End --> 

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Dashboard End -->
    </main>
    <!-- Main End -->

    </main>
    <!-- Main End -->

    <?php include __DIR__.'/includes/footer.php';?>
    <?php include __DIR__.'/includes/js.php';?>

  </body>
  <!-- Body End -->

</html>
