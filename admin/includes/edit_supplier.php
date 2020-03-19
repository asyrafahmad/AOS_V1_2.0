<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['s_id'])){

        $supplier_id = $_GET['s_id'];

        $query  =  "SELECT * FROM supplier WHERE supplier_id = $supplier_id";    
        $select_users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_query)){

          $supplier_image = escape($row['supplier_image']);
          $supplier_name = escape($row['supplier_name']);
          $supplier_email = escape($row['supplier_email']);
          $supplier_phone = escape($row['supplier_phone']);
          $supplier_address = escape($row['supplier_address']);
          $supplier_website = escape($row['supplier_website']);
        }
    }

    //Update data
    if(isset($_POST['update_supplier'])){
        
        $supplier_image = $_FILES['supplier_image']['name'];
        $supplier_image_temp = $_FILES['supplier_image']['tmp_name'];
        $supplier_name = escape($_POST['supplier_name']);
        $supplier_email = escape($_POST['supplier_email']);
        $supplier_phone = escape($_POST['supplier_phone']);
        $supplier_address= escape($_POST['supplier_address']);
        $supplier_website= escape($_POST['supplier_website']);

        //move upload image to the server image file
        move_uploaded_file($supplier_image_temp,"../img/$supplier_image" );

        //UPDATE query
        $query = "UPDATE supplier SET                           ";
        $query .= "supplier_image       = '{$supplier_image}',  ";
        $query .= "supplier_name        = '{$supplier_name}',   ";
        $query .= "supplier_email       = '{$supplier_email}',  ";
        $query .= "supplier_phone       = '{$supplier_phone}',  ";
        $query .= "supplier_address     = '{$supplier_address}',";
        $query .= "supplier_website     = '{$supplier_website}' ";
        $query .= "WHERE supplier_id    =  {$supplier_id}       ";

        $edit_supplier_query = mysqli_query($connection,$query);
        confirmQuery($edit_supplier_query);
    }

?>

<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">

    <div class="container-fluid">
     
      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Ubahsuai Pembeli</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="supplier_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama Petani</label>
            <input type="text" class="form-control" name="supplier_name" placeholder="" value="<?php echo $supplier_name; ?>" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Emel</label>
            <input type="text" class="form-control" name="supplier_email" placeholder="" value="<?php echo $supplier_email; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">No Telefon</label>
            <input type="text" class="form-control" name="supplier_phone" placeholder="" value="<?php echo $supplier_phone; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="supplier_address" placeholder="" value="<?php echo $supplier_address; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Laman Web</label>
            <input type="text" class="form-control" name="supplier_website" placeholder="" value="<?php echo $supplier_website; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
  
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="update_supplier" value="Kemaskini">
        </div>
    </div>
</div>

<!--End of profile content-->
</div> 
</form>   