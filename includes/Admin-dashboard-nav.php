<div class="col-lg-4 col-xl-3 sticky">
    <button class="setting-menu btn-solid btn-sm d-lg-none">Dashboard Menu <i class="arrow"></i></button>
    <div class="side-bar">
        <span class="back-side d-lg-none"> <i data-feather="x"></i></span>
        <div class="profile-box">
            <div class="img-box">
            <img class="img-fluid" src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="user" />
            <div class="edit-btn">
                <i data-feather="edit"></i>
                <input class="updateimg" type="file" name="img" />
            </div>
            </div>

            <div class="user-name">
            <h5><?=getUserData('user_FirstName');?> <?=getUserData('user_LastName');?></h5>
            <h6><?=getUserData('user_Email');?></h6>
            <h6><?=getUserData('user_Mobile');?></h6>
            </div>
        </div>

        <ul class="nav nav-tabs nav-tabs2" id="myTab" role="tablist">
            
            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('admin-dashboard.php');?>" href="admin-dashboard.php">
                    Admin Dashboard
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('add-product.php');?>" href="add-product.php">
                    Add Products
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-payments.php');?>" href="my-payments.php">
                    Manage Products
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-profile.php');?>" href="my-profile.php">
                View Products
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-address.php');?>" href="my-address.php">
                    View Orders
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-passwordChange.php');?>" href="my-passwordChange.php">
                    View Payments
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-passwordChange.php');?>" href="my-passwordChange.php">
                    Manage Feedback
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a class="nav-link <?=setScriptClassActive('my-passwordChange.php');?>" href="my-passwordChange.php">
                    Coupons
                    <span><i data-feather="chevron-right"></i></span>
                </a>
            </li>
            
        </ul>
    </div>
</div>