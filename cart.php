<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <?php

  if(isset($_POST['clearCart'])){
    // unset the cart session
    unset($_SESSION['cart']);
    // redirect the user back to the cart page
    header('location: cart.php?code=3');
  } 

  function deleteProductFromCart($del_id)
  {
      if(isset($_SESSION["cart"])) {
          foreach($_SESSION["cart"] as $key => $value) {
              if($value["id"] == $del_id) {
                  unset($_SESSION["cart"][$key]);
                  return true;
              }
          }
      }
      return false;
  }

  if(isset($_GET['action'])){

    if(get('action') == "deleteFromCart"){
      $product_id = get('product');
      if(deleteProductFromCart($product_id)) {
        // product deleted successfully
        redirect("cart.php?code=4");
      } else {
        // product not found in cart
        redirect("cart.php?code=69");
      }
    }

  }

  if(isset($_POST['updateQuantity'])){
    // get the product id and new quantity from the form
    $product_id = post('product_id');
    $new_qty = post('quantity');

    if(empty($new_qty)){
      redirect("cart.php?code=7");
    }

    
    // loop through the cart items
    for ($i=0; $i < count($_SESSION['cart']); $i++) { 
        // check if the current cart item matches the product id
        if ($_SESSION['cart'][$i]['id'] == $product_id) {
            // update the quantity
            $stocks = getProductData($product_id, "product_stock");
            if($new_qty <= $stocks) {
                $_SESSION['cart'][$i]['quantity'] = $new_qty;
                redirect("cart.php?code=6");
            }else{
                redirect("cart.php?code=7");
            }
            break;
        }
    }
  }

  if(isset($_POST['applyCoupon'])){
    $couponCode = post('couponCode');

    if(isCouponApplicableStatus($couponCode) == "expired"){
      redirect('cart.php?code=23');
    } else if(isCouponApplicableStatus($couponCode) == "noattempts"){
      redirect('cart.php?code=23');
    } else if(isCouponApplicableStatus($couponCode) == "invalid"){
      redirect('cart.php?code=24');
    } 

    if(isCouponApplicableStatus($couponCode) == "applicable"){
      if(!isset($_SESSION['coupon'])) {
        $_SESSION['coupon'] = $couponCode;
        redirect('cart.php?code=25');
      } else {
        redirect('cart.php?code=26');
      }
    }

  }

  if(isset($_POST['removeCoupon'])){
    
    if(isset($_SESSION['coupon'])){
      unset($_SESSION['coupon']);
      redirect('cart.php?code=27');
    } else {
      redirect('cart.php?code=28');
    }

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

      <!-- Cart Section Start -->
      <section class="section-b-space card-page">
        <div class="container-lg">
          <div class="row g-3 g-md-4 cart">
            <div class="col-md-7 col-lg-8">
              <div class="cart-wrap">
                <div class="items-list">
                  <table class="table cart-table m-md-0">
                    <thead>
                      <tr>
                        <th class="d-sm-table-cell">PRODUCT</th>
                        <th class="d-sm-table-cell">PRICE</th>
                        <th class="d-lg-table-cell">QUANTITY</th>
                        <th class="d-none d-xl-table-cell">TOTAL</th>
                        <th class="d-xl-table-cell">REMOVE</th>
                        <th class="d-xl-table-cell">UPDATE</th>
                      </tr>
                    </thead>

                    <tbody>
                    <?php
                    if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                        foreach($_SESSION['cart'] as $item) { ?>
                      <form action="cart.php" method="POST">
                        <tr>
                          <td>
                            <a href="view-product.php?product=<?=$item['id'];?>">
                              <div class="product-detail">
                                <img class="pr-img" src="<?=$productImageDirectory;?><?=getProductMainImage($item['id'], "image");?>" alt="image" />
                                  <h4 class="title-color font-default2"><?=$item['name'];?></h4>
                              </div>
                            </a>  
                          </td>
                          <input type="hidden" name="product_id" value="<?=$item['id'];?>">
                          <td class="price d-sm-table-cell">Rs.<?=number_format($item['price'], 2);?></td>
                          <td class=" d-lg-table-cell">
                            <div class="plus-minus">
                              <i class="sub" data-feather="minus"></i>
                              <input type="number" name="quantity" value="<?=$item['quantity'];?>" min="1" max="<?=getProductData($item['id'], "product_stock");?>" />
                              <i class="add" data-feather="plus"></i>
                            </div>
                          </td>
                          <td class="total d-xl-table-cell">Rs.<?=number_format($item['price']*$item['quantity'], 2);?></td>
                          <td><a class="btn-solid btn-sm addtocart-btn" href="cart.php?action=deleteFromCart&product=<?=$item['id'];?>">Remove</a></td>
                          <td><input type="submit" class="btn-solid btn-sm addtocart-btn" name="updateQuantity" value="Update"></td>
                        </form>
                      </tr>
                      <?php }
                      } else {
                          echo "<tr><td colspan='5'>Your cart is empty.</td></tr>";
                      }
                      ?>

                      
                    </tbody>
                  </table>
                  <div class="col-6 col-md-12">
                    <form action="cart.php" method="POST">
                      <input type="submit" class="btn-outline w-100 justify-content-center checkout-btn" name="clearCart" value="Clear Cart"> 
                    </form>
                  </div>
                </div>
              </div>
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

  </body>
  <!-- Body End -->

</html>


