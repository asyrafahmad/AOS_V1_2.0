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
					  
					  	if($_SESSION['buyer_id']){
							
							$buyer_id = $_SESSION['buyer_id'];
						}
                        else{
                            
                        }
                      
                        $query  =  "SELECT * FROM payment_product_history WHERE products_id = '{$buyer_id}' ";    
                        $buyer_order_history_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($buyer_order_history_query)){

                            $payment_id 			= escape($row['payment_id']);
                            $payment_order_id    	= escape($row['payment_order_id']);
                            $payment_status 		= escape($row['payment_status']);
                            $payment_price 		    = escape($row['payment_price']);
                            $payment_date           = escape($row['payment_date']);
                            
                            echo "<tr>";
                            echo "<td>$payment_id </td>";
                            echo "<td>$payment_order_id </td>";
                            echo "<td>$payment_status  </td>";
                            echo "<td>RM$payment_price  </td>";
                            echo "<td>$payment_date  </td>";
                            echo "</tr>";

                            }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>