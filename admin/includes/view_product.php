<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['p_id'])){

        $product_id = $_GET['p_id'];

        $query = "SELECT * FROM product WHERE product_id = '{$product_id}'     ";

        $select_product_info_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_product_info_query)){

            $product_category = escape($row['product_category']);
            $product_type = escape($row['product_type']);
            $product_image = escape($row['product_image']);
            $product_name = escape($row['product_name']);
            $product_gred = escape($row['product_gred']);
            $product_description = escape($row['product_description']);
            $product_quantity = escape($row['product_quantity']);
            $product_price = escape($row['product_price']);
            $product_current_price = escape($row['product_current_price']);
                            
            
            
        }
    }

?>
                        
   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" align="center">Maklumat produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="" >
                      <tr>
                           <table class="" align="center">
                            <tr><td><img height="50%" width="50%"  src="../img/<?php echo $product_image;  ?>"  alt="image" ></td></tr>
                            <tr><td><h3><b><p for="product_name" ><?php echo strtoupper("$product_name");  ?>  </b></h3></td></tr>
                            <tr><td><p for="product_category" > <?php echo strtoupper("$product_category");  ?>  </p></td></tr>
                            <tr><td><p for="product_gred" > <?php echo strtoupper("$product_gred");  ?>  </p></td></tr>
                            <tr><td><p for="product_description" > <?php echo strtoupper("$product_description");  ?>  </p></td></tr>
                            <tr><td><p for="product_current_price" > <?php echo strtoupper("$product_current_price");  ?>  </p></td></tr>
                            <tr><td><p for="product_price" > <?php echo strtoupper("$product_price");  ?>  </p></td></tr>
                            <tr><td><p for="product_current_price" >  </p></td></tr>
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>