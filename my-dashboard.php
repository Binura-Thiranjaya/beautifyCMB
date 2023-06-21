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
                  <div class="dashboard-tab">
                    <div class="title-box3">
                      <h3>Welcome Back <?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?>,</h3>
                      <p>
                        Welcome back <?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?>, here you can customize your profile and also track your order also, you can access your delivery address. if you want change setting you can
                        do it from here
                      </p>
                    </div>

                    <div class="row g-0 option-wrap">
                      <div class="col-sm-6 col-xl-4">
                        <a href="my-orders.php" data-class="orders" class="tab-box">
                          <img src="https://www.svgrepo.com/show/383784/online-delivery.svg" alt="shopping bag" />
                          <h5>Orders</h5>
                          <p>See order history of previous orders</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="cart.php" data-class="wishlist" class="tab-box">
                          <img src="https://www.svgrepo.com/show/506106/cart-4.svg" alt="wishlist" />
                          <h5>Cart</h5>
                          <p>Checkout your cart before the stock ends.</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="my-address.php" data-class="savedAddress" class="tab-box">
                          <img src="https://www.svgrepo.com/show/501804/address-book.svg" alt="address" />
                          <h5>Delivery Address</h5>
                          <p>Always check your address before put an order</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="my-payments.php" data-class="payment" class="tab-box">
                          <img src="https://www.svgrepo.com/show/392675/check-payments-currency-finance-money-payment.svg" alt="payment" />
                          <h5>Payment</h5>
                          <p>Check your payments, if you have unpaid invoices you can pay it from here</p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="my-profile.php" data-class="profile" class="tab-box">
                          <img src="https://www.svgrepo.com/show/497407/profile-circle.svg" alt="profile" />
                          <h5>Profile</h5>
                          <p>Profile of <?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?></p>
                        </a>
                      </div>
                      <div class="col-sm-6 col-xl-4">
                        <a href="my-passwordChange.php" data-class="security" class="tab-box">
                          <img src="https://www.svgrepo.com/show/497496/security-safe.svg" alt="security" />
                          <h5>Security</h5>
                          <p>Please don't share any one your email or password, If it leaked change it asap</p>
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
