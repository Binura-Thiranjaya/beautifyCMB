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
                    <h3>Edit product Details</h3>
                  </div>

                  <form action='edit-product.php?id=<?php echo $_GET['id']; ?>' method="POST" class="custom-form form-pill">
                  <?php
                        // Retrieve the unique ID from the URL parameter
                        $uniqueID = $_GET['id'];
                        // Fetch the product details from the database based on the unique ID
                        $sql = mysqli_query(db(), 'SELECT * FROM `products` WHERE product_uniqueID = "'.$uniqueID.'"') or die(mysqli_error(db()));
                        $sqlImage = mysqli_query(db(), 'SELECT * FROM `product_images` WHERE product_uniqueID = "'.$uniqueID.'"') or die(mysqli_error(db()));
                        $Image = mysqli_fetch_assoc($sqlImage);

                        $product = mysqli_fetch_assoc($sql);

                        // Populate the form fields with the retrieved values
                        if ($product) {
                          $categoryId = $product['product_category'];
                          $productName = $product['product_name'];
                          $unitPrice = $product['product_price'];
                          $quantity = $product['product_stock'];
                          $UID = $product['product_uniqueID'];
                          $description = $product['product_description'];
                          $availability = $product['availability'];

                          $Image = $Image['image'];
                          

                          // Set the selected option in the category dropdown
                          // echo '<script>document.getElementById("product-category").value = "'.$categoryId.'";</script>';

                          // Set the values for other form fields
                          // echo '<script>document.getElementById("product-name").value = "'.$productName.'";</script>';
                          // echo '<script>document.getElementById("unit-price").value = "'.$unitPrice.'";</script>';
                          // echo '<script>document.getElementById("quantity").value = "'.$quantity.'";</script>';
                          // echo '<script>document.getElementById("UID").value = "'.$UID.'";</script>';
                        }

                        

                        ?>


                    <div class="row g-3 g-xl-4">
                      <div class="col-sm-6">
                        <div class="input-box">
                          <label for="product-category">Product Category</label>
                          <select class="form-control cat-drop" id="product-category" name="product-category" required>
                            <?php
                                  if($categoryId == "GENTS"){

                                    echo '<option value="GENTS" selected>GENTS</option>';
                                    echo '<option value="LADIES">LADIES</option>';
                                  }else{
                                    echo '<option value="GENTS">GENTS</option>';
                                    echo '<option value="LADIES" selected>LADIES</option>';
                                  }
                              ?>                         
                          </select>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="input-box">
                          <label for="product-name">Product Name</label>
                          <input class="form-control" id="product-name" name="product-name" type="text" value="<?php echo $productName; ?>" required>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="input-box">
                          <label for="unit-price">Unit Price</label>
                          <input class="form-control" id="unit-price" name="unit-price" type="text" value="<?php echo $unitPrice; ?>" required>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="input-box">
                          <label for="quantity">Quantity</label>
                          <input class="form-control" id="quantity" name="quantity" type="text" value="<?php echo $quantity; ?>" required>
                        </div>
                      </div>

                      <div class="col-sm-4">
                        <div class="input-box">
                          <label for="UID">Unique ID</label>
                          <input class="form-control" id="UID" name="UID" type="text" value="<?php echo $UID; ?>" placeholder="Enter the product barcode number here" required>
                        </div>
                      </div>



                      <div class="col-12">
                        <div class="input-box">
                          <label for="product-description">Product Description</label>
                          <input class="form-control" id="product-description" name="product-description" type="text" value="<?php echo $description; ?>" required>
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="input-box">
                          <label for="product-image">Choose Product Image</label>
                          <input class="form-control" id="product-image" name="product-image" type="file" value="">
                        </div>
                      </div>

                      <div class="col-6">
                        <div class="input-box">
                          <label for="Availability">Availability</label>
                          <?php
                            if($availability == "1"){
                                echo '<input type="radio" id="Availability" name="Availability" value="1" checked>'."Published";
                                echo '<br>';
                                echo '<input type="radio" id="Availability" name="Availability" value="0">'."Not Published";
                            }else{
                                echo '<input type="radio" id="Availability" name="Availability" value="1">'."Published";
                                echo '<br>';
                                echo '<input type="radio" id="Availability" name="Availability" value="0" checked>'."Not Published";
                            }
                              ?>

                          <!-- <input class="form-control" id="Availability" name="Availability" type="text" value="<?php echo $availability; ?>" required> -->
                        </div>
                      </div>


                    </div>

                    <div class="btn-box">
                      <a href="" class="btn-outline btn-sm">Cancel</a>
                      <button type="submit" name="updateProduct" value="true" class="btn-solid btn-sm">Update <i class="arrow"></i></button>
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
    // session_start();
      if (isset($_POST['updateProduct'])) {
        $uniqueID = $_GET['id'];
        $product_category = post('product-category');
        $product_name = post('product-name');
        $unit_price = post('unit-price');
        $quantity = post('quantity');
        $UID =  post('UID');
        $product_description =  post('product-description');
        $availability = post('Availability');

        // //convert image to base64
        if ($_FILES['product_image']['tmp_name']) {
            $image = base64_encode(file_get_contents($_FILES['product_image']['tmp_name']));
        }else{
            $image = $Image;
        } 

        // //insert into database
        $sql1 = "UPDATE `products` SET `product_uniqueID`='$UID',`product_category`='$product_category',`product_name`='$product_name',`product_price`='$unitPrice',`product_description`='$product_description',`product_stock`='$quantity',`availability`='$availability' WHERE product_uniqueID = '$uniqueID'";
        $sql2 = "UPDATE `product_images` SET `product_uniqueID`='$UID',`image`='$image',`availability`='$availability' WHERE  product_uniqueID = '$uniqueID'";
        if (mysqli_query($conn, $sql1) && mysqli_query($conn, $sql2)) {
            echo '<script>alert("Product edited successfully")</script>';
            echo '<script>window.location.href = "manage-product.php";</script>';
        } else {
            echo '<script>alert("Product edited failed")</script>';
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