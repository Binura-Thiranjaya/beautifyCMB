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
                                        <h3>Stock Preview</h3>
                                    </div>
                                        <div class="col-12 p-2 w-100">
                                                <input type="text" name="seach" placeholder="search" id="" class="p-2 w-100">
                                        </div>
                                    <form action="manage-product.php" method="POST" class="custom-form form-pill ">
                                        <div class="table-responsive ">
                                            <table class="table table-bordered ">
                                                <thead>


                                                    <tr>
                                                        <th>Unique ID</th>
                                                        <th>Product Category</th>
                                                        <th>Product Name</th>
                                                        <th>Unit Price</th>
                                                        <th>Quantity</th>
                                                       
                                                        <th>Availability</th>
                                                        
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php
                                                    // Fetch product details from the database and populate the table rows
                                                    $products = getStock();
                                                    foreach ($products as $row) {
                                                        $uniqueID = $row['product_uniqueID'];
                                                        $category = $row['product_category'];
                                                        $productName = $row['product_name'];
                                                        $unitPrice = $row['product_price'];
                                                        $quantity = $row['product_stock'];
                                                        $availability = $row['availability'];
                                                        




                                                    ?>



                                                        <div>
                                                            <tr class="editable-row ">
                                                                <td><?php echo $uniqueID; ?></td>
                                                                <td><?php echo $category; ?></td>
                                                                <td><?php echo $productName; ?></td>
                                                                <td><?php echo $unitPrice; ?></td>
                                                                <td><?php echo $quantity; ?></td>
                                                                <td> <?php
                                                                        if($availability == 1){
                                                                            echo "Published";
                                                                        }else{
                                                                            echo "Not Published";
                                                                        }
                                                                    ?>
                                                                </td>
                                                              
                                                            </tr>
                                                        </div>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
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

    <?php include __DIR__ . '/includes/footer.php'; ?>
    <?php include __DIR__ . '/includes/js.php'; ?>


</body>
<!-- Body End -->

</html>