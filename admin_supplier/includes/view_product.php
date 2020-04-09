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

            $product_id = escape($row['product_id']);
            $product_category = escape($row['product_category']);
            $product_image = escape($row['product_image']);
            $product_description = escape($row['product_description']);
            $product_current_price  = escape($row['product_current_price']);
            $product_name       = escape($row['product_name']);
            $product_type       = escape($row['product_type']);
            $product_gred       = escape($row['product_gred']);
            $product_quantity   = escape($row['product_quantity']);
            $product_price      = escape($row['product_price']);
            
        }
    }

	if(isset($_GET['delete'])){
		
		$product_id = $_GET['delete'];
		
		$query = "DELETE FROM product WHERE product_id = '{$product_id}'	";
		$delete_product_query = mysqli_query($connection,$query);
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
                            <tr><td><label for="product_image" ><?php echo "<a><img style='height:200px;' src='../img/$product_image' alt=''></a>";?> </label></td></tr>
                            <tr><td align="center"><label for="product_type" ><b>Jenis: </b><?php echo strtoupper("$product_type");  ?> </label></td></tr>
                            <tr><td align="center"><label for="product_name" ><b>Name: </b><?php echo strtoupper("$product_name");  ?>   </label></td></tr>
                            <tr><td align="center"><label for="product_gred" ><b>Gred: </b><?php echo strtoupper("$product_gred");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="product_quantity" ><b>Kuantiti:</b> <?php echo strtoupper("$product_quantity");  ?>  </label></td></tr>
                            <tr><td align="center"><label for="product_price" ><b>Harga:</b> RM<?php echo strtoupper("$product_price");  ?>  </label></td></tr>
                            <tr><td><label for="product_description" ><b>Deskripsi: </b> <?php echo strtoupper("$product_description");  ?>  </label></td></tr>
							<tr><td align="center"><a class="btn btn-danger" onClick="" href="product.php?delete={$product_id}">Padam </a></td></tr>
<!--
                            <tr><td><label for="product_category" > <?php echo strtoupper("$product_category");  ?>  </label></td></tr>
                            <tr><td><label for="product_current_price" > <?php echo strtoupper("$product_current_price");  ?>  </label></td></tr>
-->
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>