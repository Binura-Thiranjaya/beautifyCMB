<!-- Document Footer Start -->
<footer class="footer-document footer-document2 ratio_asos mb-xxl ">
      
      <div>
        <div class="container-lg">
          <center>
            <div class="main-footer">
              <div class="content-box">
                <img class="logo" src="assets/images/logos/logo-w.png" alt="logo-white" height="500px"/>
              </div>
            </div>
          </center>

          <div class="sub-footer">
            <div class="row gy-3">
              <div class="col-md-6">
                <ul>
                  <li>
                    <a href="javascript:void(0)"> <img src="assets/icons/png/1.png" class="img-fluid blur-up lazyload" alt="payment icon" /></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"> <img src="assets/icons/png/2.png" class="img-fluid blur-up lazyload" alt="payment icon" /></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"> <img src="assets/icons/png/3.png" class="img-fluid blur-up lazyload" alt="payment icon" /></a>
                  </li>
                  <li>
                    <a href="javascript:void(0)"> <img src="assets/icons/png/4.png" class="img-fluid blur-up lazyload" alt="payment icon" /></a>
                  </li>
                </ul>
              </div>
              <div class="col-md-6">
                <p class="mb-0">© 2023, BeautifyCMB.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Document Footer End -->

    <!-- Mobile Menu Footer Start -->
    <footer class="mobile-menu-footer d-sm-none">
      <ul>
        <li>
          <a href="index.php" class="<?=setScriptClassActive('index.php');?>">
            <i data-feather="home"></i>
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="search.php" class="<?=setScriptClassActive('search.php');?>">
            <i data-feather="search"></i>
            <span>Search</span>
          </a>
        </li>

        <?php if(!isLoggedIn()){ 
          echo '
            <li>
              <a href="login.php" class="'.setScriptClassActive('login.php').'">
                <i data-feather="key"></i>
                <span>Login</span>
              </a>
            </li>
            <li>
              <a href="register.php " class="'.setScriptClassActive('register.php').'">
                <i data-feather="edit-3"></i>
                <span>Register</span>
              </a>
            </li>
            ';
        } else {
          echo '
            <li>
              <a href="cart.php" class="'.setScriptClassActive('cart.php').'">
                <i data-feather="shopping-bag" ></i>
                <span>Cart</span>
              </a>
            </li>
            <li>
              <a href="my-dashboard.php" class="'.setScriptClassActive('my-dashboard.php').'">
                <i data-feather="user"></i>
                <span>My Account</span>
              </a>
            </li>
            ';
        }?>
        
      </ul>
    </footer>
    <!-- Mobile Menu Footer End -->