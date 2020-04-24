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
                    <a href="../admin/index.php" class="nav-link">
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
                          <li id="product_category">
                              <a href="product.php?source=product_category" class="nav-link">Kategori Produk</a>
                          </li>
                      </ul>
                  </li>
                  </span>

                  <span>
                  <li id="supplier" class="nav-item">
                      <a href="#petaniSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                          <img src="../img/icon/Buyer.png" height="24px" class="dropdown-toggle">
                          Petani
                      </a>
                      <ul class="collapse list-unstyled" id="petaniSubmenu">
                          <li id="list_supplier">
                              <a href="supplier.php" class="nav-link">Senarai Petani</a>
                          </li>
                          <li id="add_supplier">
                              <a href="supplier.php?source=add_supplier" class="nav-link">Tambah Petani</a>
                          </li>
                          <li id="e_lodge">
                              <a href="supplier.php?source=view_elodge_supplier" class="nav-link">Senarai Produk E-Lodge</a>
                          </li>
                      </ul>
                  </li>
                  </span>

                  <span>
                  <li id="buyer" class="nav-item">
                      <a href="#pemborongSubmenu" data-toggle="collapse" aria-expanded="false" class="nav-link">
                          <img src="../img/icon/supplier.svg" height="24px" class="dropdown-toggle">
                          Pemborong
                      </a>
                      <ul class="collapse list-unstyled" id="pemborongSubmenu">
                          <li id="list_buyer">
                              <a href="buyer.php" class="nav-link">Senarai Pemborong</a>
                          </li>
                          <li id="add_buyer">
                              <a href="buyer.php?source=add_buyer" class="nav-link">Tambah Pemborong</a>
                          </li>
                      </ul>
                  </li>
                  </span>


                <div class="sidebar_bottom">
                  <!-- <li id="profile" class="profile nav-item"> -->
                  <a class="profile" href="../admin/profile.php?source=edit_profile" >
                  <img src="../img/<?php echo $_SESSION['user_image'] ?>" >
                  <!-- </li> -->

                  <li id="logout" class="nav-item p-4">
                    <a href="../includes/logout.php" class="nav-link">
                        <img src="../img/icon/logout.svg" height="24px">
                          Keluar
                      </a>
                  </li>
                </div>             
              
              </ul>
        </div>
    </nav>