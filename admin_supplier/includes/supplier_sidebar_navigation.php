 <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Agro Online System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
            


    <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../admin_supplier/index.php">
          <img class="" src="../img/icon/dashboard.png" width="20%" height="20%">
          <span>Dashboard</span></a>
      </li>


    <!-- Nav Item - Product -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="../admin_supplier/product.php" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <img class="" src="../img/icon/Product.png" width="20%" height="20%">
          <span>Produk</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="product.php">Senarai Produk</a>
<!--
            <a class="collapse-item" href="product.php?source=add_product">Tambah Produk</a>
            <hr class="sidebar-divider">
            <a class="collapse-item" href="product.php?source=e_lodge">E-Lodge</a>
-->
<!--            <a class="collapse-item" href="product.php?source=edit_product">Kemaskini Produk</a>-->
          </div>
        </div>
      </li>     
        
        
    <!-- Nav Item - E-Lodge -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="../admin_supplier/e-lodge.php" data-toggle="collapse" data-target="#collapseElodge" aria-expanded="true" aria-controls="collapseUtilities">
          <img class="" src="../img/icon/Product.png" width="20%" height="20%">
          <span>E-Lodge</span>
        </a>
        <div id="collapseElodge" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="e-lodge.php">Senarai E-Lodge</a>
<!--            <a class="collapse-item" href="e-lodge.php?source=add_elodge">Tambah E-Lodge</a>-->
          </div>
        </div>
      </li> 


        <!-- Nav Item - Supplier -->
        <li class="nav-item">
        <a class="nav-link collapsed" href="../admin_supplier/supplier.php" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <img class="" src="../img/icon/Buyer.png" width="20%" height="20%">
          <span>Sejarah Pesanan</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="order.php">Senarai Pesanan</a>
<!--            <a class="collapse-item" href="order.php?source=view_order_product">Lihat Tempahan</a>-->
          </div>
        </div>
      </li>
        

    <!-- Nav Item - Buyer -->
<!--
    <li class="nav-item">
        <a class="nav-link collapsed" href="../admin/buyer.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <img class="" src="../img/icon/supplier.png" width="20%" height="20%">
          <span>Pemborong</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar" style="">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="buyer.php">Senarai Pemborong</a>
            <a class="collapse-item" href="buyer.php?source=add_buyer">Tambah Pemborong</a>
            <hr class="sidebar-divider">
            <a class="collapse-item" href="../admin_buyer/buyer_product.php">Produk Pemborong</a>
            <a class="collapse-item" href="../admin_buyer/buyer_shoppingCart.php">Jual Beli Produk</a>
            <a class="collapse-item" href="../admin_buyer/buyer_orderHistory.php">Transaksi Produk</a>
          </div>
        </div>
      </li>

-->


        <!-- Nav Item - About Us -->
      <li class="nav-item">
        <a class="nav-link" href="../admin_supplier/aboutus.php">
          <img class="" src="../img/icon/phone.png" width="20%" height="20%">
          <span>Tentang kami</span></a>
      </li>

    <hr><hr><hr><hr><hr><hr><hr><hr>
		
	 <div class="text-center d-none d-md-inline">
        <a class="nav-link" href="../admin_supplier/profile.php?source=edit_profile" >
           	<img class="img-profile rounded-circle" height="30%" width ="30%" src="../img/<?php echo $_SESSION['user_image'] ?>" ><br>
<!--			<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['user_username'] ?></span>-->
        </a>
      </div>


		<div class="text-center">
            <a style="color:black" class="nav-link " href="../includes/logout.php" > 
			<img src="../img/icon/logout.png" width="10%" height="10%">
            <span>Log Keluar</span></a>
		</div>
        
		
		
        <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


   
    </ul>
    <!-- End of Sidebar -->