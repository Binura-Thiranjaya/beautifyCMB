<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>



  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>
    <?php 
    if(isset($_POST['checkout'])){
      $address = post('address');
      $zipCode = post('zipCode');

      if(!empty($_POST['deliveryNote'])){
        $deliveryNote = post('deliveryNote');
      } else {
        $deliveryNote = "none";
      }

      if((empty($address)) || (empty($zipCode))){
        redirect('checkout-address.php?code=18');
        exit;
      }
      $orderID = uniqid('ORDER', false);
      $order_by = getUserData('user_uniqueID');
      $order_status = "0";
      $order_paymentStatus = "0";

      if(isset($_SESSION['coupon'])) {
        $couponCode = $_SESSION['coupon'];
        if((isCouponApplicableStatus($couponCode) == "expired") or (isCouponApplicableStatus($couponCode) == "noattempts") or (isCouponApplicableStatus($couponCode) == "invalid")){
          $order_isCoupon = "0";
        } else {
          $order_isCoupon = $couponCode;
        }
      } else {
        $order_isCoupon = "0";
      }
      
      $order_note = $deliveryNote;
      $order_to = $address;
      $order_toZipCode = $zipCode;
      $products_array = $_SESSION['cart'];
      $products = json_encode($products_array);
      $order_products = $products;

      $mail_to = getUserData('user_Email');
      $mail_toName = getUserData('user_FirstName') . " " . getUserData('user_LastName');
      $mail_subject = "Order Placed [$orderID]";

      $discount = 0;
      if(isset($_SESSION['coupon'])) {

        $couponCode = $_SESSION['coupon'];

        if(getCouponData($couponCode, "isTemp") == "1"){
          $currentAttempts = getCouponData($couponCode, "attempts");
          $newAttempts = $currentAttempts - 1;
          $sqlToCouponUpdate = "UPDATE `coupons` SET `attempts` = '$newAttempts' WHERE `coupons`.`coupon_code` = '$couponCode' ";
          $resultOfCouponUpdate = mysqli_query(db(), $sqlToCouponUpdate);
        }
        
        if(getCouponData($couponCode, "coupon_type") == "percentage"){
          $discount = $total_cost / 100 * getCouponData($couponCode, "coupon_value");
        } else if(getCouponData($couponCode, "coupon_type") == "credit"){
          $discount = getCouponData($couponCode, "coupon_value");
        } 

        $total_cost = $total_cost - $discount;
      } 

      if($total_cost >= 3000){
        $deliveryFree = 1;
      } else {
        $deliveryFree = 0;
        $total_cost = $total_cost + 350;
      }
      
      $order_subTotal = $sub_total;
      $order_discount = $discount;
      $order_deliveryFree = $deliveryFree;
      $order_totalAmount = $total_cost;

      foreach($_SESSION['cart'] as $item) { 
        $q_productID = $item['id'];
        $q_productQuantity = $item['quantity'];
        updateQuantity($q_productID, $q_productQuantity);
      }

      //Write a code to prevent adding coupon for unmatching product categories
      if(placeOrder($orderID, $order_by, $order_status, $order_paymentStatus, $order_isCoupon, $order_note, $order_to, $order_toZipCode, $order_products, $order_subTotal, $order_discount, $order_deliveryFree, $order_totalAmount)){
        // sendCustomerOrderMail($mail_to, $mail_toName, $mail_subject, $orderID);
        // sendAdminOrderMail($mail_subject, $orderID);
        unset($_SESSION['cart']);
        unset($_SESSION['coupon']);
        redirect('checkout-address.php?code=30');
      } else {
        redirect('checkout-address.php?code=29');
      }
    }

    ?>

    <!-- Main Start -->
    <main class="main">
      <!-- Breadcrumb Start -->
      <div class="breadcrumb-wrap">
        <div class="banner">
          <img class="bg-img bg-top" src="assets/images/inner-page/banner-p.jpg" alt="banner" />

          <div class="container-lg">
            <div class="breadcrumb-box">
              <div class="heading-box">
                <h1>Cart</h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li class="current"><a href="cart.php">Cart</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->

      <?php if(!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) { ?>
      <section>
        <div class="container-lg">
          <div class="title-box7">
            <div>
              <h2 class="heading">MY <span>CART </span></h2>
              <svg>
                <use xlink:href="https://themes.pixelstrap.com/oslo/assets/svg/sprite.svg#shape2"></use>
              </svg>
              <p>There is no products on your cart.</p>
            </div>
            <div class="row g-3 mt-2">
              <div class="col-6 col-md-12">
                <a href="shop.php" class="btn-solid checkout-btn btn-outline w-100 justify-content-center checkout-btn"> Continue Shopping </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php } else {?>

        <section class="checkout">
        <div class="container-lg">
          <div class="row g-4 g-md-3 g-xxl-5 cart">
            <div class="col-md-7 col-lg-8 col-xl-9">
              <div class="title-box2">
                <h2 class="heading-2">Checkouting</h2>
                <a class="btn-outline btn-sm btn" href="my-address.php">Change Address from Dashboard</a>
              </div>
              <!-- Payment Section Start -->
              <div class="payment-section">
                <div class="accordion" id="accordionExample">
                  <!-- Accordion Start -->
                  <form id="checkoutForm" action="checkout-address.php" name="checkout" method="POST">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                      <a class="accordion-button font-md title-color"> Delivery Details </a>
                    </h2>
                    <div class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row g-3 filter-row">

                            <div class="col-sm-12 col-md-12 col-lg-12">
                              <div class="input-box">
                                <label for="address">Address *</label>
                                <input class="form-control" id="address" name="address" type="text" value="<?=getUserData('user_Address');?>" required>
                              </div>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12">
                              <div class="input-box">
                                <label for="zipCode">Zip Code *</label>
                                <input class="form-control" id="zipCode" name="zipCode" type="text" value="<?=getUserData('user_ZipCode');?>" required>
                              </div>
                            </div>

                          
                        </div>
                      </div>
                    </div>

                    <h2 class="accordion-header" id="headingOne">
                      <a class="accordion-button font-md title-color"> Optional Details </a>
                    </h2>
                    <div class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                        <div class="row g-3 filter-row">
                          <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="input-box">
                              <label for="deliveryNote">Delivery Note </label>
                              <textarea class="form-control" id="deliveryNote" name="deliveryNote" type="text"></textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="checkout" value="true">
                  </form>

                  <!-- Accordion End -->

                 
                </div>
              </div>
              <!-- Payment Section End -->
            </div>

            <?php include 'includes/cart-summery.php'; ?>

          </div>
        </div>
      </section>
      <!-- Cart Section End -->
      <?php } ?>
    </main>
    <!-- Main End -->

    <?php include __DIR__.'/includes/footer.php';?>
    <?php include __DIR__.'/includes/js.php';?>
    <script>
      var submit = 0;

      function checkoutForm() {
        console.log("Function Initialized");

        if (submit == 0) {
          console.log("Function Started");
          submit = 1;
          // Disable the button to prevent multiple submissions
          var checkoutBtn = document.querySelector('.checkout-btn');
          checkoutBtn.disabled = true;

          // Submit the checkout form
          document.getElementById('checkoutForm').submit();
        }
      }
    </script>
  </body>
  <!-- Body End -->

</html>


