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

                  <span>
                  <li id="product" class="nav-item">
                      <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                          <img src="../img/icon/product.svg" height="24px" class="dropdown-toggle">
                          Produk
                      </a>
                      <ul class="collapse list-unstyled" id="homeSubmenu">
                          <li id="product_list">
                              <a href="product.php" class="nav-link">Senarai Produk</a>
                          </li>
                          <li id="e_lodge">
                              <a href="e-lodge.php" class="nav-link">E-Lodge</a>
                          </li>
                      </ul>
                  </li>
                  </span>

                  <li id="order_history" class="nav-item">
                    <a href="order.php" class="nav-link">
                          <img src="../img/icon/Buyer.svg" height="24px">
                          Sejarah Pesanan
                      </a>
                  </li>

                  <li id="aboutus" class="nav-item">
                    <a href="../admin_supplier/aboutus.php" class="nav-link">
                        <img src="../img/icon/aboutus.svg" height="24px">
                          Mengenai Kami
                      </a>
                  </li>

                <div class="sidebar_bottom">
                  <!-- <li id="profile" class="profile nav-item"> -->
                    <a href="../admin_supplier/profile.php" class="profile">
                      <img src="../img/user/1.jpg">
                    </a>
                  <!-- </li> -->

                  <li id="logout" class="nav-item p-4">
                    <a href="../admin_supplier/aboutus.php" class="nav-link">
                        <img src="../img/icon/logout.svg" height="24px">
                          Keluar
                      </a>
                  </li>
                </div>             
              
              </ul>
        </div>
    </nav>