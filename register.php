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
if(isset($_POST['register'])){


  // Validate that all POST data is present
  $errors = [];
  foreach ($_POST as $name => $value) {
    if (empty($value)) {
      $errors[] = "Please fill in the $name field.";
    }
  }

  //Redirecting if atleast one field is missing
  if (count($errors) >= 1) {
    redirect("register.php?code=10");
    die();
  } 
   
  //Declaring Data
  $first_name = post("first_name");
  $last_name = post("last_name");
  $email = post("email");
  $mobile = post("mobile");
  $password = post("password");
  $confirm_password = post("confirm-password");
  $address = post("address");
  $zip = post("zip");
  $city = post("city");


  //Already Registered protection area
  if(isUserExistFrom("user_Email", $email)){
    redirect("register.php?code=8");
    die();
  }

  //Already Registered protection area  
  if(isUserExistFrom("user_Mobile", $mobile)){
    redirect("register.php?code=9");
    die();
  }
  $currentIP = get_client_ip();
  $dateNTime = currentDatenTime();
  $unique_id = uniqid($first_name, false);

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  //Do Registration
  $sql = "INSERT INTO `users`(`user_uniqueID`, `user_FirstName`, `user_LastName`, `user_Email`, `user_Password`, `user_Address`, `user_Mobile`, `user_Country`, `user_ZipCode`, `user_LastLogin`, `user_LastLoginIP`) VALUES ('$unique_id','$first_name','$last_name','$email','$hashed_password','$address','$mobile','SRI-LANKA','$zip','$dateNTime','$currentIP')";
  $result = mysqli_query(db(), $sql);

  if($result){
    redirect("register.php?code=11");
    die();
  } else {
    redirect("register.php?code=12");
    die();
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
                        <h1>Registration</h1>
                     </div>
                     <ol class="breadcrumb">
                        <li><a href="index.php">Home </a></li>
                        <li>
                           <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                        </li>
                        <li class="current"><a href="register.php">Register as an user</a></li>
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
                  <h2 class="unique-heading">Create your NGA Account</h2>
                  <span class="title-divider1"><span class="squre"></span><span class="squre"></span></span>
               </div>
               <div class="button-card-wrapper">
                  <!-- Template Solid Button Start -->
                  <div class="element-card">
                     <div class="card-header bg-transparent">
                        <h5><font color="#333333">Please fill in all fields accurately to complete registration.</font></h5>
                     </div>
                     <div class="card-body pb-0">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                           <div class="col-12">
                              <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                                 <div class="card-body p-0">
                                    <div class="row g-0">
                                       <div class="col-lg-6">
                                          <div class="p-5">
                                             <h3 class="fw-normal mb-5" style="color: #4835d4;">General Infomation</h3>
                                             <form action="register.php" method="POST">
                                              <div class="row">
                                                  <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <input type="text" id="first_name" name="first_name" class="form-control form-control-lg" required/>
                                                        <label class="form-label required" for="first_name">First name</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 mb-4 pb-2">
                                                    <div class="form-outline">
                                                        <input type="text" id="last_name" name="last_name" class="form-control form-control-lg" required/>
                                                        <label class="form-label" for="last_name">Last name</label>
                                                    </div>
                                                  </div>
                                              </div>
                                              
                                              <div class="mb-4 pb-2">
                                                  <div class="form-outline">
                                                    <input type="email" id="email" name="email" class="form-control form-control-lg" required/>
                                                    <label class="form-label" for="email">Email</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12 mb-4 pb-2">
                                                    <div class="form-outline form-white">
                                                        <input type="number" class="form-control form-control-lg" id="mobile" name="mobile" pattern="[0][0-9]{9}" required>
                                                        <label class="form-label" for="mobile">Phone Number (Example: 07XXXXXXXX)</label>
                                                        <p class="mobile-message" style="color: red;"></p>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                <div class="col-md-12 mb-4 pb-2">
                                                  <div class="form-outline form-white">
                                                    <input type="password" id="password" class="form-control form-control-lg" name="password" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                                                    <label class="form-label" for="password">Password</label>
                                                    <p class="password-message" style="color: red;"></p>
                                                  </div>
                                                  <button type="button"><a id="show-hide-password-btn" class="fas fa-eye"> Show Password </a></button>
                                                </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-12 mb-4 pb-2">
                                                    <div class="form-outline form-white">
                                                        <input type="password" id="confirm-password" class="form-control form-control-lg" name="confirm-password" required>
                                                        <label class="form-label" for="confirm-password">Confirm Password</label>
                                                        <p class="confirm-password-message" style="color: red;"></p>
                                                    </div>
                                                  </div>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 bg-indigo text-white">
                                            <div class="p-5">
                                              <h3 class="fw-normal mb-5">Contact Details</h3>
                                              <div class="mb-4 pb-2">
                                                  <div class="form-outline form-white">
                                                    <input type="text" id="address" name="address" class="form-control form-control-lg" required/>
                                                    <label class="form-label" for="address">Address</label>
                                                  </div>
                                              </div>
                                              <div class="row">
                                                  <div class="col-md-5 mb-4 pb-2">
                                                    <div class="form-outline form-white">
                                                        <input type="number" class="form-control form-control-lg" id="zip" name="zip" pattern="[0-9]{5}" required>
                                                        <label class="form-label" for="zip">Zip Code</label>
                                                    </div>
                                                  </div>
                                                  <div class="col-md-7 mb-4 pb-2">
                                                    <div class="form-outline form-white">
                                                        <input type="text" id="city" name="city" class="form-control form-control-lg" required/>
                                                        <label class="form-label" for="city">City</label>
                                                    </div>
                                                  </div>
                                              </div>
                                              <div class="mb-4 pb-2">
                                                  <div class="form-outline form-white">
                                                    <input type="text" id="country" class="form-control form-control-lg" value="SRI LANKA" disabled readonly/>
                                                    <label class="form-label" for="country">Country</label>
                                                  </div>
                                              </div>
                                              
                                              <div class="form-check d-flex justify-content-start mb-4 pb-3">
                                                  <input class="form-check-input me-3" type="checkbox" value="" id="form2Example3c" required/>
                                                  <label class="form-check-label text-white" for="form2Example3">
                                                  I do accept the <a href="#!" class="text-white"><u>Terms and Conditions</u></a> of your
                                                  site.
                                                  </label>
                                              </div>
                                              <div>
                                                  <button type="submit" name="register" value="done" class="btn-style2">REGISTER NOW</button>
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
                  </div>
                  <!-- Template Solid Button End -->
               </div>
            </div>
         </section>
      </main>
      <?php include __DIR__.'/includes/footer.php';?>
      <?php include __DIR__.'/includes/js.php';?>

      <script src="assets/js/password-showhide.js"></script>
      <script src="assets/js/vd.js"></script>
      

   </body>
   <!-- Body End -->
</html>
<!-- Html End -->