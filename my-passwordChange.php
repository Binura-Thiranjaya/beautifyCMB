<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>
  <?php 
  if(isset($_POST['updatePassword'])){
    $current_password = post('current_password');
    $password = post('password');
    $cpassword = post('cpassword');
    $dbPassword = getUserData('user_Password');

    if($password != $cpassword){
      redirect('my-passwordChange.php?code=21');
    }

    if (!password_verify($current_password, $dbPassword)) {
      redirect('my-passwordChange.php?code=22');
    }

  }
  ?>
    <!-- Main Start -->
    <main class="main">
      <!-- Breadcrumb Start -->
      <div class="breadcrumb-wrap">
        <div class="banner">
          <img class="bg-img bg-top" src="../assets/images/inner-page/banner-p.jpg" alt="banner" />

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
                <div class="profile">
                    <div class="title-box3">
                      <h3>Change Password</h3>
                    </div>

                    <form action="my-passwordChange.php" method="POST" class="custom-form form-pill" id="changeForm">

                    <div class="row g-3 g-xl-4">
                      <div class="col-sm-6">
                        <div class="input-box">
                          <label for="current_password">Current Password</label>
                          <div class="input-group">
                            <input class="form-control" id="current_password" name="current_password" type="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="current_password_toggle">
                              <i class="far fa-eye-slash"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <div class="row g-3 g-xl-4">
                      <div class="col-sm-6">
                        <div class="input-box">
                          <label for="password">New Password</label>
                          <div class="input-group">
                            <input class="form-control" id="password" name="password" type="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="password_toggle">
                              <i class="far fa-eye-slash"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <br/>
                    <div class="row g-3 g-xl-4">
                      <div class="col-sm-6">
                        <div class="input-box">
                          <label for="cpassword">Confirm New Password</label>
                          <div class="input-group">
                            <input class="form-control" id="cpassword" name="cpassword" type="password" required>
                            <button class="btn btn-outline-secondary" type="button" id="cpassword_toggle">
                              <i class="far fa-eye-slash"></i>
                            </button>
                          </div>
                          <p class="password-message" style="color: red;"></p>
                          <p id="errormsg" style="color: red; display: none;">Passwords do not match.</p>
                        </div>
                      </div>
                    </div>
                      <div class="btn-box">
                        <a href="" class="btn-outline btn-sm">Cancel</a>
                        <button type="submit" name="updatePassword" value="true" class="btn-solid btn-sm">Update <i class="arrow"></i></button>
                      </div>
                    </form>
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
      const current_password_toggle = document.getElementById('current_password_toggle');
      const password_toggle = document.getElementById('password_toggle');
      const cpassword_toggle = document.getElementById('cpassword_toggle');
      const passwordInput = document.getElementById('password');
      const cpassword = document.getElementById('cpassword');
      const errormsg = document.getElementById('errormsg');
      const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
      const changeForm = document.getElementById('changeForm');
      let errors1 = 0;
      let errors2 = 0;

      current_password_toggle.addEventListener('click', function() {
        const current_password = document.getElementById('current_password');
        if (current_password.type === 'password') {
          current_password.type = 'text';
          current_password_toggle.innerHTML = '<i class="far fa-eye"></i>';
        } else {
          current_password.type = 'password';
          current_password_toggle.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
      });

      password_toggle.addEventListener('click', function() {
        const password = document.getElementById('password');
        if (password.type === 'password') {
          password.type = 'text';
          password_toggle.innerHTML = '<i class="far fa-eye"></i>';
        } else {
          password.type = 'password';
          password_toggle.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
      });

      cpassword_toggle.addEventListener('click', function() {
        const cpassword = document.getElementById('cpassword');
        if (cpassword.type === 'password') {
          cpassword.type = 'text';
          cpassword_toggle.innerHTML = '<i class="far fa-eye"></i>';
        } else {
          cpassword.type = 'password';
          cpassword_toggle.innerHTML = '<i class="far fa-eye-slash"></i>';
        }
      });

      cpassword.addEventListener('input', function() {
        if (cpassword.value !== document.getElementById('password').value) {
          errormsg.style.display = 'block';
          errors1 = 1;
        } else {
          errors1 = 0;
          errormsg.style.display = 'none';
        }
      });

      passwordInput.addEventListener("input", function() {
        const passwordValue = passwordInput.value;
        if (passwordRegex.test(passwordValue)) {
          passwordInput.setCustomValidity("");
          document.querySelector(".password-message").innerHTML = "";
          errors2 = 0;
        } else {
          passwordInput.setCustomValidity("Please enter a strong password with at least 8 characters, including letters and numbers. No Special Characters ara allowed !");
          document.querySelector(".password-message").innerHTML = "Please enter a strong password with at least 8 characters, including letters and numbers. No Special Characters ara allowed !";
          errors2 = 1;
        }
      });

      changeForm.addEventListener('submit', function(event) {
        if(errors1 || errors2){
          event.preventDefault(); // Block form submission
        }
      });



    </script>
  </body>
  <!-- Body End -->

</html>
