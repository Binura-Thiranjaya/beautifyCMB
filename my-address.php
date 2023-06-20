<!DOCTYPE html>
<!-- Html start -->
<html lang="en">
  <!-- Head Start -->
  
  <?php include __DIR__.'/includes/head.php';?>

  <!-- Body Start -->
  <body class="theme-color3">
  <?php include __DIR__.'/includes/header.php';?>

  <?php
  if(isset($_POST['updateAddress'])){
    $address = post('address');
    $zipcode = post('zipcode');
    $mobile = post('mobile');

    if (empty($address) || empty($zipcode) || empty($mobile)) {
      redirect('my-address.php?code=18');
      // You can also redirect the user to a different page or take other actions here
      exit();
    }
    $user = username();
    $sql = "UPDATE `users` SET `user_Address` = '$address', `user_Mobile` = '$mobile', `user_ZipCode` = '$zipcode' WHERE `users`.`user_uniqueID` = '$user'";
    $result = mysqli_query(db(), $sql);

    if($result){
      redirect('my-address.php?code=20');
    } else {
      redirect('my-address.php?code=69');
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
                      <h3>Delivery Details</h3>
                    </div>

                    <form action="my-address.php" method="POST" class="custom-form form-pill">

                      <div class="row g-3 g-xl-4">
                        <div class="col-sm-12">
                          <div class="input-box">
                            <label for="address">Address</label>
                            <input class="form-control" id="address" name="address" type="text" value="<?=getUserData('user_Address');?>" required>
                          </div>
                        </div>

                        <div class="col-sm-6">
                          <div class="input-box">
                            <label for="mobile">Mobile Number</label>
                            <input class="form-control" id="mobile" name="mobile" type="text" value="<?=getUserData('user_Mobile');?>" required>
                          </div>
                        </div>

                        <div class="col-sm-4">
                          <div class="input-box">
                            <label for="zipcode">Zip Code</label>
                            <input maxlength="10" class="form-control" id="zipcode" name="zipcode" type="number" value="<?=getUserData('user_ZipCode');?>" required>
                          </div>
                        </div>

                      </div>

                      <div class="btn-box">
                        <a href="" class="btn-outline btn-sm">Cancel</a>
                        <button type="submit" name="updateAddress" value="true" class="btn-solid btn-sm">Update <i class="arrow"></i></button>
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
