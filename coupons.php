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
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="banner">
                <img class="bg-img bg-top" src="../assets/images/inner-page/banner-p.jpg" alt="banner" />

                <div class="container-lg">
                    <div class="breadcrumb-box">
                        <div class="heading-box">
                            <h1>Admin Dashboard</h1>
                        </div>
                        <ol class="breadcrumb">
                            <li><a href="index.php">Home</a></li>

                            <li>
                                <a href="javascript:void(0)"><i data-feather="chevron-right"></i></a>
                            </li>

                            <li class="current"><a href="my-dashboard.php">Admin Dashboard</a></li>
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
                    <?php include 'includes/admin-dashboard-nav.php'; ?>

                    <div class="col-lg-8 col-xl-9">
                        <div class="right-content tab-content" id="myTabContent">
                            <!-- My Dashboard Start -->
                            <div class="tab-pane show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="profile">
                                    <div class="title-box3">
                                        <h3>Add Coupons and Discounts</h3>
                                    </div>

                                    <form action="coupons.php" method="POST" class="custom-form form-pill">
                                        <div class="row g-3 g-xl-4">
                                            <div class="col-4">
                                                <div class="input-box">
                                                    <label for="coupon-code">Coupon Code</label>
                                                    <input class="form-control" id="coupon-code" name="coupon-code" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-box">
                                                    <label for="coupon-type">Coupon Type</label>
                                                    <input class="form-control" id="coupon-type" name="coupon-type" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-box">
                                                    <label for="coupon-value">Coupon Value</label>
                                                    <input class="form-control" id="coupon-value" name="coupon-value" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="input-box">
                                                    <label for="attempts">Attempts</label>
                                                    <input class="form-control" id="attempts" name="attempts" type="text" value="" placeholder="Enter the product barcode number here" required>
                                                </div>
                                            </div>


                                            <div class="col-4">
                                                <div class="input-box">
                                                    <label for="expired">Expired on</label>
                                                    <input class="form-control" id="expired" name="expired" type="date" value="" required>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="btn-box">
                                            <a href="" class="btn-outline btn-sm">Cancel</a>
                                            <button type="submit" name="addCoupon" value="true" class="btn-solid btn-sm">Add Coupon <i class="arrow"></i></button>
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
        <?php
        if(isset($_POST['addCoupon'])){
            //ALERT
           $coupon_code = post('coupon-code');
           $coupon_type = post('coupon-type');
           $coupon_cat = "ALL";
           $coupon_value = post('coupon-value');
           $isTemp = 10;
           $attempts = post('attempts');
           $expired = post('expired');

           $sql = "INSERT INTO `coupons`(`coupon_code`, `coupon_type`,`coupon_cat`, `coupon_value`,`isTemp`, `attempts`, `expired`) VALUES ('$coupon_code','$coupon_type','$coupon_cat','$coupon_value','$isTemp','$attempts','$expired')";
           if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Coupon added successfully")</script>';

            // echo "<script>Swal.fire({
            //     icon: 'success',
            //     title: 'Coupon added successfully',
            //     showConfirmButton: false,
            //     timer: 1500
            //   })</script>";
        } else {
            echo '<script>alert("Coupon adding failed")</script>';

            // echo "<script>Swal.fire({
            //     icon: 'error',
            //     title: 'Product adding failed',
            //     showConfirmButton: false,
            //     timer: 1500
            //   })</script>";
        }

        }


        
        ?>
        <!-- Dashboard End -->
    </main>
    <!-- Main End -->

    </main>
    <!-- Main End -->

    <?php include __DIR__ . '/includes/footer.php'; ?>
    <?php include __DIR__ . '/includes/js.php'; ?>

</body>
<!-- Body End -->

</html>