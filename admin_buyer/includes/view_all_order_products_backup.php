
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pesanan Barangan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Invoice#</th>
                      <th>Bayaran</th>
                      <th>Tarikh Transaksi Dibuat</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                    <?php
					  
					    if(isset($_SESSION['user_username'])){
		
							$user_username = $_SESSION['user_username'];
						}
					  

                        $query  =  "SELECT * FROM payment_product_history WHERE payment_supplier_name = '{$user_username}'	";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $payment_invoice     = escape($row['payment_invoice']);
                            $payment_price       = escape($row['payment_price']);
                            $payment_order_date        = escape($row['payment_order_date']);
                            $payment_status      = escape($row['payment_status']);
                           
                            
                            echo "<tr>";
                            echo "<td>#$payment_invoice  </td>";
                            echo "<td>$payment_price  </td>";
                            echo "<td>$payment_order_date  </td>";
                            echo "<td>$payment_status  </td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>