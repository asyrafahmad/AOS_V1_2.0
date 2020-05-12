<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/admin_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Pemborong</h1>
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
                            url:"includes/view_all_buyers.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_all_buyers').html(data);
                            }
                        });
                    }
                    
                    $('#search_buyer').keyup(function()
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
                          
                      case 'add_buyer';
                          include "includes/add_buyer.php";
                          break; 

                      case 'edit_buyer';
                          include "includes/edit_buyer.php";
                          break;
                      
                      case 'view_buyer';
                          include "includes/view_buyer.php";
                          break; 
                      
                      case 'view_buyer_history';
                          
                          if(isset($_GET['buyer_id'])){
							
							$_SESSION['buyer_id'] = $_GET['buyer_id'];
						  }
                          else{
                              
                          }
                          
                          include "includes/view_buyer_history.php";
                          break;
                      
                      case 'view_buyer_order_product';
                          include "includes/view_buyer_order_product.php";
                          break;
                      
                      case 'view_all_buyer_order_product';
                          include "includes/view_all_buyer_order_product.php";
                          break;

                      case '200';
                          echo "NICE 200";
                          break;

                      default:
//                          include "includes/view_all_buyers.php";
                          
                           if(isset($_GET['b_page'])){
                                $_SESSION['b_page'] = $_GET['b_page'];
                            }
                            else{
                                $page = "";
                            }
                          
                          echo "<div class='card-title justify-content-end align-middle'>";
                          echo "<div id='search_area' class='form-group has-search'>";
                          echo "<span class='fa fa-search form-control-feedback'></span>";
                          echo "<input type='text' name='search_buyer' id='search_buyer' placeholder='Search' class='form-control' />";
                          echo "</div>";
                          echo "</div>";
                          echo "<div class='card-body'>";
                          echo "<div id='view_all_buyers'></div>";       //Search data purposes
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


<?php  include "../includes/admin_footer.php"; ?>