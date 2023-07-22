<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
   <!-- Head Start -->
   <?php include __DIR__.'/includes/head.php';?>
    <style>
      @media (min-width: 1025px) {
        .h-custom {
          height: 100vh !important;
        }
      }
      .card-registration .select-input.form-control[readonly]:not([disabled]) {
          font-size: 1rem;
          line-height: 2.15;
          padding-left: .75em;
          padding-right: .75em;
      }
      .card-registration .select-arrow {
          top: 13px;
      }
      .gradient-custom-2 {
          /* fallback for old browsers */
          background: #a1c4fd;
          /* Chrome 10-25, Safari 5.1-6 */
          background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1));
          /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
          background: linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1)) 
      }
      .bg-indigo {
          background-color: #4835d4;
      }
      @media (min-width: 992px) {
          .card-registration-2 .bg-indigo {
              border-top-right-radius: 15px;
              border-bottom-right-radius: 15px;
          }
      }
      @media (max-width: 991px) {
          .card-registration-2 .bg-indigo {
              border-bottom-left-radius: 15px;
              border-bottom-right-radius: 15px;
          }
      }
      label[for]:after {
          content: " *";
          color: red;
      }
      #show-hide-password-btn {
        background-color: #fff;
        border: 1px solid #ccc;
        color: #666;
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 4px;
        margin-top: 10px;
        cursor: pointer;
      }

      #show-hide-password-btn:hover {
        background-color: #eee;
      }
    </style>


<?php
if(isLoggedIn()){
   redirect('index.php?code=17');
   die();
}

if(isset($_POST['login'])){
  $username = post('username');
  $password = post('password');

  //Validate user
  $sql = "SELECT * FROM users WHERE user_Email = '$username'";
  $adminSQL = "SELECT * FROM `admin` WHERE admin_Email = '$username'";
  $result = $conn->query($sql);
   $adminResult = $conn->query($adminSQL);

  if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      if (password_verify($password, $row['user_Password'])) {
         $userID = $row['user_uniqueID'];
         $_SESSION['logged_in'] = true;
         $_SESSION['user_id'] = $userID;
        redirect('index.php?code=15');
      } else {
        redirect('login.php?u='.$username.'&code=14');
      }
  }else if ($adminResult->num_rows > 0) {
      $row = $adminResult->fetch_assoc();
      if ($password == $row['admin_Password']) {
         $adminID = $row['admin_uniqueID'];
         $_SESSION['logged_in'] = true;
         $_SESSION['admin_id'] = $adminID;
        redirect('admin-dashboard.php?code=15');
      } else {
        redirect('login.php?u='.$username.'&code=14');
      }
   }
   else {
      redirect('login.php?code=13');
  }
  die();
}

?>

   <!-- Body Start -->
   <body class="theme-color3">
      <?php include __DIR__.'/includes/header.php';?>
      <!-- Loader End -->
      <main class="main buttons-element">
         <!-- Breadcrumb Start -->
         <div class="breadcrumb-wrap">
            <div class="banner">
               <img class="bg-img bg-top" src="../assets/images/inner-page/banner-p.jpg" alt="banner" />
               <div class="container-lg">
                  <div class="breadcrumb-box">
                     <div class="heading-box">
                        <h1>Log In</h1>
                     </div>
                     <ol class="breadcrumb">
                        <li><a href="index.php">Home </a></li>
                        <li>
                           <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                        </li>
                        <li class="current"><a href="login.php">Login as an user</a></li>
                     </ol>
                  </div>
               </div>
            </div>
         </div>
         <!-- Breadcrumb End -->
         <!-- Button Solid 1 Start -->
         <section class="pb-0">
            <div class="container-lg">
               <div class="title-box">
                  <h2 class="unique-heading">Login to your NGA Account</h2>
                  <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
               </div>
               <div class="button-card-wrapper">
                  <!-- Template Solid Button Start -->
                  <div class="element-card">
                     <div class="card-header bg-transparent">
                        <h5><font color="#333333">Please insert the correct credentials.</font></h5>
                     </div>
                     <div class="card-body pb-0">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                           <div class="col-12">
                              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                 <div class="card-body p-0">
                                    <div class="row g-0">
                                      <div class="p-5">
                                        <h3 class="fw-normal mb-5">Login Details</h3>
                                        <form action="login.php" method="POST">
                                          <div class="mb-4 pb-2">
                                              <div class="form-outline form-white">
                                                <input type="text" id="username" name="username" <?php if(isset($_GET['u'])){echo 'value='.$_GET['u'].'';}?> class="form-control form-control-lg"/>
                                                <label class="form-label" for="username">Enter your email :</label>
                                              </div>
                                          </div>

                                          <div class="mb-4 pb-2">
                                              <div class="form-outline form-white">
                                                <input type="password" id="password" name="password" class="form-control form-control-lg"/>
                                                <label class="form-label" for="password">Enter your password :</label>
                                              </div>
                                          </div>

                                          <div>
                                              <button type="submit" name="login" value="done" class="btn-style2">LOGIN NOW</button>
                                          </div>
                                        </form>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        
                     </div>
                  </div>
                  <!-- Template Solid Button End -->
               </div>
            </div>
         </section>
      </main>
      <?php include __DIR__.'/includes/footer.php';?>
      <?php include __DIR__.'/includes/js.php';?>

      <script src="assets/js/password-showhide.js"></script>
      

   </body>
</html>
<!-- Html End -->