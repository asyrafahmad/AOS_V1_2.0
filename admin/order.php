<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/admin_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Sejarah Pesanan</h1>
      <div class="col-xl-1" align="center">
          <div class="card shadow py-2 ">
          <a href="order.php?menu=<?php echo $menu; ?>"><img height="32" width="32" src="../img/icon/add-to-cart.png" ></a>
          </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

     <div class="col-xl-12">
        <div class="card p-4 border">
          <div class="card-title justify-content-between align-middle">
            <div id="search" class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" class="form-control" placeholder="Search">
           </div>
          </div>
            <div class="card-body">
            <?php

                        if(isset($_GET['source'])){
                            $source = $_GET['source'];
                        } 
                        else {
                            $source = '';
                        }

                        switch($source) {
                                
                            case 'view_product';
                                include "includes/view_product.php";
                                break;    

                            case '200';
                                echo "NICE 200";
                                break;

                            default:
                                include "includes/view_all_buyer_order_product.php";
                                break;
                        }

                    ?>              
            </div>
        </div>
      </div>

    </div>


 

    </div>
      
      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agro Online System 2020 - Ver1.0</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  </div>


</div>


<?php  include "../includes/admin_footer.php"; ?>