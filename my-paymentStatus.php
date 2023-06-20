<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>
  <?php 

  if((!isset($_GET['order_id'])) and (!isset($_GET['cancel']))){
    redirect('my-orders.php');
  } else {
  }

  
  if(isset($_GET['cancel'])){
    if(isset($_GET['order_id'])){
      $order_id = get('order_id');
      $paymentStatus = getPaymentStatusOrder($order_id);
    } else {
      $paymentStatus = "Canceled";
    }
  } else {
    $order_id = get('order_id');
    $paymentStatus = getPaymentStatusOrder($order_id);
  }

  ?>
  <style>
    body {
      background-color: #fff;
    }
    .container {
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
    }
    .status-logo {
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 30px;
    }
    .status {
      width: 100px;
      height: 100px;
      background-size: contain;
    }
    h1 {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 30px;
      color: #28a745;
      text-align: center;
    }
    p {
      font-size: 24px;
      margin-bottom: 30px;
      color: #333;
      text-align: center;
    }
    .animation {
      animation: slidein 2s;
    }
    .btn {
      background-color: #28a745;
      color: #fff;
      font-size: 24px;
      padding: 10px 40px;
      border-radius: 50px;
      border: none;
      margin-top: 30px;
      animation: fadein 2s;
    }
    @keyframes slidein {
      from {
        transform: translateY(-50%);
        opacity: 0;
      }
      to {
        transform: translateY(0%);
        opacity: 1;
      }
    }
    .btn-container {
      display: flex;
      justify-content: center;
    }
  </style>

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

                <li class="current"><a href="my-payments.php">Payment Status</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Dashboard Start -->
      <section class="user-dashboard">
        <div class="container">
          <div class="animation">
            
            <?php if($paymentStatus == "Pending"){ ?>
              <div class="status-logo">
                <img class="status" src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678069-sign-error-256.png">
              </div>
              <h1><font color="red">Payment Pending</font></h1>
              <p><font color="red">Please do your payment to confirm the order.</font></p>
            <?php } else if($paymentStatus == "Verified"){ ?>
              <div class="status-logo">
                <img class="status" src="https://cdn3.iconfinder.com/data/icons/flat-actions-icons-9/792/Tick_Mark_Dark-512.png">
              </div>
              <h1>Payment Success</h1>
              <p>Thank you for your payment. Your transaction has been completed successfully.</p>
            <?php } else if($paymentStatus == "Canceled"){ ?>
              <div class="status-logo">
                <img class="status" src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678069-sign-error-256.png">
              </div>
              <h1><font color="red">Payment Cancelled</font></h1>
              <p><font color="red">Payment Cancelled by user.</font></p>
            <?php } else if($paymentStatus == "Failed"){ ?>
              <div class="status-logo">
                <img class="status" src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678069-sign-error-256.png">
              </div>
              <h1><font color="red">Payment Failed</font></h1>
            <?php } else if($paymentStatus == "Charged Back"){ ?>
              <div class="status-logo">
                <img class="status" src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678069-sign-error-256.png">
              </div>
              <h1><font color="red">Payment Charged Back</font></h1>
            <?php } else { ?>
              <div class="status-logo">
                <img class="status" src="https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678069-sign-error-256.png">
              </div>
              <h1><font color="red">Payment Error Occured</font></h1>
            <?php } ?>
            
            <div class="btn-container">
            <?php if($paymentStatus != "Verified"){ ?>
              <a class="btn" href="my-orders.php" style="background-color: red;">View My Orders</a>
            <?php } else { ?>
              <a class="btn" href="my-orderView.php?order=<?=$order_id;?>">View My Order</a>
            <?php } ?>
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
