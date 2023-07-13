<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

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
                <h1>Admin Dashboard</h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>

                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>

                <li class="current"><a href="admin-dashboard.php">Admin Dashboard</a></li>
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
            <?php include 'includes/admin-dashboard-nav.php';?>

            <div class="col-lg-8 col-xl-9">
              <div class="right-content tab-content" id="myTabContent">
                <!-- My Dashboard Start -->
                <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                  <div class="dashboard-tab">
                    <div class="title-box3">
                      <!-- <h3>Welcome Back <?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?>,</h3> -->
                      <!-- <p>
                        Welcome back <?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?>, here you can customize your profile and also track your order also, you can access your delivery address. if you want change setting you can
                        do it from here
                      </p> -->
                    </div>

                    <div class="row g-0 option-wrap">
                      <div class="col-sm-6 col-xl-4">
                        <a href="add-product.php" data-class="add-product" class="tab-box">
                          <img src="https://www.svgrepo.com/show/486796/product-management.svg" alt="Product Package" />
                          <h5>Add Products</h5>
                          <p>Add new products to stock</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="manage-product.php" data-class="manage-product" class="tab-box">
                          <img src="https://www.svgrepo.com/show/486797/product-catalog.svg" alt="manage" />
                          <h5>Manage Products</h5>
                          <p>Update, Hide products from stock</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="view-stock.php" data-class="view-stock" class="tab-box">
                          <img src="https://www.svgrepo.com/show/486795/product.svg" alt="product" />
                          <h5>View Products</h5>
                          <p>Check stock availability</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="view-orders.php" data-class="view-order" class="tab-box">
                          <img src="https://www.svgrepo.com/show/458982/view-alt.svg" alt="view order" />
                          <h5>View Orders</h5>
                          <p>Track Order History</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="view-payments.php" data-class="view-payments" class="tab-box">
                          <img src="https://www.svgrepo.com/show/164255/online-pay.svg" alt="view payments" />
                          <h5>View Payments</h5>
                          <p>Track Payment History</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="feedback.php" data-class="feedback" class="tab-box">
                          <img src="https://www.svgrepo.com/show/486241/feedback-backup.svg" alt="feeback" />
                          <h5>Manage Feedback</h5>
                          <p>Show,Hide Customer Feedback</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="coupons.php" data-class="coupon" class="tab-box">
                          <img src="https://www.svgrepo.com/show/381384/coupon.svg" alt="coupon" />
                          <h5>Coupons</h5>
                          <p>Set Discounts using Coupons</p>
                        </a>
                      </div>
                      
                    </div>
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
