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
                                        <h3>Customer Feedback</h3>
                                    </div>
                                        <div class="col-12 p-2 w-100">
                                                <input type="text" name="search" placeholder="search" id="" onkeyup="searchFunction()" class="p-2 w-100">
                                        </div>
                                    <form action="manage-product.php" method="POST" class="custom-form form-pill ">
                                        <div class="table-responsive ">
                                            <table class="table table-bordered " id="customerTable">
                                                <thead>


                                                    <tr>
                                                        <th>Commented by</th>
                                                        <th>Commented Product</th>
                                                        <th>Feedback</th>
                                                        <th>Date</th>
                                                      
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                    <?php

                                               
                                                    $comment = getFeedback();
                                                    foreach ($comment as $row) {
                                                        $comby = $row['comment_by'];
                                                        $compro = $row['comment_product'];
                                                        $feedback = $row['comment_text'];
                                                        $date = $row['comment_on'];
                                                       
                                                     
                                                    ?>



                                                        <div>
                                                            <tr class="editable-row ">
                                                                <td><?php echo $comby; ?></td>
                                                                <td><?php echo $compro; ?></td>
                                                                <td><?php echo $feedback; ?></td>
                                                                <td><?php echo  $date; ?></td>
                                                                
                                                              
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
<script>
function searchFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("customerTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!-- Body End -->

</html>