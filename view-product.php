<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <?php 
  if(isset($_GET['product'])){
    $page_product = get('product');

    if(!isProductExist($page_product)){ 
      redirect('shop-category.php?code=2');
    }

  } else {
    redirect('shop-category.php?code=2');
  }
  // Check if the cart session variable is set, if not create an empty array
  if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
  }

  // Add a product to the cart
  if (isset($_POST['add_product'])) {

    

    if(!isLoggedIn()){
      redirect('login.php?code=16');
      die();
    }

    $product_id = post('product_id');
    if(getProductData($page_product, "product_stock") <= "0"){
      redirect('view-product.php?product='.$product_id.'&code=31');
    }
    if(!isProductExist($product_id)){ 
      redirect('view-product.php?code=69');
    }

    $product_name = getProductData($product_id, "product_name");
    $product_price = getProductData($product_id, "product_price");
    $quantity = post('quantity');

    $product_in_cart = false;

    for ($i = 0; $i < count($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i]['id'] == $product_id) {
            // Update the quantity
            $_SESSION['cart'][$i]['quantity'] += $quantity;
            $product_in_cart = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$product_in_cart) {
        // Create an array for the product
        $product = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $quantity
        );

        // Add the product to the cart session variable
        array_push($_SESSION['cart'], $product);
    }
    if($product_in_cart){
      redirect("view-product.php?product=$product_id&code=6");
    }else{
      redirect("view-product.php?product=$product_id&code=5");
    }

  }

  $modelComments = new comments;

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
                <h1><?=getProductData($page_product, "product_name");?></h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li><a href="shop.php">Products</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li><a href="shop.php?cat=<?=getProductData($page_product, "product_category");?>"><?=getCatData(getProductData($page_product, "product_category"), "cat_name");?></a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li class="current"><a href="view-product.php?product=<?=$page_product;?>"><?=getProductData($page_product, "product_name");?></a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->

      <!-- Product Section Start -->
      <section class="product-page">
        <div class="container-lg">
          <div class="row g-3 g-xl-4 view-product">
            <div class="col-md-7">
              <div class="slider-box sticky off-50 position-sticky">
                <div class="row g-2">
                  <div class="col-2">
                    <div class="thumbnail-box">
                      <div class="swiper thumbnail-img-box thumbnailSlider2">
                        <div class="swiper-wrapper">

                        <?php
                        $productImages = getProductAllImages($page_product);

                        foreach($productImages as $image){
                        ?>
                          <div class="swiper-slide">
                            <img src="<?=$productImageDirectory;?><?=$image['image'];?>" alt="Product Image" />
                          </div>
                        <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-10 ratio_square">
                    <div class="swiper mainslider2">
                      <div class="swiper-wrapper">

                      <?php
                        $productImages = getProductAllImages($page_product);

                        foreach($productImages as $image){
                        ?>
                          <div class="swiper-slide">
                            <img class="bg-img" src="<?=$productImageDirectory;?><?=$image['image'];?>" alt="Product Image" />
                          </div>
                        <?php } ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="product-detail-box">
                <div class="product-option">
                  <h2><?=getProductData($page_product, "product_name");?></h2>

                  <div class="option price"><span> Rs.<?=getProductData($page_product, "product_price");?>.00 </span> 
                  <?=displayDiscount($page_product);?>
                </div>

                  <form method="post" action="view-product.php?product=<?=$page_product;?>">

                  <div class="option-side">
                    <div class="option">
                          <?php if(getProductData($page_product, "product_stock") <= 5){ ?>
                              <h4 class="heading"><font color="red">Available Stocks : Only <?=getProductData($page_product, "product_stock");?> !</font></span></h4>
                          <?php } else { ?>
                              <h4 class="heading">Available Stocks : <?=getProductData($page_product, "product_stock");?></span></h4>
                          <?php } ?>
                    </div>
                  </div>

                  <div class="option-side">
                    <div class="option">
                      <div class="title-box4">
                        <h4 class="heading">Quantity: <span class="bg-theme-blue"></span></h4>
                      </div>
                      <div class="plus-minus">
                        <i class="sub" data-feather="minus"></i>
                        <input type="number" name="quantity" value="1" min="1" max="<?=getProductData($page_product, "product_stock");?>" />
                        <i class="add" data-feather="plus"></i>
                      </div>
                    </div>
                    
                  </div>

                  <input type="hidden" name="product_id" value="<?=$page_product;?>">


                  <div class="btn-group">
                    <input type="submit" class="btn-solid btn-sm addtocart-btn" name="add_product" value="Add to cart">
                  </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabs Start -->
          <div class="description-box">
            <div class="row gy-4">
              <div class="col-12">
                <!-- Tabs Filter Start -->
                <ul class="nav nav-pills nav-tabs2 row-tab" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="pill" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">
                      Description
                    </button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="seller-tab" data-bs-toggle="pill" data-bs-target="#seller" type="button" role="tab" aria-controls="seller" aria-selected="false">Seller</button>
                  </li>

                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="review-tab" data-bs-toggle="pill" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">
                      Review <span><?=$modelComments->count($page_product);?></span>
                    </button>
                  </li>
                </ul>
                <!-- Tabs Filter End -->
              </div>

              <div class="col-12">
                <!-- Tab Content Start -->
                <div class="tab-content" id="pills-tabContent">
                  <!-- Description Tab Content Start -->
                  <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                    <div class="details-product">
                      <p>
                        <?=getProductData($page_product, "product_description");?>
                      </p>
                    </div>
                  </div>
                  <!-- Description Tab Content End -->

                  <!-- Seller Tab Content Start -->
                  <div class="tab-pane fade" id="seller" role="tabpanel" aria-labelledby="seller-tab">
                    <div class="seller-info">
                      <div class="seller-details">
                        <div class="seller-logo-wrap">
                          <div class="img-box">
                            <img src="../assets/icons/png/seller.png" alt="seller" />
                          </div>
                          <div class="seller-content">
                            <h5>Supreme Seller</h5>
                            <div class="rating-box">
                              <ul class="rating p-0 mb">
                                <li>
                                  <i class="fill" data-feather="star"></i>
                                </li>
                                <li>
                                  <i class="fill" data-feather="star"></i>
                                </li>
                                <li>
                                  <i class="fill" data-feather="star"></i>
                                </li>
                                <li>
                                  <i class="fill" data-feather="star"></i>
                                </li>
                                <li>
                                  <i class="fill" data-feather="star"></i>
                                </li>
                              </ul>
                              <span>(105 Rating)</span>
                            </div>
                          </div>
                        </div>

                        <ul class="review-rated">
                          <li>
                            <span>Delivery Time</span>
                            <span>100%</span>
                          </li>
                          <li>
                            <span>Response</span>
                            <span>90%</span>
                          </li>
                          <li>
                            <span>Rating</span>
                            <span>95%</span>
                          </li>
                        </ul>
                      </div>

                      <div class="addres-box">
                        <p>
                          <span class="contact"><i data-feather="map-pin"></i>Address :</span> <span class="contact-info"> 1418 Riverwood Drive, Suite 3245 Cottonwood, CA 96052, United States </span>
                        </p>
                        <p>
                          <span class="contact"><i data-feather="phone"></i>Contact Number :</span> <span class="contact-info"> 2545-3566-4525-4525 </span>
                        </p>

                        <p class="info">
                          Supreme Seller is the world famous seller for quality and service classified by and how they are connected residences and land. Connected residences owned by a single entity
                          leased out, or owned separately with an agreement covering the either a single family or multifamily structure that is available for occupation or for non-business purposes.
                          relationship between units and common areas. Different types of housing tenure can be used for the same physical type.
                        </p>
                      </div>
                    </div>
                  </div>
                  <!-- Seller Tab Content End -->

                  <!-- Review Tab Content Start -->
                  <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                    <div class="review-section">
                      <div class="row gy-4 gy-md-5 g-4 g-xxl-5">
                        <div class="col-md-8 col-xxl-7 order-2 order-md-1">
                          <div class="review-left">
                            <div class="title-box4">
                              <h4 class="heading">Customers Reviews <span class="bg-theme-blue"></span></h4>
                            </div>
                            <div class="question-wrap">
                              <?php 
                              if ($modelComments->fetch($page_product, "*") == "N/A"){
                                echo '<div class="comment-box">
                                <div class="avatar-content">
                                  <div class="name-box">
                                    <div class="user-info">
                                      <h5><i data-feather="user"></i> There is no reviews yet for this product.</h5>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                              } else {
                              $comments = $modelComments->fetch($page_product, "*");

                              foreach($comments as $comment){ 
                              ?>
                              <div class="comment-box">
                                <div class="avatar-content">
                                  <div class="name-box">
                                    <div class="user-info">
                                      <h5><i data-feather="user"></i> Jacquelyn R. Planet</h5>
                                      <span> <i data-feather="clock"></i> August 20, 2022</span>
                                    </div>
                                  </div>
                                  <p>Capsule wardrobe double breasted jacket chic lightweight contemporary luxury cotton-and-linen blend tucks at the back.</p>
                                </div>
                              </div>
                              <?php } ?>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <?php if(isLoggedIn()){ ?>
                        <div class="col-md-4 col-xxl-5 order-1 order-md-2">
                          <div class="replay-form round-wrap-content top-space" id="replaySection">
                            <div class="title-box4">
                              <h4 class="heading">Leave a Comment<span class="bg-theme-blue"></span></h4>
                            </div>

                            <form action="view-product.php?product=<?=$page_product;?>" class="custom-form form-pill">
                              <div class="row g-3 g-sm-4">
                                <div class="col-sm-6">
                                  <div class="input-box">
                                    <label for="name">Full Name</label>
                                    <input name="name" id="name" type="text" class="form-control" value="<?=getUserData("user_FirstName");?> <?=getUserData("user_LastName");?>" class="form-control" readonly disabled/>
                                  </div>
                                </div>

                                <div class="col-sm-6">
                                  <div class="input-box">
                                    <label for="email">Email Address</label>
                                    <input name="email" id="email" type="email" value="<?=getUserData("user_Email");?>" class="form-control" readonly disabled/>
                                  </div>
                                </div>

                                <div class="col-12">
                                  <div class="input-box">
                                    <label for="comment">Comments</label>
                                    <textarea class="form-control" id="comment" cols="30" rows="5" required></textarea>
                                  </div>
                                </div>

                                <div class="col-12 text-end">
                                  <button class="post-button btn btn-solid btn-sm mb-line">Post Comment <i class="arrow"></i></button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                        <?php } else { ?>
                        <div class="col-md-4 col-xxl-5 order-1 order-md-2">
                          <div class="replay-form round-wrap-content top-space" id="replaySection">
                            <div class="title-box4">
                              <h4 class="heading"><a href="login.php">Login to add a review<span class="bg-theme-blue"></span></a></h4>
                            </div>

                            
                          </div>
                        </div>
                        <?php } ?>

                      </div>
                    </div>
                  </div>
                  <!-- Review Tab Content End -->
                </div>
                <!-- Tab Content End -->
              </div>
            </div>
          </div>
          <!-- Tabs End -->
        </div>
      </section>
      <!-- Product Section End -->

      
    </main>
    <!-- Main End -->

    <?php include __DIR__.'/includes/footer.php';?>
    <?php include __DIR__.'/includes/js.php';?>

  </body>
  <!-- Body End -->

</html>
