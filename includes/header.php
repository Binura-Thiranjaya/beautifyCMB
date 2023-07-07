<!-- Loader Start -->
<div class="loader-wrapper">
      <div class="loader animate">
        <?php if(isset($loader)){
          $countOfLoader = strlen($loader);
          foreach(str_split($loader) as $char){
            echo "<span>" .$char . "</span>";
        }
        }
        ?>

      </div>
    </div>
    <!-- Loader End -->

    <!-- Overlay -->
    <a href="javascript:void(0)" class="overlay-general"></a>
    <!-- Header Start -->
    <header class="header-common header3">
      <!-- Top Header -->
      <div class="top-header bg-theme-theme">
        <div class="container-lg">
          <div class="topheader-wrap">
            <p class="marquee"><span> Free delivery if your total is above Rs.3000.00 </span></p>
          </div>
        </div>
      </div>

      <div class="container-lg">
        <div class="nav-wrap">
          <!-- Navigation Start -->
          <nav class="navigation">
            <div class="nav-section">
              <div class="header-section">
                <div class="navbar navbar-expand-xl navbar-light navbar-sticky p-0">
                  <div class="d-flex logo-wraper">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#primaryMenu" aria-controls="primaryMenu">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="index.php" class="logo-link">
                      <img class="logo logo-dark" src="assets/images/logos/logo.png" alt="logo" />
                      <img class="logo logo-light" src="assets/images/logos/logo.png" alt="logo" />
                    </a>
                  </div>

                  <!-- <div class="header-center">
                    <div class="search-header">
                      <div class="search-bar">
                        <div class="input-group">
                          <input type="text" class="form-control search-type" placeholder="I’m shopping for... " />
                          <div class="input-group-append">
                            <span class="input-group-text">
                              <i class="d-none d-lg-block search-b" data-feather="search"></i>
                              <i class="close-b d-lg-none" data-feather="x"></i>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div> -->
                  
                </div>
              </div>
            </div>
          </nav>
          <!-- Navigation End -->

          <!-- Menu Right Start  -->
          <div class="menu-right">
            <!-- Icon Menu Start -->
            <ul class="icon-menu">
              
            <?php 
            if(!isLoggedIn()){ 

              echo '
                <li class="user">
                  <div class="dropdown user-dropdown">
                    <a href="javascript:void(0)"><i data-feather="user"></i></a>
                    <ul class="onhover-show-div">
                      <li><a href="login.php">Login</a></li>
                      <li><a href="register.php">Register</a></li>
                    </ul>
                  </div>
                </li>
              ';
            } else {
              echo '
              <li class="user">
                <div class="dropdown user-dropdown">
                  <a href="my-dashboard.php"><i data-feather="user"></i></a>
                  <ul class="onhover-show-div">
                    <li><a href="my-dashboard.php">My Account</a></li>
                    <li><a href="my-profile.php">My profile</a></li>
                    <li><a href="my-orders.php">My Orders</a></li>
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </div>
              </li>
              ';
            }
            ?>
                  
              <li class="search">
                <div class="dropdown user-dropdown">
                  <a href="javascript:void(0)"><i data-feather="search"></i></a>
                </div>
              </li>


              <?php if(isLoggedIn()){ ?>
              <!-- Cart Menu Start -->
              <li>
                <div class="dropdown shopingbag">
                  <div class="side-list">
                    <div>
                      <a href="cart.php" class="cart-button"><i data-feather="shopping-bag"></i> <span class="notification-label"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?></span></a>
                      <a href="cart.php" class="overlay-cart overlay-common"></a>
                    </div>
                    <div class="side-box">
                      <span>Shopping Cart:</span>
                      <a href="cart.php">
                      <?php
                        if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            $total_cost = 0;
                            foreach($_SESSION['cart'] as $item) {
                                $total_cost += $item['price']*$item['quantity'];
                            }
                            $sub_total = $total_cost;
                            echo "Rs".number_format($total_cost, 2);
                        } else {
                            echo "Rs.0";
                        }
                      ?>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <!-- Cart Menu End -->
              <?php } else {?>
              <li>
                <div class="theme-color5">
                  <div class="btn-style4">
                    <a href="login.php" class="btn btn-outline">
                      <span class="corner-wrap left-top">
                        <span class="corner"></span>
                      </span>

                      <span class="corner-wrap right-bottom">
                        <span class="corner"></span>
                      </span>

                      Login Now
                    </a>
                  </div>
                </div>
              </li>
              <?php } ?>
            </ul>
            <!-- Icon Menu End -->
          </div>
          <!-- Menu Right End  -->
        </div>
      </div>

      <div class="bg-theme-gray-light2">
        <div class="container-lg bottom-header">
          <div class="nav-wrap p-0">
            <!-- Navigation Start -->
            <nav class="navigation">
              <div class="nav-section">
                <div class="header-section">
                  <div class="navbar navbar-expand-xl navbar-light navbar-sticky p-0">
                    <div class="category-menu category-dropdown">
                      <div class="dropdown">
                        <button type="button" class="catagories-btn">
                          <img src="https://themes.pixelstrap.com/oslo/assets/icons/svg/menu3.svg" alt="menu" />
                          All categories
                        </button>

                        <ul class="onhover-show-div">
                          <li><a href="shop.php?cat=mens">Gents</a></li>
                          <li><a href="shop.php?cat=ladies">Ladies</a></li>
                        </ul>
                      </div>
                    </div>

                    <div class="offcanvas offcanvas-collapse order-lg-2" id="primaryMenu">
                      <div class="offcanvas-header navbar-shadow">
                        <h5 class="mt-1 mb-0">Menu</h5>
                        <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                      </div>
                      <div class="offcanvas-body">
                        <!-- Menu-->
                        <ul class="navbar-nav">
                          <!-- Home -->
                          <li class="nav-item">
                            <a class="nav-link" href="index.php" >Home</a>
                          </li>

                          <li class="nav-item">
                            <!-- <a class="nav-link" href="shop.php?cat=petceylon" >Mens</a> -->
                            <a class="nav-link" href="shop.php?cat=mens" >Gents</a>

                          </li>

                          <li class="nav-item">
                          <a class="nav-link" href="shop.php?cat=ladies">Ladies</a>
                            <!-- <a class="nav-link" href="shop.php?cat=secretsein">Ladies</a> -->
                          </li>

                          
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </nav>
            <!-- Navigation End -->

            <!-- Menu Right Start  -->
            <div class="menu-right contact-box">
              <div class="side-box">
                <a class="help" href="tel:94719982906"><i data-feather="phone"></i> 071 998 2906</a>
              </div>
            </div>
            <!-- Menu Right End  -->
          </div>
        </div>
      </div>
    </header>
    <!-- Header End -->