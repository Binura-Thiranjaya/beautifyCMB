  <?php 
  include 'database.php';
  
  //UserLogin Prevention
  $scripts = array(
    'cart.php',
    'checkout-address.php',
    'my-address.php',
    'my-dashboard.php',
    'my-orders.php',
    'my-passwordChange.php',
    'my-profile.php',
    'my-profile.php',
  );

  $current_script = getCurrentScript();

  // Check if the current script matches any of the values in the array
  if (in_array($current_script, $scripts)) {
      if(!isLoggedIn()){
        redirect('login.php?code=16');
        exit;
      }
  }
  
  ?>

<?php
        // To Get the Current Filename.
    $currentPage= $_SERVER['SCRIPT_NAME'];
    
    // To Get the directory name in 
    // which file is stored.
    $currentPage = substr($currentPage, 1);
    $desc_of_web = "The official online store of BeautifyCMB.";
    // To Show the Current Filename on Page.
    if($currentPage == "index.php"){
      $title = "Home | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "cart.php"){
      $title = "Cart | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "checkout-address.php"){
      $title = "Checkout | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "login.php"){
      $title = "Login | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-address.php"){
      $title = "My Address | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-dashboard.php"){
      $title = "Dashboard | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-orders.php"){
      $title = "My Orders | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-orderView.php"){
      $title = "Order | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-passowordChange.php"){
      $title = "Change Password | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-payments.php"){
      $title = "Payments | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-paymentStatus.php"){
      $title = "Payment Status | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-paymentUpdate.php"){
      $title = "Payment Update | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "my-profile.php"){
      $title = "Profile | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "register.php"){
      $title = "Register | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "shop.php"){
      $title = "Shop | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "shop-cateogries.php"){
      $title = "Categories | BeautifyCMB | Official Web Store"; 
    } else if($currentPage == "view-product.php"){
      $title = "View Product | BeautifyCMB | Official Web Store"; 
    } 
    
    else {
        $title = "BeautifyCMB | Official Web Store";
        
    }
     ?>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta name="description" content="oslo" />
    <meta name="keywords" content="oslo" />
    <meta name="author" content="oslo" />
    <link rel="icon" href="assets/images/logos/logo.png" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/images/logos/logo.png" type="image/x-icon" />
    <link rel="manifest" href="manifest.json" />
    <link rel="icon" href="assets/images/logos/logo.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/logos/logo.png" />
    <meta name="theme-color" content="#0f8fac" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="apple-mobile-web-app-title" content="Oslo" />
    <meta name="msapplication-TileImage" content="assets/images/logos/logo.png" />
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?=$title;?></title>

    <!-- Google Jost Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet" />

    <!-- Google Monsterrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet" />

    <!-- Google Leckerli Font -->
    <link href="https://fonts.googleapis.com/css2?family=Leckerli+One&amp;display=swap" rel="stylesheet" />

    <!-- Bootstrap Css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css" />

    <!-- Swiper Slider Css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/swiper-bundle.min.css" />

    <!-- Wow Animation css -->
    <link rel="stylesheet" href="assets/css/vendors/wow-animate.css" />

    <!-- Style Css -->
    <link id="change-link" rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4@3" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-7Vz5aztWr19b1S8kS9I7/0o+VP/4c4yLQ+4oNa/sNl4N4zHHZ8r2e9T0U6hk+O6TjOahp0yMKftzLsCteBl6OQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />


  </head>
  <!-- Head End -->