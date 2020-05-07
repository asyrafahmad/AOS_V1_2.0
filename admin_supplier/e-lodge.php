<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/supplier_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">E-Lodge</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

     <div class="col-xl-12">
        <div class="card p-4 border">
         
            <script>
                  
                $(document).ready(function(){
                    
                    load_data();

                    function load_data(query)
                    {
                        $.ajax({
                            url:"includes/view_all_elodge_products.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_all_elodge_products').html(data);
                            }
                        });
                    }
                    
                    $('#search_all_elodge_products').keyup(function()
                    {
                        var search = $(this).val();
                        
                        if(search != '')
                        {
                            load_data(search);
                        }
                        else
                        {
                            load_data();
                        }
                    });
                });
                
            </script> 
        
             <?php

            if(isset($_GET['source'])){
                $source = $_GET['source'];
            } 
            else {
                $source = '';
            }

            switch($source) {
                    
                case 'add_elodge';
                    include "includes/add_elodge.php";
                    break;
                
                case 'view_elodge';
                    include "includes/view_elodge.php";
                    break;
                
                case 'edit_elodge';
                    include "includes/edit_elodge.php";
                    break;

                case '200';
                    echo "NICE 200";
                    break;

                default:
//                    include "includes/view_all_elodge_products.php";
                    
                    echo "<div class='card-title justify-content-end align-middle'>";
                    echo "<div id='search_area' class='form-group has-search'>";
                    echo "<span class='fa fa-search form-control-feedback'></span>";
                    echo "<input type='text' name='search_all_elodge_products' id='search_all_elodge_products' placeholder='' class='form-control' />";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='card-body'>";
                    echo "<div id='view_all_elodge_products'></div>";
                    echo "</div>";
                    break;
            }

        ?>          
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