<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3" align="center">
              <h6 class="m-0 font-weight-bold text-primary">Sejarah Pembelian</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Resit</th>
                      <th>Status</th>
                      <th>Jumlah Bayaran</th>
                      <th>Tarikh Pembelian Dibuat</th>
<!--
                      <th>Nama Produk</th>
                      <th>Gred</th>
                      <th>Kuantiti (Kg)</th>
-->
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
					  
					  	if(isset($_GET['buyer_id'])){
							
							$buyer_id = $_GET['buyer_id'];
						}
                      
                        $query  =  "SELECT * FROM order_product_history WHERE buyer_id = '{$buyer_id}' ";    
                        $buyer_order_history_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($buyer_order_history_query)){

                            $order_id 			= escape($row['order_id']);
                            $order_product_id 	= escape($row['order_product_id']);
                            $order_status 		= escape($row['order_status']);
                            $order_payment 		= escape($row['order_payment']);
                            $order_date_payment = escape($row['order_date_payment']);
                            
                            echo "<tr>";
                            echo "<td>$order_id </td>";
                            echo "<td>$order_product_id </td>";
                            echo "<td>$order_status  </td>";
                            echo "<td>RM$order_payment  </td>";
                            echo "<td>$order_date_payment  </td>";
                            echo "</tr>";

                            }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>