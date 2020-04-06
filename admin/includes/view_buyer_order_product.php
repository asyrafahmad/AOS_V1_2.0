<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['b_o_id'])){

        $b_o_product_id = $_GET['b_o_id'];

        $query = "SELECT * FROM buyer_order_product WHERE b_o_product_id = '{$b_o_product_id}'     ";

        $select_buyer_order_product_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_buyer_order_product_query)){

            $b_o_product_id = escape($row['b_o_product_id']);
            $b_o_product_name = escape($row['b_o_product_name']);
            $b_o_product_type = escape($row['b_o_product_type']);
            $b_o_product_price = escape($row['b_o_product_price']);
            $b_o_product_quantity = escape($row['b_o_product_quantity']);
//            $b_o_product_invoice = escape($row['b_o_product_invoice']);
            $b_o_product_total_price = escape($row['b_o_product_total_price']);
            $b_o_product_booking_date = escape($row['b_o_product_booking_date']);
            $b_o_product_status = escape($row['b_o_product_status']);
            
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
                            <tr><td><label for="b_o_product_name" > <?php echo strtoupper("$b_o_product_name");  ?>  </label></td></tr>
                            <tr><td><label for="b_o_product_type" > <?php echo strtoupper("$b_o_product_type");  ?>  </label></td></tr>
                            <tr><td><label for="b_o_product_quantity" > <?php echo strtoupper("$b_o_product_price");  ?>  </label></td></tr>
                            <tr><td><label for="b_o_product_price" > <?php echo strtoupper("$b_o_product_price");  ?>  </label></td></tr>
                            <tr><td><label for="b_o_product_booking_date" > <?php echo strtoupper("$b_o_product_booking_date");  ?>  </label></td></tr>
                            <tr><td><label for="b_o_product_status" > <?php echo strtoupper("$b_o_product_status");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
              </div>
            </div>
          </div>