<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['supplier_id'])){

        $user_id = $_GET['supplier_id'];

        $query  =  "SELECT * FROM user WHERE user_id = $user_id";    
        $select_users_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_users_query)){

          $user_image = escape($row['user_image']);
          $user_username = escape($row['user_username']);
          $user_email = escape($row['user_email']);
          $user_phone = escape($row['user_phone']);
          $user_address = escape($row['user_address']);
          $user_website = escape($row['user_website']);
        }
    }



    //Update data
    if(isset($_POST['update_supplier'])){
        
        $user_image         = $_FILES['user_image']['name'];
        $user_image_temp    = $_FILES['user_image']['tmp_name'];
        $user_username      = escape($_POST['user_username']);
        $user_email         = escape($_POST['user_email']);
        $user_phone         = escape($_POST['user_phone']);
        $user_address       = escape($_POST['user_address']);
        $user_website       = escape($_POST['user_website']);

        //move upload image to the server image file
        move_uploaded_file($user_image_temp,"../img/$user_image" );

        //UPDATE query
        $query = "UPDATE user SET                           ";
        $query .= "user_image       = '{$user_image}',  ";
        $query .= "user_username    = '{$user_username}',   ";
        $query .= "user_email       = '{$user_email}',  ";
        $query .= "user_phone       = '{$user_phone}',  ";
        $query .= "user_address     = '{$user_address}',";
        $query .= "user_website     = '{$user_website}' ";
        $query .= "WHERE user_id    =  {$user_id}       ";

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
          <h6 class="m-0 font-weight-bold text-primary">Ubahsuai Pembekal</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <img width="100" src="../../img/icon/<?php echo $user_image; ?>" >
            <input type="file" name="user_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama Petani</label>
            <input type="text" class="form-control" name="user_username" placeholder="" value="<?php echo $user_username; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Emel</label>
            <input type="text" class="form-control" name="user_email" placeholder="" value="<?php echo $user_email; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">No Telefon</label>
            <input type="text" class="form-control" name="user_phone" placeholder="" value="<?php echo $user_phone; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="user_address" placeholder="" value="<?php echo $user_address; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Laman Web</label>
            <input type="text" class="form-control" name="user_website" placeholder="" value="<?php echo $user_website; ?>" required="">
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