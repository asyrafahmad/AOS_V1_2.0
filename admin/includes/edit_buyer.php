<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['buyer_id'])){

        $user_id = $_GET['buyer_id'];

        $query  =  "SELECT * FROM user WHERE user_id = $user_id ";    
        $select_buyers_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_buyers_query)){
            $user_image     = escape($row['user_image']);
            $user_username  = escape($row['user_username']);
            $user_email     = escape($row['user_email']);
            $user_phone     = escape($row['user_phone']);
        }
    }

    //Update data
    if(isset($_POST['edit_buyer'])){
        
        $user_image         = $_FILES['user_image']['name'];
        $user_image_temp    = $_FILES['user_image']['tmp_name'];
        $user_username      = escape($_POST['user_username']);
        $user_email         = escape($_POST['user_email']);
        $user_phone         = escape($_POST['user_phone']);
        
        move_uploaded_file($user_image_temp,"../img/$user_image" );

        //UPDATE query
        $query = "UPDATE user SET                       ";
        $query .= "user_image       = '{$user_image}',  ";
        $query .= "user_username    = '{$user_username}',   ";
        $query .= "user_email       = '{$user_email}',  ";
        $query .= "user_phone       = '{$user_phone}'   ";
        $query .= "WHERE user_id    =  {$user_id}       ";

        $edit_buyers_query = mysqli_query($connection,$query);
        confirmQuery($edit_buyers_query);
    }

?>



<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">


<!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kemaskini Pemborong/Pembeli</h6>
        </div>
        <div class="card-body">


        <div class="row">
            <div class="col-md-6 mb-3">
                <b for="product_image">Gambar :</b>
                <input type="file"  name="user_image" >
            </div>   
        </div>
        
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama</label>
            <input type="text" class="form-control" name="user_username" placeholder="" value="<?php echo $user_username; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Emel </label>
            <input type="text" class="form-control" name="user_email" placeholder="" value="<?php echo $user_email; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombor Telefon</label>
            <input type="text" class="form-control" name="user_phone" placeholder="" value="<?php echo $user_phone; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
            </div>
        </div>

        <div class="row justify-content-end">
            <div class="form-group mx-2">
               <input class="btn btn-primary" type="submit" name="edit_buyer" value="Kemaskini"> 
            </div>
        </div>


</div>
</div>
</form> 
