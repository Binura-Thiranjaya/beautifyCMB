    <!-- Cookies Section Start -->
    <!-- <div class="cookie-bar cookies-bar-1 left-cookies">
      <img src="assets/png/cookie.png" alt="cookies" />
      <div class="content">
        <h5>Cookies Consent</h5>
        <p>This website use cookies to ensure you get the best experience on our website.</p>
        <div class="cookie-buttons">
          <button class="btn-solid btn-sm mb-line cookies-accept">Accept <i class="arrow"></i></button>
          <a href="javascript:void(0)" class="btn-solid btn-sm btn-outline cookies-accept">Learn more</a>
        </div>
      </div>
    </div> -->
    <!-- Cookie Section End -->

    <!-- Tap To Top Button Start -->
    <div class="tap-to-top-box hide">
      <button class="tap-to-top-button"><i data-feather="chevrons-up"></i></button>
    </div>
    <!-- Tap To Top Button End -->

    <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Feather Icon -->
    <script src="assets/js/feather/feather.min.js"></script>

    <!-- Swiper Slider Js -->
    <script src="assets/js/swiper-slider/swiper-bundle.min.js"></script>
    <script src="assets/js/swiper-slider/swiper-custom.min.js"></script>

    <!-- Timer Js -->
    <script src="assets/js/timer.js"></script>

    <!-- Header Sticky js  -->
    <script src="assets/js/sticky-header.js"></script>

    <!-- Active Class js  -->
    <script src="assets/js/active-class.js"></script>

    <!-- Script Js -->
    <script src="assets/js/script.js"></script>

    <!-- User Dashboard Tab Js -->
    <script src="assets/js/user-dashboard-tab.js"></script>

    <!-- Theme Settings Js -->
    <!-- <script src="assets/js/theme-setting.js"></script> -->

    <!-- Wow Js -->
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/wow-custom.js"></script>

    <!-- Search Js -->
    <script src="assets/js/demo-search3.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <!-- Start of LiveChat (www.livechat.com) code -->
<script>
    window.__lc = window.__lc || {};
    window.__lc.license = 15566046;
    ;(function(n,t,c){function i(n){return e._h?e._h.apply(null,n):e._q.push(n)}var e={_q:[],_h:null,_v:"2.0",on:function(){i(["on",c.call(arguments)])},once:function(){i(["once",c.call(arguments)])},off:function(){i(["off",c.call(arguments)])},get:function(){if(!e._h)throw new Error("[LiveChatWidget] You can't use getters before load.");return i(["get",c.call(arguments)])},call:function(){i(["call",c.call(arguments)])},init:function(){var n=t.createElement("script");n.async=!0,n.type="text/javascript",n.src="https://cdn.livechatinc.com/tracking.js",t.head.appendChild(n)}};!n.__lc.asyncInit&&e.init(),n.LiveChatWidget=n.LiveChatWidget||e}(window,document,[].slice))
</script>
<!-- <noscript><a href="https://www.livechat.com/chat-with/15566046/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript> -->
<?php include __DIR__ . '/chatbot.php'; ?>

<!-- End of LiveChat code -->


    <?php
    $file = $_SERVER["SCRIPT_NAME"];
    $break = Explode('/', $file);
    $pfile = $break[count($break) - 1];



    if (isset($_GET['code'])) {echo ".";?>
      <script>
        // Get the current URL
        const currentURL = new URL(window.location.href);

        // Get the search parameters from the URL
        const searchParams = new URLSearchParams(currentURL.search);

        // Remove the 'code' parameter from the search parameters
        searchParams.delete('code');

        // Update the URL by replacing the current state with a new state that has the modified search parameters
        history.replaceState({}, '', `${currentURL.pathname}?${searchParams.toString()}`);
      </script>

    <?php if ($_GET['code'] == 1) {?>
      <script>
          Swal.fire({
            title: 'Category Not Found !',
            text: 'Please check your url again.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 2) {?>
      <script>
          Swal.fire({
            title: 'Product not found !',
            text: 'The product is deleted or not found.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 3) {?>
      <script>
          Swal.fire({
            title: 'Cart Cleared!',
            text: 'The all products on your cart is deleted..',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 4) {?>
      <script>
          Swal.fire({
            title: 'Product Removed!',
            text: 'Product from your cart.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 5) {?>
      <script>
          Swal.fire({
            title: 'Product Added!',
            text: 'Product added to your cart.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 6) {?>
      <script>
          Swal.fire({
            title: 'Product Updated!',
            text: 'Quantity of product was updated in your cart.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 7) {?>
      <script>
          Swal.fire({
            title: 'Product Update Failed!',
            text: 'Quantity of product was exceeded.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 8) {?>
      <script>
          Swal.fire({
            title: 'Already Existing User',
            text: 'There is an user already registered using this email.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 9) {?>
      <script>
          Swal.fire({
            title: 'Already Existing User',
            text: 'There is an user already registered using this mobile number.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 10) {?>
      <script>
          Swal.fire({
            title: 'Please fill the all data',
            text: 'There are some missing data that needs to register.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 11) {?>
      <script>
          Swal.fire({
            title: 'User Registered!',
            text: 'You have been registered Successfully.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 12) {?>
      <script>
          Swal.fire({
            title: 'User Registeration Failed!',
            text: 'Please try again.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 13) {?>
      <script>
          Swal.fire({
            title: 'Invalid Username !',
            text: 'User not found from entered username.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 14) {?>
      <script>
          Swal.fire({
            title: 'Invalid Password !',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 15) {?>
      <script>
          Swal.fire({
            title: 'Logged in successfull!',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 16) {?>
      <script>
          Swal.fire({
            title: 'Please login !',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 17) {?>
      <script>
          Swal.fire({
            title: 'Already loggedin!',
            text: 'If you want to login fromn another account, logout and try again',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 18) {?>
      <script>
          Swal.fire({
            title: 'Please fill out all required fields.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 19) {?>
      <script>
          Swal.fire({
            title: 'Profile Updated !',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 20) {?>
      <script>
          Swal.fire({
            title: 'Address Updated !',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 21) {?>
      <script>
          Swal.fire({
            title: 'Confirm password doesn\'t match with new password.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 22) {?>
      <script>
          Swal.fire({
            title: 'Password doesn\'t match with Current password.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 23) {?>
      <script>
          Swal.fire({
            title: 'Coupon Expired.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 24) {?>
      <script>
          Swal.fire({
            title: 'Invalid Coupon.',
            text: 'Please check the coupon again',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 25) {?>
      <script>
          Swal.fire({
            title: 'Coupon Added.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 26) {?>
      <script>
          Swal.fire({
            title: 'There is an already existing coupon.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 27) {?>
      <script>
          Swal.fire({
            title: 'Coupon Removed.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 28) {?>
      <script>
          Swal.fire({
            title: 'There is no coupon added.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 29) {?>
      <script>
          Swal.fire({
            title: 'Order placing error.',
            text: 'Please try again',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 30) {?>
      <script>
          Swal.fire({
            title: 'Order placed.',
            text: 'Order placed successfully, do the payment to verify order.',
            icon: 'success',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 31) {?>
      <script>
          Swal.fire({
            title: 'Product out of stock.',
            text: 'Please try again later.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 32) {?>
      <script>
          Swal.fire({
            title: 'Order Not Found.',
            text: 'Order ID is invalid.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 33) {?>
      <script>
          Swal.fire({
            title: 'This order is not belongs to you',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 34) {?>
      <script>
          Swal.fire({
            title: 'Coupon is not applicable',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>

    <?php if ($_GET['code'] == 69) {?>
      <script>
          Swal.fire({
            title: 'There was an error occured!',
            text: 'Please try again.',
            icon: 'error',
            confirmButtonText: 'Ok'
          });
      </script>
    <?php }?>





    <?php }?>