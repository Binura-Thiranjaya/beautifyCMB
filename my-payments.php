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
                    <h5 class="sub-title"><span class="line"></span> NO PAYMENTS</h5>
                    <h2 class="main-title">There are no payments from you.</h2>
                    <div>
                    <a class="btn btn-solid round-corner line-none btn-solid2 btn-outline" href="shop.php">Shop Now</a>
                    </div>
                  </div>
                  <?php } else { ?>
                    <div class="title-box3">
                      <h3>My <?php if(!$viewAll) { ?>Latest 10<?php } ?> Payments</h3>
                    </div>

                    <?php if(!$viewAll) { ?>
                      <a href="my-payments.php?viewAll=true" class="btn-solid checkout-btn btn-outline w-100 justify-content-center checkout-btn"> View All Payments</a>
                    <?php } ?>

                    <table class="table">
                      <thead>
                        
                        <tr>
                          <th class="d-sm-table-cell">Order ID</th>
                          <th class="d-sm-table-cell">Status</th>
                          <th class="d-sm-table-cell">Amount</th>
                          <th class="d-sm-table-cell">Card Holder</th>
                          <th class="d-sm-table-cell">Card</th>
                          <th class="d-sm-table-cell">Expiry</th>
                        </tr>
                        
                      </thead>
                      <tbody>
                      <?php 
                      if(!$viewAll) {
                        $payments = getMyLatest10Payments();
                      } else {
                        $payments = getMyPayments();
                      }


                        foreach($payments as $payment) { 
                        ?>
                        <tr>
                          <td><?=$payment['order_id'];?></td>
                          <td><?=textPaymentStatus($payment['status_code']);?></td>
                          <td><?=$payment['payhere_currency'];?>.<?=$payment['payhere_amount'];?></td>
                          <td><?=$payment['card_holder_name'];?></td>
                          <td><?=$payment['card_no'];?></td>
                          <td><?=$payment['card_expiry'];?></td>
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
