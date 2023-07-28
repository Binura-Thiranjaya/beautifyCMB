<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>

  <?php
  if(isset($_GET['order'])){
    $order = get('order');
  } else {
    redirect('my-orders.php?code=32');
  }

  if(!orderExist($order)){
    redirect('my-orders.php?code=32');
  }

  if(!isOrderBelongsToUser($order)){
    redirect('my-orders.php?code=33');
  }

  //Declaring Variables
  $orderDate = getOrderData($order, "order_on");
  $order_by = getOrderData($order, "order_by");
  $order_address = getOrderData($order, "order_to");
  $order_addressZipCode = getOrderData($order, "order_toZipCode");
  $orderID = getOrderData($order, "order_id");
  $orderTotal = getOrderData($order, "order_totalAmount");
  $total_cost = getOrderData($order, "order_subTotal");
  $order_note = getOrderData($order, "order_note");
  if(($order_note == "none") or (empty($order_note))){
    $order_note = 0;
  } 
  $paymentCard = "";

  //Order Area
  $orderStatus = getOrderStatusOrder($order);
  if($orderStatus == "Pending"){
    $orderStatusBG = "info";
  } else if($orderStatus == "Verified"){
    $orderStatusBG = "dark";
  } else if($orderStatus == "Proccessing"){
    $orderStatusBG = "warning";
  } else if($orderStatus == "Dispatched"){
    $orderStatusBG = "primary";
  } else if($orderStatus == "Delivered"){
    $orderStatusBG = "success";
  } else {
    $orderStatusBG = "info";
  }
  $orderStatus = strtoupper($orderStatus);
  
  //Payment Are
  $paymentStatus = getPaymentStatusOrder($order);
  if($paymentStatus == "Pending"){
    $paymentStatusBG = "info";
  } else if($paymentStatus == "Verified"){
    $paymentStatusBG = "success";
  } else if($paymentStatus == "Canceled"){
    $paymentStatusBG = "danger";
  } else if($paymentStatus == "Failed"){
    $paymentStatusBG = "danger";
  } else if($paymentStatus == "Charged Back"){
    $paymentStatusBG = "danger";
  } else {
    $paymentStatusBG = "info";
  }
  $paymentStatus = strtoupper($paymentStatus);

  //PaymentCard
  if(getOrderData($order, "order_payment_card") != "none"){
    $paymentCard = "ENDS : " . getOrderData($order, "order_payment_card");
  }

  //Get Products
  $order_products = getOrderData($order, "order_products");
  $order_products = json_decode($order_products, true);


  //Shipping
  $shipping = 350;
  if(getOrderData($order, "order_deliveryFree") != 0){
    $shipping = 0;
  }

  $discount = 0;
  $discountAmount = 0;
  if(getOrderData($order, "order_isCoupon") != 0){
    $discount = getOrderData($order, "order_isCoupon");
    if(getCouponData($discount, "coupon_type") == "percentage"){
      $discountAmount = $total_cost / 100 * getCouponData($discount, "coupon_value");
    } else if(getCouponData($discount, "coupon_type") == "credit"){
      $discountAmount = getCouponData($discount, "coupon_value");
    } 
    $discount = strtoupper($discount);
  }

  if(isset($_POST['payForOrder'])){

  
    $user_mobile = getUserData('user_Mobile');
    $user_email = getUserData('user_Email');
    $user_firstName = getUserData('user_FirstName');
    $user_lastName = getUserData('user_LastName');
    
    payForOrder($user_mobile, $user_email, $user_firstName, $user_lastName, $order, $orderTotal, $order_address);
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
                  <!-- Main content -->
                  <div class="row">
                    <div class="col-lg-8">
                      <!-- Details -->
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="mb-3 d-flex justify-content-between">
                            <div>
                              <span class="me-3"><?=$orderDate;?></span>
                              <span class="me-3"><?=$orderID;?></span>
                              <span class="me-3"><?=$paymentCard;?></span>
                              <span class="badge rounded-pill bg-<?=$orderStatusBG;?>"><?=$orderStatus;?></span>
                            </div>
                            
                          </div>
                          <table class="table table-borderless">
                            <tbody>
                              <?php 
                              foreach($order_products as $item) { 
                              ?>
                              <tr>
                                <td>
                                  <div class="d-flex mb-2">
                                    <div class="flex-shrink-0">
                                      <img src="<?=$productImageDirectory;?><?=getProductMainImage($item['id'], "image");?>" alt="" width="35" class="img-fluid">
                                    </div>
                                    <div class="flex-lg-grow-1 ms-3">
                                      <h6 class=" mb-0"><a href="#" class="text-reset"><?=$item['name'];?></a></h6>
                                      <span class="small">Per Product: <?=$item['price'];?></span>
                                    </div>
                                  </div>
                                </td>
                                <td><?=$item['quantity'];?></td>
                                <td class="text-end">Rs.<?=number_format($item['price']*$item['quantity'], 2);?></td>
                              </tr>
                              <?php } ?>
                              
                            </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="2">Subtotal</td>
                                <td class="text-end">Rs.<?=number_format($total_cost, 2);?></td>
                              </tr>

                              <?php if(!$shipping){ ?>
                              <tr>
                                <td colspan="2">Shipping</td>
                                <td class="text-end"><font color="green">[FREE]</font></td>
                              </tr>
                              <?php } else {?>
                              <tr>
                                <td colspan="2">Shipping</td>
                                <td class="text-end"><font color="red">+ Rs.<?=$shipping;?>.00</font></td>
                              </tr>
                              <?php } ?>
                                
                              <?php if(!$discount){?>
                              <?php } else {?>
                              <tr>
                                <td colspan="2">Discount (Code: <?=$discount;?>)</td>
                                <td class="text-danger text-end"><font color="green">- Rs.<?=$discountAmount;?>.00</font></td>
                              </tr>
                              <?php } ?>

                              <tr class="fw-bold">
                                <td colspan="2">TOTAL</td>
                                <td class="text-end">Rs.<?=$orderTotal;?>.00</td>
                              </tr>
                            </tfoot>
                          </table>
                        </div>
                      </div>
                      <!-- Payment -->
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-lg-6">
                              <h3 class="h6">Payment Method</h3>
                              <p><?=$paymentCard;?> <br>
                              Total: Rs.<?=$orderTotal;?>.00 <span class="badge bg-<?=$paymentStatusBG;?> rounded-pill"><?=$paymentStatus;?></span></p>

                              <?php if($paymentStatus != "VERIFIED"){ ?>
                                <form id="paymentDoing" action="my-orderView.php?order=<?=$order;?>" method="POST">
                                  <input type="hidden" name="payForOrder" value="true">
                                </form>
                              <div class="btn-box">
                                <div>
                                  <a class="btn-style3" onClick="payForOrder();">Pay NOW</a>
                                </div>
                              </div>
                              <?php } ?>

                            </div>
                            <div class="col-lg-6">
                              <h3 class="h6">Senders address</h3>
                              <address>
                                <strong>BeautifyCMB</strong><br>
                                No 165/1, New Kandy Road<br>
                                Kadawatha, Sri Lanka<br>
                                <abbr title="Phone">P:</abbr> (071) 998 2906
                              </address>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <!-- Customer Notes -->
                      <div class="card mb-4">
                        <div class="card-body">
                          <?php 
                          if(!$order_note){ ?>
                            <h3 class="h6"><font color="red">There is Additional Note</font></h3>
                          <?php } else {?>
                            <h3 class="h6">Additional Note</h3>
                            <p><?=$order_note;?></p>
                          <?php } ?>
                        </div>
                      </div>
                      <div class="card mb-4">
                        <!-- Shipping information -->
                        <div class="card-body">
                          <h3 class="h6">Address</h3>
                          <address>
                            <strong><?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?></strong><br>
                            <?=$order_address;?><br/>
                            <?=$order_addressZipCode;?><br/>
                            <abbr title="Phone">P:</abbr> <?=getUserData('user_Mobile');?>
                          </address>
                        </div>
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

    <script>
      function payForOrder(){
        let timerInterval = 2;
        Swal.fire({
          title: 'Redirecting to the payment page',
          timer: 10000,
          timerProgressBar: false,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
              b.textContent = Swal.getTimerLeft()
            }, 100)
          },
          willClose: () => {
            clearInterval(timerInterval)
          }
        }).then((result) => {
          
        })
        document.getElementById('paymentDoing').submit();
      }
    </script>

  </body>
  <!-- Body End -->

</html>
