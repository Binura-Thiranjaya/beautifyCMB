<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <?php
  if(isset($_GET['cat'])){
    $page_category = get('cat');

    if(isCategoryAvailable($page_category)){
      $loader = getCatData($page_category, "cat_name");
    } else {
      redirect("shop-categories.php?code=1");
    }
    
  } else {
    redirect("shop-categories.php");
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
                <h1>Shop</h1>
              </div>
              <ol class="breadcrumb">
                <li><a href="index.php">Home</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li><a href="shop-categories.php">Categories</a></li>
                <li>
                  <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                </li>
                <li class="current"><a href="shop.php?cat=<?=$page_category;?>"><?=getCatData($page_category, "cat_name");?> Products</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <!-- Breadcrumb End -->

      <?php if($page_category == "petceylon"){ ?>
        <section class="home-slider3 ratio_40 p-0">
        <div class="banner">
          <div>
            <img class="bg-img bg-top img-fluid" src="assets/images/bg/banner_1.jpg" alt="banner-bg" />


            <!-- Shape Object -->
            <img src="assets/png/Leaf1.png" class="shape-o-1" alt="leaf" />
            <img src="assets/png/tomato1.png" class="shape-o-2" alt="Tomato" />
            <img src="assets/png/Leaf1.png" class="shape-o-3" alt="leaf" />
            <img src="assets/png/tomato.png" class="shape-o-4" alt="leaf" />
            <img src="assets/png/tomato.png" class="shape-o-5" alt="leaf" />
          </div>
        </div>
      </section>
      <?php } ?>

      <!-- Shop Section Start -->
      <section class="shop-page">
        <div class="container-lg">
          
          <div class="row gy-4 g-lg-3 g-xxl-4">
            

            <div class="col-lg-12 col-xl-12">
              <div class="row gy-5 g-lg-3 g-xxl-4">
                <?php
                if($page_category == "petceylon"){
                ?>
                <!-- <div class="col-12 order-2 order-lg-1">
                  <div class="round-wrap-content p-0 overflow-hidden">
                    <div class="sub-banner">
                      <img class="bg-img img-fluid" src="assets/images/inner-page/banner2.jpg" alt="banner" />
                      <div class="heading-box">
                        <div class="title-box4">
                          <h2 class="heading">10% offer to Pet Ceylon Products<span class="bg-theme-blue"></span></h2>
                        </div>
                        <h4>ONLINE OFFER</h4>
                        <p>If you are purchasing any Pet Ceylon product through our website you will be get 10% discount</p>
                        <a href="shop-left-sidebar.html" class="btn-solid btn-sm mb-line">Shop Now <i class="arrow"></i> </a>
                      </div>
                    </div>
                  </div>
                </div> -->
                <?php } ?>

                <div class="col-12 order-1 order-lg-2">
                  <div class="shop-product">
                    <div class="product-tab-content">
                      <div class="view-option row g-3 g-xl-4 ratio_asos row-cols-2 row-cols-sm-3 row-cols-xl-4 grid-section">

                      <?php
                      $products = getProducts($page_category);

                      if($products == "N/A"){
                      ?>  
                      <center>
                        <h3>There is no products found :(</h3>
                      <center>
                      <?php
                      }
                      else {
                      foreach($products as $product){
                        $productUniqueID = $product['product_uniqueID'];
                        $openLink = "view-product.php?product=$productUniqueID";
                      ?>
                      <!-- Product Start -->
                        <div>
                          <div class="product-card">
                            <div class="img-box">
                              <!-- Thumbnail -->
                              <ul class="thumbnail-img">
                                <li class="active thumb"><img src="<?=$productImageDirectory;?><?=getProductMainImage($product['product_uniqueID'], "image");?>" alt="Product Image" /></li>
                                <?php
                                  $productImages = getProductImages($product['product_uniqueID']); 
                                  foreach($productImages as $image){
                                ?>
                                    <li class="thumb"><img src="<?=$productImageDirectory;?><?=$image['image'];?>" alt="Product Image" /></li>
                                <?php } ?>
                              </ul>

                              <a href="<?=$openLink;?>" class="primary-img"><img class="img-fluid bg-img" src="<?=$productImageDirectory;?><?=getProductMainImage($product['product_uniqueID'], "image");?>" alt="Product Image" /> </a>

                            </div>

                            <!-- Content Box -->
                            <div class="content-box">
                              <a href="<?=$openLink;?>">
                                <?php if($product['product_stock'] <= 5){ ?>
                                  <p><font color="red">Available Stocks : <?=$product['product_stock'];?></font></p>
                                <?php } else { ?>
                                  <p>Available Stocks : <?=$product['product_stock'];?></p>
                                <?php } ?>
                                <h5><?=$product['product_name'];?></h5>
                                <span>Rs<?=$product['product_price'];?>.00</span> 
                                <?=displayDiscount($productUniqueID);?>
                              </a>
                              <br/>
                              <a href="<?=$openLink;?>" class="btn-solid btn-sm mb-line">View <i class="arrow"></i> </a>
                            </div>
                          </div>
                        </div>
                      <!-- Product End -->
                      <?php } ?>
                      <?php } ?>

                      </div>
                    </div>
                  </div>

                  <!-- Pagination Start 
                  <div class="pagination-wrap justify-content-center">
                    <ul class="pagination">
                      <li>
                        <a href="javascript:void(0)" class="prev"> &laquo;</a>
                      </li>
                      <li><a href="javascript:void(0)">1</a></li>
                      <li><a href="javascript:void(0)" class="active">2</a></li>
                      <li><a href="javascript:void(0)">3</a></li>

                      <li><a href="javascript:void(0)" class="next"> &raquo;</a></li>
                    </ul>
                  </div>
                  Pagination End -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Shop Section End -->
    </main>
    <!-- Main End -->

    <?php include __DIR__.'/includes/footer.php';?>
    <?php include __DIR__.'/includes/js.php';?>

  </body>
  <!-- Body End -->

</html>
