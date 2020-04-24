    <nav id="sidebar" class="">

      <div class="p-4">

        <div class="row my-3">
          <button type="button" id="" class="btn btn-primary custom-menu">
            <img src="../img/icon/double-chevron.png" height="24">
          </button>
        </div>

        <div class="row mb-4 justify-content-end">
          <button type="button" id="close">
            <img src="../img/icon/close.png" height="18px">
          </button>
        </div>

          <h1><a href="index.php" class="logo"><span><strong>AOS</strong></span></a></h1>

              <ul class="list-unstyled components">

                  <li id="dashboard" class="nav-item">
                    <a href="index.php" class="nav-link">
                          <img src="../img/icon/dashboard.svg" height="24px">
                          Dashboard
                    </a>
                  </li>

                  <li id="menu" class="nav-item">
                    <a href="menu.php" class="nav-link">
                          <img src="../img/icon/dashboard.svg" height="24px">
                          Menu
                    </a>
                  </li>


              <?php
                 if(isset($_GET['menu'])){

                   if($_GET['menu'] == 'eselling'){

                      $menu = $_GET['menu'];
                        
              ?> 

                  <li id="product" class="nav-item">
                    <a href="product.php?menu=<?php echo $menu; ?>" class="nav-link">
                          <img src="../img/icon/product.svg" height="24px">
                          Produk
                    </a>
                  </li>

                  <li id="order_history" class="nav-item">
                    <a href="order.php?menu=<?php echo $menu; ?>&source=view_all_order_products" class="nav-link">
                          <img src="../img/icon/history.svg" height="24px">
                          Sejarah Pesanan
                      </a>
                  </li>

                  <span>
                  <li id="toyyibpay" class="nav-item">
                      <a href="#toyyibpaySubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                          <img src="../img/icon/product.svg" height="24px" class="dropdown-toggle">
                          Toyyibpay
                      </a>
                      <ul class="collapse list-unstyled" id="toyyibpaySubmenu">
                          <li id="creat_bill">
                              <a href="toyyibpayApi.php?menu=<?php echo $menu; ?>&source=createBill" class="nav-link">Tambah Bill</a>
                          </li>
                      </ul>
                  </li>
                  </span>

                    <?php      
                      }

                      else if($_GET['menu'] == 'elodge'){
                          
                          $menu = $_GET['menu'];
                          
                      ?>

                  <span>
                  <li id="elodge" class="nav-item">
                      <a href="#elodgeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                          <img src="../img/icon/product.svg" height="24px" class="dropdown-toggle">
                          Produk
                      </a>
                      <ul class="collapse list-unstyled" id="elodgeSubmenu">
                          <li id="elodge_product">
                              <a href="e-lodge.php?menu=<?php echo $menu;?>" class="nav-link">Senarai Produk</a>
                          </li>
                          <li id="e_lodge_request">
                              <a href="e-lodge.php?menu=<?php echo $menu; ?>&source=view_book_elodge_product" class="nav-link">E-Lodge</a>
                          </li>
                      </ul>
                  </li>
                  </span>

                  <?php
                      }

                      else if($_GET['menu'] == 'ebargain'){
                          
                          $menu = $_GET['menu'];
                          
                  ?>

                  <li id="ebargain" class="nav-item">
                    <a href="../admin_supplier/aboutus.php" class="nav-link">
                        <img src="../img/icon/aboutus.svg" height="24px">
                          E-Bargain
                      </a>
                  </li>

                  <?php
                       }
                   }
                  ?>

                  <li id="aboutus" class="nav-item">
                    <a href="e-bargain.php?menu=<?php echo $menu; ?>" class="nav-link">
                        <img src="../img/icon/aboutus.svg" height="24px">
                          Mengenai Kami
                      </a>
                  </li>

                <div class="sidebar_bottom">
                  <!-- <li id="profile" class="profile nav-item"> -->
                    <a href="profile.php?menu=<?php echo $menu; ?>&source=edit_profile" class="profile">
                      <img src="../img/<?php echo $_SESSION['user_image'] ?>">
                    </a>
                  <!-- </li> -->

                  <li id="logout" class="nav-item p-4">
                    <a href="../admin_supplier/aboutus.php" class="nav-link">
                        <img src="../img/icon/logout.svg" height="24px">
                          Keluar
                      </a>
                  </li>


                  <div hidden>
                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                      Interface
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Components</span>
                      </a>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Custom Components:</h6>
                          <a class="collapse-item" href="buttons.html">Buttons</a>
                          <a class="collapse-item" href="cards.html">Cards</a>
                        </div>
                      </div>
                    </li>

                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                        <i class="fas fa-fw fa-wrench"></i>
                        <span>Utilities</span>
                      </a>
                      <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Custom Utilities:</h6>
                          <a class="collapse-item" href="utilities-color.html">Colors</a>
                          <a class="collapse-item" href="utilities-border.html">Borders</a>
                          <a class="collapse-item" href="utilities-animation.html">Animations</a>
                          <a class="collapse-item" href="utilities-other.html">Other</a>
                        </div>
                      </div>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                      Addons
                    </div>

                    <!-- Nav Item - Pages Collapse Menu -->
                    <li class="nav-item">
                      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Pages</span>
                      </a>
                      <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                          <h6 class="collapse-header">Login Screens:</h6>
                          <a class="collapse-item" href="login.html">Login</a>
                          <a class="collapse-item" href="register.html">Register</a>
                          <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                          <div class="collapse-divider"></div>
                          <h6 class="collapse-header">Other Pages:</h6>
                          <a class="collapse-item" href="404.html">404 Page</a>
                          <a class="collapse-item" href="blank.html">Blank Page</a>
                        </div>
                      </div>
                    </li>

                    <!-- Nav Item - Charts -->
                    <li class="nav-item">
                      <a class="nav-link" href="charts.html">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Charts</span></a>
                    </li>
              </div>
                </div>             
              
              </ul>
        </div>
    </nav>