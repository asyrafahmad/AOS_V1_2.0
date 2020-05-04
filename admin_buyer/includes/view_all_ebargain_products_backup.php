<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
       
          <div class="card-title justify-content-end align-middle">
            <div id="search" class="form-group has-search">
              <span class="fa fa-search form-control-feedback"></span>
              <input type="text" name="search_ebargain" id="search_ebargain" placeholder="Search" class="form-control" />
           </div>
          </div>
              


<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              
        
            <div class="card-header py-2">
                <div class="row">
                  <div class="col-md-12" align="right">
                     <div align="right"><a class='btn btn-success' href='e-bargain.php?source=add_ebargain'>+ Produk </a></div>
                  </div>
                </div>
            </div>
              
              
              
              
                   
            <script>
                  
                $(document).ready(function(){
                    
                    load_data();

                    function load_data(query)
                    {
                        $.ajax({
                            url:"view_all_ebargain_products.php",
                            method:"POST",
                            data:{query:query},
                            success:function(data)
                            {
                            $('#view_all_ebargain_products').html(data);
                            }
                        });
                    }
                    
                    $('#search_ebargain').keyup(function()
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
              <div class="table-responsive">
                  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

<!--                      <th>ID</th>-->
                      <th>Nama Produk</th>
                      <th>Kuantiti</th>
                      <th>Dijangka Terima Bulan</th>
                      <th>Tarikh Permintaan</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                          if(isset($_SESSION['user_username'])){
                          
                                $user_username = $_SESSION['user_username'];
                            }
                    
                          
                        $query  =  "SELECT * FROM ebargain_product WHERE ebargain_buyer_name = '{$user_username}' ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $ebargain_product_name            = escape($row['ebargain_product_name']);
                            $ebargain_product_quantity        = escape($row['ebargain_product_quantity']);
                            $ebargain_product_month           = escape($row['ebargain_product_month']);
                            $ebargain_product_date_requested  = escape($row['ebargain_product_date_requested']);

                            echo "<tr>";
                            echo "<td>$ebargain_product_name  </td>";
                            echo "<td>$ebargain_product_quantity  </td>";
                            echo "<td>$ebargain_product_month  </td>";
                            echo "<td>$ebargain_product_date_requested </td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>