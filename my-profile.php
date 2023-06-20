<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>
  <?php
  if(isset($_POST['updateProfile'])){
    $firstName = post('firstName');
    $lastName = post('lastName');
    $email = post('email');
    $mobile = post('mobile');

    if (empty($firstName) || empty($lastName) || empty($email) || empty($mobile)) {
      redirect('my-profile.php?code=18');
      // You can also redirect the user to a different page or take other actions here
      exit();
    }
    $user = username();
    $sql = "UPDATE `users` SET `user_FirstName` = '$firstName', `user_LastName` = '$lastName', `user_Email` = '$email', `user_Mobile` = '$mobile' WHERE `users`.`user_uniqueID` = '$user'";
    $result = mysqli_query(db(), $sql);

    if($result){
      redirect('my-profile.php?code=19');
    } else {
      redirect('my-profile.php?code=69');
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
                      <h3>Basics Information</h3>
                    </div>

                    <form action="my-profile.php" method="POST" class="custom-form form-pill">

                      <div class="row g-3 g-xl-4">
                        <div class="col-sm-6">
                          <div class="input-box">
                            <label for="firstname">First Name</label>
                            <input class="form-control" id="firstName" name="firstName" type="text" value="<?=getUserData('user_FirstName');?>" required>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="input-box">
                            <label for="lastName">Last Name</label>
                            <input class="form-control" id="lastName" name="lastName" type="text" value="<?=getUserData('user_LastName');?>" required>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="input-box">
                            <label for="email">Email / Username</label>
                            <input class="form-control" id="email" name="email" type="email" value="<?=getUserData('user_Email');?>" required>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="input-box">
                            <label for="mobile">Mobile</label>
                            <input maxlength="10" class="form-control" id="mobile" name="mobile" type="number" value="<?=getUserData('user_Mobile');?>" required>
                          </div>
                        </div>

                      </div>

                      <div class="btn-box">
                        <a href="" class="btn-outline btn-sm">Cancel</a>
                        <button type="submit" name="updateProfile" value="true" class="btn-solid btn-sm">Update <i class="arrow"></i></button>
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

  </body>
  <!-- Body End -->

</html>
