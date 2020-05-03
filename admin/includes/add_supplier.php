<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php
    
    if(isset($_POST['add_supplier'])){
                
        $user_image         = escape($_FILES['user_image']['name']);
        $user_image_temp    = escape($_FILES['user_image']['tmp_name']);
        $user_username      = escape($_POST['user_username']);
        $user_email         = escape($_POST['user_email']);
        $user_phone         = escape($_POST['user_phone']);
        $user_address       = escape($_POST['user_address']);
        $user_state         = escape($_POST['user_state']);
        $user_website       = escape($_POST['user_website']);

        move_uploaded_file($user_image_temp, "../img/$user_image" );
       
        if(!empty($user_username)  &&  !empty($user_email)  &&  !empty($user_phone) &&  !empty($user_address)&&  !empty($user_state)){
                 
            $query = "INSERT INTO user(user_image, user_username, user_email, user_phone, user_address, user_state, user_website, user_date_register, user_role )  ";
            $query .= "VALUES('{$user_image}', '{$user_username}', '{$user_email}', '{$user_phone}', '{$user_address}', '{$user_state}', '{$user_website}', now(), 2)  ";

            $create_supplier_query  =   mysqli_query($connection, $query);

            // function
            confirmQuery($create_supplier_query);
   
            //to pull out last post created ID
            //$the_post_id = mysqli_insert_id($connection);

            echo "<p class=''>Petani berjaya ditambah </p>";
        }
        else{
            echo "<script>alert('Sila isi di ruangan kosong')</script>";
        }
    }
?>
    


<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">


      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Petani</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="user_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama Petani</label>
            <input type="text" class="form-control" name="user_username" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Email</label>
            <input type="text" class="form-control" name="user_email" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">No Telefon</label>
            <input type="text" class="form-control" name="user_phone" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
           <div class="col-md-6 mb-3">
            <label for="firstName">Laman Web</label>
            <input type="text" class="form-control" name="user_website" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="lastName">Negeri</label>
            <input type="text" class="form-control" name="user_state" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
            <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="user_address" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>  
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_supplier" value="Hantar">
        </div>
  
</div>

<!--End of profile content-->
</div> 
          
          
</form> 