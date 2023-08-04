<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
<!-- Head Start -->

<?php include __DIR__ . '/includes/head.php'; ?>

<!-- Body Start -->


<body class="theme-color3">
  <?php include __DIR__ . '/includes/header.php'; ?>


  <!-- Main Start -->
  <main class="main">
    <!-- Home Banner Section Start -->
    <section class="home-slider3 ratio_40 p-0 ">
      <div class="banner">
        <div>
          <img class="bg-img bg-top img-fluid" src="assets/images/home/hero.jpg" alt="banner-bg" />
        </div>
      </div>
    </section>
    <!-- Home Banner Section End -->



    <!-- Top Categories Section Start -->
    <section class="pb-0 catagories-style-3 after-img-wrap">
      <!-- After images -->


      <div class="container-lg">

        <div class="row g-2 g-lg-3 g-xl-4 ratio2_2 center">

          <div class="col-12 col-sm-6 col-lg-4 " data-wow-delay="0.4s">
            <div class="sub-banner-3">
              <div class="img-wrap">
                <img class="bg-img" src="assets/images/home/bg-men.jpg" alt="sub-banner" />
                <div class="content-box align-right">
                  <!-- <h3>SECRET SEIN</h3>
                    <a href="shop.php?cat=secretsein" class="btn-style3 btn-sm">SHOP NOW </a> -->
                  <h3>Gents</h3>
                  <a href="shop.php?cat=GENTS" class="btn-style3 btn-sm">SHOP NOW </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-12 col-lg-4 " data-wow-delay="0.8s">
            <div class="sub-banner-3 landscape-ratio">
              <div class="img-wrap">
                <img class="bg-img" src="assets/images/home/bg-ladies.jpg" alt="sub-banner" />
                <div class="content-box align-right">
                  <!-- <h3>Pet Ceylone</h3>
                    <h4>Save Up to 10 % off</h4>
                    <a href="shop.php?cat=petceylon" class="btn-style3 btn-sm">SHOP NOW </a> -->
                  <h3>Ladies</h3>
                  <a href="shop.php?cat=LADIES" class="btn-style3 btn-sm">SHOP NOW </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </section>
    <!-- Top Categories Section End -->


    <!-- New arrival -->
    <div class="container p-5 mt-5 new-arrival">
      <h2 class="text-center">New Arrivals</h2>
      <div class="swiper">
        <div class="swiper-wrapper">
          <?php
          $latestProducts = getLatestProducts(5);



          ?>
          <?php while ($product = mysqli_fetch_assoc($latestProducts)) {

            $productUniqueID = $product['product_uniqueID'];
            $openLink = "view-product.php?product=$productUniqueID";

          ?>
            <div class="swiper-slide swiper-slide--one col-6 col-md-3 col-sm-3 col-lg-3">
              <div class="card">
                <div class="img-box">
                  <a href="<?= $openLink; ?>"><img src="<?= $productImageDirectory; ?><?= getProductMainImage($product['product_uniqueID'], "image"); ?>" alt="Product Image" /></a>
                </div>
                <div class="card-info-wrapper p-2">
                  <div class="text-center primary-gray p-2">
                    <h4><?php echo getProductData($product['product_uniqueID'], 'product_name'); ?></h4>
                    <h3><?php echo getProductData($product['product_uniqueID'], 'product_price'); ?> LKR</h3>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
    <!-- New arrival -->




    <!-- Mens Section -->
    <?php
$maxProducts = getMaxLatestProductMens(8);
?>
    <div class="container p-3 mt-5 mens-section text-center ">
      <h3>Gents Collection</h3>
      <p>Move with Luxury</p>
      <div class="row p-2">


      <?php while ($product = mysqli_fetch_assoc($maxProducts)) { ?>
        <div class="p-2 card-wrapper col-12 col-md-3 col-sm-3 col-lg-3">
          <div class="card ">
            <div class="img-box">
              <img src="<?= $productImageDirectory; ?><?= getProductMainImage($product['product_uniqueID'], "image"); ?>" alt="Product Image" />
            </div>
            <div class="card-info-wrapper p-2">
              <div class="text-center primary-gray p-2">
                <h4><?php echo getProductData($product['product_uniqueID'], 'product_name'); ?></h4>
                <h3><?php echo getProductData($product['product_uniqueID'], 'product_price'); ?> LKR</h3>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>


      </div>
    </div>
    <!-- Mens Section -->


        <!-- Ladies Section -->
        <?php
$maxProducts = getMaxLatestProductLadies(8);
?>
    <div class="container p-3 mt-5 ladies-section text-center ">
      <h3>Ladies Collection</h3>
      <p>Move with Luxury</p>
      <div class="row p-2">


      <?php while ($product = mysqli_fetch_assoc($maxProducts)) { ?>
        <div class="p-2 card-wrapper col-12 col-md-3 col-sm-3 col-lg-3">
          <div class="card ">
            <div class="img-box">
              <img src="<?= $productImageDirectory; ?><?= getProductMainImage($product['product_uniqueID'], "image"); ?>" alt="Product Image" />
            </div>
            <div class="card-info-wrapper p-2">
              <div class="text-center primary-gray p-2">
                <h4><?php echo getProductData($product['product_uniqueID'], 'product_name'); ?></h4>
                <h3><?php echo getProductData($product['product_uniqueID'], 'product_price'); ?> LKR</h3>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>


      </div>
    </div>
    <!-- Ladies Section -->






    <!-- Offer Section Start -->
    <section class="offer-section pb-0 wow fadeInUp" data-wow-delay="0.4s">
      <div class="bg-image">
        <img class="bg-img" src="assets/images/home/footerbg-01.jpg" alt="banner" />
        <div class="container mx-auto text-center offer-2">


          <div class="row center">


            <div class="col-6 col-sm-3">
              <div class="offer">
                <h5 class="offer-heading color-gold">
                  GET 10% OFF
                  <span class="bg-theme-gold"></span>
                </h5>
                <p class="color-white"> Polo Products</p>
                <p class="color-white"> (Through Website)*</p>
              </div>
            </div>

            <div class="col-6 col-sm-3">
              <div class="offer">
                <h5 class="offer-heading color-gold">
                  GET 15% OFF
                  <span class="bg-theme-gold"></span>
                </h5>
                <p class="color-white">ON PURCHASING BUNDLE
                <p>
                <p class="color-white">Victoria's Secret
                <p>
              </div>
            </div>

            <div class="col-6 col-sm-3">
              <div class="offer">
                <h5 class="offer-heading color-gold">
                  GET 15% OFF
                  <span class="bg-theme-gold"></span>
                </h5>
                <p class="color-white">ON PURCHASING BUNDLE
                <p>
                <p class="color-white">Hugo Boss Products</p>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- Offer Section End -->



    <!-- Sub Banner Section Start -->
    <section class="pb-0 sub-banner-4 wow fadeInUp" data-wow-delay="0.4s">
      <div class="bg-wrap">
        <img class="bg-img" src="assets/images/home/offerbanner.jpg" alt="subbanner" />

        <div class="container-lg">
          <div class="text-box">

            <div class="organic-box">
              <h2 class="text-white">
                Beautify<br />
                COLOMBO
              </h2>
              <span>Our Categories </span>
            </div>

            <p class="text-white">Our perfumes are meticulously crafted by master perfumers who pour their heart and soul into each creation.</p>
            <!-- <a href="shop-left-sidebar.html" class="btn-style3 btn-sm">SHOP NOW </a> -->
          </div>
        </div>
      </div>
    </section>
    <!-- Sub Banner Section End -->


  </main>
  <!--Chatbot-->

  <!-- Main End -->

  <?php include __DIR__ . '/includes/footer.php'; ?>
  <?php include __DIR__ . '/includes/js.php'; ?>
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
  <script>
    var swiper = new Swiper(".swiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 0,
        stretch: 0,
        depth: 100,
        modifier: 2,
        slideShadows: true
      },
      spaceBetween: 60,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true
      }
    });
  </script>


</body>
<!-- Body End -->

</html>