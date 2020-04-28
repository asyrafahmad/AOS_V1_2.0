
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
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
<!--                      <th>Tempahan ID</th>-->
                      <th>Invoice#</th>
                      <th>Bayaran</th>
                      <th>Tarikh Transaksi Dibuat</th>
                      <th>Status</th>
<!--                      <th>Lihat Tempahan</th>-->
<!--
                      <th>Cetak</th>
                      <th>Muat Turun</th>
-->
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
					  
					    if(isset($_SESSION['user_id'])){
		
							$user_id = $_SESSION['user_id'];
						}
					  

                        $query  =  "SELECT * FROM order_product_history WHERE buyer_id = '{$user_id}'	";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $order_id = escape($row['order_id']);
                            $order_product_id = escape($row['order_product_id']);
                            $order_billcode = escape($row['order_billcode']);
                            $order_status = escape($row['order_status']);
                            $order_payment = escape($row['order_payment']);
                            $order_date_payment = escape($row['order_date_payment']);
                           
                            
                            echo "<tr>";
                            echo "<td>#$order_product_id  </td>";
                            echo "<td>RM$order_payment  </td>";
                            echo "<td>$order_date_payment  </td>";
                            echo "<td>$order_status  </td>";
//                            echo "<td><a class='btn btn-info' href='order.php?menu=$menu&source=view_product&o_p_id={$order_id}'>Lihat Tempahan</a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='users.php?delete={$user_id} '>Padam </a></td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>