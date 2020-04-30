
<style type="text/css">
  /*Testing*/
nav{
  display: flex-column;
  justify-content: space-between;
  height:100%;
  background:pink;
  width: 270px;
  position: fixed;
  overflow-y: auto;
}

nav::-webkit-scrollbar {
    width: 0px;
}

nav ul{
  display: flex;
  background:red;
}

nav ul{
  display: block;
}


</style>



<nav>
<!--   <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">
  <div class="p-2 bd-highlight">Flex item</div>
  <div class="p-2 bd-highlight">Flex item</div>
  <div class="mt-auto p-2 bd-highlight">Flex item</div>
  <div class="mt-auto p-2 bd-highlight">Flex item</div>
</div> -->
  <ul class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">
    <ul>
      <li><a href="">Dashboard</a></li>
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
                          <li id="view_all_buyer_order_product">
                              <a href="product.php?source=view_all_record_supplier_product" class="nav-link">Rekod Produk</a>
                          </li>
                          <li id="e_lodge">
                              <a href="supplier.php?source=view_elodge_supplier" class="nav-link">Senarai Produk E-Lodge</a>
                          </li>
                      </ul>
                  </li>
      <li><a href="">Pemborong</a></li>
    </ul>
    <div class="mt-auto p-2 bd-highlight">
      <li><a href="">heyy</a></li>
      <li><a href="">Petani</a></li>
      <li><a href="">Pemborong</a></li>
    </div>
  </ul>

</nav>



  
  
  



