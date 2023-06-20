<div class="col-md-5 col-lg-4 <?php if(getCurrentScript() == "checkout-address.php"){ echo 'col-xl-3'; }?>">
              <div class="summery-wrap">

                <div class="coupon-box">
                  <form action="cart.php" method="POST">
                    <h5 class="cart-title">Coupon</h5>
                    <?php 
                    if(isset($_SESSION['coupon'])) {
                      $couponCode = $_SESSION['coupon'];
                      if((isCouponApplicableStatus($couponCode) == "expired") or (isCouponApplicableStatus($couponCode) == "noattempts")){
                        unset($_SESSION['coupon']);
                        redirect('cart.php?code=23');
                        exit;
                      }

                      if(isCouponApplicableStatus($couponCode) == "invalid"){
                        unset($_SESSION['coupon']);
                        redirect('cart.php?code=24');
                        exit;
                      }
                      echo '
                        <div class="text-wrap">
                          <p class="content-color font-md mb-0"><font color="green">Coupon Added: '.$_SESSION['coupon'].'</font></p>
                        </div> 
                        <button type="submit" name="removeCoupon" class="btn btn-outline btn-sm">Remove Coupon</button>
                      ';
                  } else {
                    echo '
                      <div class="text-wrap">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <a class="btn btn-outline-secondary"><i data-feather="tag"></i></a>
                          </div>
                          <input type="text" class="form-control" name="couponCode" placeholder="Coupon Code" aria-describedby="basic-addon1" required>
                        </div>
                      </div> 
                      <button type="submit" name="applyCoupon" class="btn btn-outline btn-sm">Apply Coupon</button>
                    ';
                  }
                  ?>
                    
                  </form>

                </div>

                <div class="cart-wrap grand-total-wrap">
                  <div>
                    <div class="order-summery-box">
                      <h5 class="cart-title">Price Details (<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?> Items)</h5>
                      <ul class="order-summery">
                        <li>
                          <span>Total Amount of Products [<?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>]</span>
                          <span><?="Rs".number_format($total_cost, 2);?></span>
                        </li>

                        <?php 
                        if(isset($_SESSION['coupon'])) {
                        $couponCode = $_SESSION['coupon'];
                        
                        $discountedText = "";
                        $discount = 0;
                        if(getCouponData($couponCode, "coupon_type") == "percentage"){
                          $discountedText = getCouponData($couponCode, "coupon_value") . "%";
                          $discount = $total_cost / 100 * getCouponData($couponCode, "coupon_value");
                        } else if(getCouponData($couponCode, "coupon_type") == "credit"){
                          $discountedText = "Rs." . getCouponData($couponCode, "coupon_value") . ".00";
                          $discount = getCouponData($couponCode, "coupon_value");
                        } else {
                          $discountedText = "N/A";
                          $discount = "0";
                        }
                        ?>
                        <li>
                          <span>Coupon Discount</span>
                          <span class="theme-color">- <?=$discountedText;?></span>
                          <?php 
                          
                          $total_cost = $total_cost - $discount; 
                          
                          ?>
                        </li>

                        <?php } ?>

                        <li>
                          <span>Sub Total</span>
                          <span><?="Rs".number_format($total_cost, 2);?></span>
                        </li>

                        <li>
                          <span>Delivery</span>
                          <?php 
                        if($total_cost >= 3000){
                          $deliveryFree = "1";
                          echo '<span><a class="theme-color">[FREE]</a></span>';
                        } else {
                          $deliveryFree = "0";
                          $total_cost = $total_cost + 350;
                          echo '<span><a class="font-danger">+ Rs.350.00</a></span>';
                        }
                        ?>
                          
                        </li>

                        <li class="pb-0">
                          <span>Total Amount</span>
                          <span><?="Rs".number_format($total_cost, 2);?></span>
                        </li>
                      </ul>
                      <div class="row g-3 mt-2">
                        <?php if(getCurrentScript() == "cart.php"){ ?>
                        <div class="col-6 col-md-12">
                          <a href="checkout-address.php" class="btn-solid checkout-btn">Checkout <i class="arrow"></i></a>
                        </div>
                        <?php } if(getCurrentScript() == "checkout-address.php"){ ?>
                        <div class="col-6 col-md-12">
                          <a class="btn-solid checkout-btn" onClick="checkoutForm()">Place Order <i class="arrow"></i></a>
                        </div>
                        <?php } ?>
                        <div class="col-6 col-md-12">
                          <a href="shop.php" class="btn-outline w-100 justify-content-center checkout-btn"> Back To Shop </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>