<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/admin_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
      <div class="d-sm-flex align-items-center justify-content-between m-4">
        <h1 class="h3 mb-0 text-gray-800">Produk</h1>
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
                            
                        case 'add_product';
                            include "includes/add_product.php";
                            break;
                        
                        case 'view_product';
                            include "includes/view_product.php";
                            break;
                        
                        case 'edit_product';
                            include "includes/edit_product.php";
                            break;
                        
                        case 'product_category';
                            include "includes/product_category.php";
                            break;
                        
                        case 'view_all_record_supplier_product';
                            include "includes/view_all_record_supplier_product.php";
                            break;

                        case '200';
                            echo "NICE 200";
                            break;

                        default:
                            include "includes/view_all_products.php";
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