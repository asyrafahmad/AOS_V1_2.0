<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['p_id'])){

        $product_id = $_GET['p_id'];

        $query  =  "SELECT * FROM product WHERE product_id = $product_id";    
        $select_product_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_product_query)){

//            $product_id = escape($row['product_id']);
//            $product_category = escape($row['product_category']);
//            $product_image = escape($row['product_image']);
//            $product_description = escape($row['product_description']);
//            $product_current_price = escape($row['product_current_price']);
            $product_name = escape($row['product_name']);
            $product_type = escape($row['product_type']);
            $product_gred = escape($row['product_gred']);
            $product_quantity = escape($row['product_quantity']);
            $product_price = escape($row['product_price']);
            
                            
        }
    }

    //Update data
    if(isset($_POST['edit_product'])){
        
        $product_image = $_FILES['product_image']['name'];
        $product_image_temp = $_FILES['product_image']['tmp_name'];
//        $product_category = escape($_POST['product_category']);
        $product_type = escape($_POST['product_type']);
        $product_name = escape($_POST['product_name']);
//        $product_description= escape($_POST['product_description']);
        $product_quantity= escape($_POST['product_quantity']);
        $product_price= escape($_POST['product_price']);
//        $product_current_price= escape($_POST['product_current_price']);

        //move upload image to the server image file
        move_uploaded_file($product_image_temp,"../img/$product_image" );

        //UPDATE query
        $query = "UPDATE product SET                                       ";
        $query .= "product_image            = '{$product_image}',           ";
//        $query .= "product_category         = '{$product_category}',    ";
        $query .= "product_type             = '{$product_type}',            ";
        $query .= "product_name             = '{$product_name}',            ";
//        $query .= "product_description      = '{$product_description}', ";
        $query .= "product_quantity         = '{$product_quantity}',        ";
        $query .= "product_price            = '{$product_price}',           ";
//        $query .= "product_current_price    = '{$product_current_price}',";
        $query .= "product_date_modified    = now()                         ";
        $query .= "WHERE product_id         =  {$product_id}                ";

        $edit_product_query = mysqli_query($connection,$query);
        confirmQuery($edit_product_query);
    }

?>



<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">

  
      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="product_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama produk</label>
            <input type="text" class="form-control" name="product_name" placeholder="" value="<?php echo $product_name; ?>" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div> 
          <div class="col-md-6 mb-3">
            <label for="firstName">Jenis produk</label>
            <input type="text" class="form-control" name="product_type" placeholder="" value="<?php echo $product_type; ?>" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Gred</label>
            <input type="text" class="form-control" name="product_gred" placeholder="" value="<?php echo $product_gred; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Kuantiti (Kg)</label>
            <input type="text" class="form-control" name="product_quantity" placeholder="" value="<?php echo $product_quantity; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Harga (RM) / Kg</label>
            <input type="text" class="form-control" name="product_price" placeholder="" value="<?php echo $product_price; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
<!--
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Harga Semasa (RM) / Kg</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
-->

                      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_product" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
