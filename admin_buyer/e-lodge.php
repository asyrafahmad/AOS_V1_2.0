<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/buyer_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="row d-sm-flex align-items-center justify-content-between m-4">
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
                            url:"includes/view_book_elodge_product.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_book_elodge_product').html(data);
                            }
                        });
                    }
                    
                    $('#search_elodge_product').keyup(function()
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
                    
                    case 'book_elodge_product';
                        include "includes/book_elodge_product.php";
                        break; 
                    
                    case 'view_book_elodge_product';
//                        include "includes/view_book_elodge_product.php";
                        
                        echo "<div class='card-title justify-content-end align-middle'>";
                        echo "<div id='search_area' class='form-group has-search'>";
                        echo "<span class='fa fa-search form-control-feedback'></span>";
                        echo "<input type='text' name='search_elodge_product' id='search_elodge_product' placeholder='' class='form-control' />";
                        echo "</div>";
                        echo "</div>";
                        echo "<div class='card-body'>";
                        echo "<div id='view_book_elodge_product'></div>";       //Search data purposes
                        echo "</div>";
                        break;

                    case '200';
                        echo "NICE 200";
                        break;

                    default:
                        include "includes/view_all_elodge_products.php";
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


<?php  include "../includes/admin_footer.php"; ?>