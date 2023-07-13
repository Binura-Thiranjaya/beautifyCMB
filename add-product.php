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
                                        <h3>Add product Details</h3>
                                    </div>

                                    <form action="add-product.php" method="POST" class="custom-form form-pill">

                                        <div class="row g-3 g-xl-4">
                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <label for="product-category">Product Category</label>
                                                    <select class="form-control cat-drop" id="product-category" name="product-category" required>
                                                        <?php
                                                        // Fetch categories from the database
                                                        $categories = categories();
                                                        while ($row = mysqli_fetch_assoc($categories)) {
                                                            $categoryId = $row['cat'];
                                                            $categoryName = $row['cat_name'];
                                                        ?>
                                                            <option value="<?php echo $categoryId; ?>"><?php echo $categoryName; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="input-box">
                                                    <label for="product-name">Product Name</label>
                                                    <input class="form-control" id="product-name" name="product-name" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-box">
                                                    <label for="unit-price">Unit Price</label>
                                                    <input class="form-control" id="unit-price" name="unit-price" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-box">
                                                    <label for="quantity">Quantity</label>
                                                    <input class="form-control" id="quantity" name="quantity" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="input-box">
                                                    <label for="UID">Unique ID</label>
                                                    <input class="form-control" id="UID" name="UID" type="text" value="" placeholder="Enter the product barcode number here" required>
                                                </div>
                                            </div>



                                            <div class="col-12">
                                                <div class="input-box">
                                                    <label for="product-description">Product Description</label>
                                                    <input class="form-control" id="product-description" name="product-description" type="text" value="" required>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="input-box">
                                                    <label for="product-image">Choose Product Image</label>
                                                    <input class="form-control" id="product-image" name="product-image" type="file" value="" required>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="btn-box">
                                            <a href="" class="btn-outline btn-sm">Cancel</a>
                                            <button type="submit" name="updateAddress" value="true" class="btn-solid btn-sm">Add Product <i class="arrow"></i></button>
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