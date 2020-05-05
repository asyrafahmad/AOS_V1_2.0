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
          
              
              
              
              
              
               <script>
                  
                $(document).ready(function(){
                    
                    load_data();

                    function load_data(query)
                    {
                        $.ajax({
                            url:"includes/view_all_record_supplier_product.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_all_record_supplier_product').html(data);
                            }
                        });
                    }
                    
                    $('#search_supplier_products').keyup(function()
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
                   
                   
                   
                   $(document).ready(function(){
                    
                    load_data();

                    function load_data(query)
                    {
                        $.ajax({
                            url:"includes/view_all_products.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_all_products').html(data);
                            }
                        });
                    }
                    
                    $('#search_all_products').keyup(function()
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
//                            include "includes/view_all_record_supplier_product.php";
                            
                            
                          if(isset($_GET['page'])){
                             $_SESSION['page'] = $_GET['page'];
                          }
                          else{
                             $page = "";
                          } 
                            
                          if(isset($_GET['payment_status_id'])){
                             $_SESSION['payment_status_id'] = $_GET['payment_status_id'];
                          }
                          else{
                             $page = "";
                          }    
                            
                          echo "<div class='card-title justify-content-end align-middle'>";
                          echo "<div id='search_area' class='form-group has-search'>";
                          echo "<span class='fa fa-search form-control-feedback'></span>";
                          echo "<input type='text' name='search_supplier_products' id='search_supplier_products' placeholder='' class='form-control' />";
                          echo "</div>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                          echo "<div id='view_all_record_supplier_product'></div>";       //Search data purposes
                          echo "</div>";
                          break;

                        case '200';
                            echo "NICE 200";
                            break;

                        default:
//                            include "includes/view_all_products.php";
                            
                            if(isset($_GET['page'])){
                                $_SESSION['page'] = $_GET['page'];
                            }
                            else{
                                $page = "";
                            }
                    
                            echo "<div class='card-title justify-content-end align-middle'>";
                            echo "<div id='search_area' class='form-group has-search'>";
                            echo "<span class='fa fa-search form-control-feedback'></span>";
                            echo "<input type='text' name='search_all_products' id='search_all_products' placeholder='' class='form-control' />";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='card-body'>";
                            echo "<div id='view_all_products'></div>";     
                            echo "</div>";
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