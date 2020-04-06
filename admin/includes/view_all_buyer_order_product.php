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
                      <th>Jenis</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Harga (RM) / Kg</th>
<!--                      <th>Invoice</th>-->
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
                      
                        $query  =  "SELECT * FROM buyer_order_product ";    
                        $buyer_order_product_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($buyer_order_product_query)){

                            $b_o_product_id = escape($row['b_o_product_id']);
                            $b_o_product_name = escape($row['b_o_product_name']);
                            $b_o_product_type = escape($row['b_o_product_type']);
                            $b_o_product_price = escape($row['b_o_product_price']);
                            $b_o_product_quantity = escape($row['b_o_product_quantity']);
//                            $b_o_product_invoice = escape($row['b_o_product_invoice']);
                            $b_o_product_total_price = escape($row['b_o_product_total_price']);
                            $b_o_product_booking_date = escape($row['b_o_product_booking_date']);
                            $b_o_product_status = escape($row['b_o_product_status']);
                            
                            //Set as global
                            $_SESSION['b_o_product_id'] = $b_o_product_id;
                            $_SESSION['b_o_product_name'] = $b_o_product_name;
                            
                            echo "<tr>";
                            echo "<td>$b_o_product_id </td>";
                            echo "<td>$b_o_product_name </td>";
                            echo "<td>$b_o_product_type  </td>";
                            echo "<td>$b_o_product_quantity  </td>";
//                            echo "<td>$b_o_product_invoice  </td>";
                            echo "<td>$b_o_product_total_price  </td>";
                            echo "<td>$b_o_product_booking_date  </td>";
                            echo "<td>$b_o_product_status  </td>";
                            
                            echo "<td><a class='btn btn-info' href='buyer.php?source=view_buyer_order_product&b_o_id={$b_o_product_id}'>Lihat Tempahan</a></td>";
                            echo "<td><a href=''>Cetak</a></td>";
                            echo "<td><a href=''>Download</a></td>";
                            echo "</tr>";

                            }
                     ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>