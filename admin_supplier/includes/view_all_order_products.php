<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pesanan Produk</h1>
          <p class="mb-4">Pesanan Produk. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tempahan Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tempahan ID</th>
                      <th>Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Harga (RM) / Kg</th>
                      <th>Invoice</th>
                      <th>Tarikh Tempahan</th>
                      <th>Status</th>
                      <th>Lihat Tempahan</th>
                      <th>Cetak</th>
                      <th>Muat Turun</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                      
                        $query  =  "SELECT * FROM order_product ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $order_id = escape($row['order_id']);
                            $order_product = escape($row['order_product']);
                            $order_quantity = escape($row['order_quantity']);
                            $order_price = escape($row['order_price']);
                            $order_invoice = escape($row['order_invoice']);
                            $order_booking_date = escape($row['order_booking_date']);
                            $order_status = escape($row['order_status']);
                            
                            //Set as global
                            $_SESSION['order_id'] = $order_id;
                            $_SESSION['order_product'] = $order_product;
                            
                            echo "<tr>";
                            echo "<td>$order_id </td>";
                            echo "<td>$order_product </td>";
                            echo "<td>$order_quantity  </td>";
                            echo "<td>$order_price  </td>";
                            echo "<td>$order_invoice  </td>";
                            echo "<td>$order_booking_date  </td>";
                            echo "<td>$order_status  </td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td><a class='btn btn-info' href='order.php?source=view_order_product&o_p_id={$order_id}'>Lihat Tempahan</a></td>";
                            echo "<td><a href=''>Cetak</a></td>";
                            echo "<td><a href=''>Download</a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='users.php?delete={$user_id} '>Padam </a></td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>