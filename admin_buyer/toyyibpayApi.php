
<?php  include "../includes/admin_header.php"; ?>


  <!-- Page Wrapper -->
  <div id="wrapper">
     
        
   <?php  include "includes/buyer_sidebar_navigation.php"; ?>



    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

     

          <!-- Top nav-->
            <?php  include "includes/buyer_topbar_navigation.php"; ?>

        
           



        <!-- Begin Page Content -->
        <div class="container-fluid">

          
        <?php

            if(isset($_GET['source'])){
                $source = $_GET['source'];
            } 
            else {
                $source = '';
            }

            switch($source) {
                    
                case 'createBill';
                    include "includes/createBill.php";
                    break;
				
				case 'thankyou';
                    include "includes/thankyou.php";
                    break;    
                    
                case 'view_all_order_products';
                    include "includes/view_all_order_products.php";
                    break;
                
                case 'view_all_elodge_order_products';
                    include "includes/view_all_elodge_order_products.php";
                    break;
                
                case 'status_order_product';
                    include "includes/status_order_product.php";
                    break;
                
                case 'store_into_db';
                    include "includes/store_into_db.php";
                    break;

                case '200';
                    echo "NICE 200";
                    break;

                default:
                    include "includes/view_order_product.php";
                    break;
            }

        ?>

 
        </div>
        <!-- /.container-fluid -->

          
          
          
          
          
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agro Online System 2020 - Ver1.0</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

<?php  include "../includes/admin_footer.php"; ?>
