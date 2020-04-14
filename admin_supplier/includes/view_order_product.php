<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['o_p_id'])){

        $order_product_id = $_GET['o_p_id'];

        $query = "SELECT * FROM order_product WHERE order_id = '{$order_product_id}'     ";

        $select_order_product_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_order_product_query)){

            $order_product 		= escape($row['order_product']);
            $order_quantity 	= escape($row['order_quantity']);
            $order_price 		= escape($row['order_price']);
            $order_transaction 	= escape($row['order_transaction']);
            $order_booking_date = escape($row['order_booking_date']);
            $order_status 		= escape($row['order_status']);
            
        }
    }

?>
                        
   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" align="center">Maklumat tempahan produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="" >
                      <tr>
                           <table class="" align="center">
                            <tr><td align="center"><label for="order_product" ><b>Nama:</b> <?php echo strtoupper("$order_product");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="order_quantity" ><b>Kuantiti:</b> <?php echo strtoupper("$order_quantity");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="order_price" ><b>Harga Bayaran:</b> <?php echo strtoupper("$order_price");  ?>  </label></td></tr>
<!--                            <tr><td align="center"><label for="order_invoice" ><b>Invois:</b> <?php echo strtoupper("$order_transaction");  ?>  </label></td></tr>-->
                            <tr><td align="center"><label for="order_booking_date" ><b>Tarikh Tempahan Dibuat Pada:</b> <?php echo strtoupper("$order_booking_date");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="order_status" ><b>Status:</b> <?php echo strtoupper("$order_status");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
              </div>
            </div>
          </div>