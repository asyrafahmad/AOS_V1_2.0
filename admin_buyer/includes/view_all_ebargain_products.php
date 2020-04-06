<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk</h1>
          <p class="mb-4">Produk Petani. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              
        
            <div class="card-header py-2">
                <div class="row">
                  <div class="col-md-6">
                     <h6 class="m-2 font-weight-bold text-primary">Senarai E-Bargain Produk</h6>
                  </div>
                  <div class="col-md-6" align="center">
                     <div align="right"><a class='btn btn-success' href='e-bargain.php?source=add_ebargain'>+ Produk </a></div>
                  </div>
                </div>
            </div>
              
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