<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php

      if(isset($_SESSION['user_id'])){
                          
            $user_id = $_SESSION['user_id'];
      }
    
    
    if(isset($_POST['add_product'])){
        
        $product_image       = escape($_FILES['product_image']['name']);
        $product_image_temp  = escape($_FILES['product_image']['tmp_name']);
        $product_name        = escape($_POST['product_name']);
        $product_description = escape($_POST['product_description']);
        $product_type        = escape($_POST['product_type']);
        $product_gred        = escape($_POST['product_gred']);
        $product_quantity    = escape($_POST['product_quantity']);
        $product_price       = escape($_POST['product_price']);

        move_uploaded_file($product_image_temp, "../img/$product_image" );
       
        if(!empty($product_name)  &&  !empty($product_type)  &&  !empty($product_quantity) &&  !empty($product_price) &&  !empty($product_gred )){
                 
            $query = "INSERT INTO product (product_image, product_name, product_description, product_type, product_gred, product_quantity, product_price, product_date_submit, product_supplier    )";
            $query .= "VALUES( '{$product_image}', '{$product_name}', '{$product_description}', '{$product_type}', '{$product_gred}', '{$product_quantity}', '{$product_price}' , now(), '{$user_id}'  )  ";

            $create_post_query  =   mysqli_query($connection, $query);
            confirmQuery($create_post_query);
   
            //to pull out last post created ID
            //$the_post_id = mysqli_insert_id($connection);

            echo "<p class=''>Produk telah berjaya ditambah</p>";
			
			
        }
        else{
            echo "<script>alert('Terdapat kekosongan pada maklumat produk')</script>";
        }
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
            <label for="firstName">Nama produk </label>
            <input type="text" class="form-control" name="product_name" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div> 
          <div class="col-md-6 mb-3">
            <label for="firstName">Deskripsi</label>
            <input type="text" class="form-control" name="product_description" placeholder="" value="" required="Deskripsi">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
			<div class="col-md-6 mb-3">
            <label for="firstName">Jenis produk</label>
            <input type="text" class="form-control" name="product_type" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Gred</label>
            <input type="text" class="form-control" name="product_gred" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Kuantiti (Kg)</label>
            <input type="text" class="form-control" name="product_quantity" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Harga (RM) / Kg</label>
            <input type="text" class="form-control" name="product_price" placeholder="" value="" required="">
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
                <input class="btn btn-primary" type="submit" name="add_product" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
