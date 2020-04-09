<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['e_p_id'])){

        $elodge_product_id = $_GET['e_p_id'];

        $query = "SELECT * FROM elodge_product WHERE elodge_product_id = '{$elodge_product_id}'     ";

        $select_elodge_info_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_elodge_info_query)){

            $elodge_product_image            = escape($row['elodge_product_image']);
            $elodge_product_name             = escape($row['elodge_product_name']);
            $elodge_product_quantity         = escape($row['elodge_product_quantity']);
            $elodge_product_harvest_date     = escape($row['elodge_product_harvest_date']);
            $elodge_product_amount_booked    = escape($row['elodge_product_amount_booked']);
            $elodge_product_status           = escape($row['elodge_product_status']);
        }
    }

?>
                        
   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" align="center">Maklumat E-Lodge produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="" >
                      <tr>
                           <table class="" align="center">
                            <tr><td><label for="elodge_product_image" ><?php echo "<a><img style='height:200px;' src='../img/$elodge_product_image' alt=''></a>";?> </label></td></tr>
                            <tr><td align="center"><label for="elodge_product_name" ><b>Nama Produk:</b> <?php echo strtoupper("$elodge_product_name");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="elodge_product_quantity" ><b>Kuantiti:</b> <?php echo strtoupper("$elodge_product_quantity");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="elodge_product_harvest_date" ><b>Tarikh Menuai Pada:</b> <?php echo strtoupper("$elodge_product_harvest_date");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="elodge_product_amount_booked" ><b>Jumlah Tempahan:</b> <?php echo strtoupper("$elodge_product_amount_booked");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="elodge_product_status" ><b>Status:</b> <?php echo strtoupper("$elodge_product_status");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>