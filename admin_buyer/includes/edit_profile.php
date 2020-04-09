
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

<?php
	
	if(isset($_SESSION['user_username'])){
		
		$user_username = $_SESSION['user_username'];
	}

        global $connection;

        $query  =  "SELECT * FROM user WHERE user_role = '3' AND user_username = '{$user_username}'";    
        $select_buyer = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_buyer)){

            
            $user_id = escape($row['user_id']);
            $user_image = escape($row['user_image']);
            $user_username = escape($row['user_username']);
            $user_email = escape($row['user_email']);
            $user_phone = escape($row['user_phone']);
            $user_state = escape($row['user_state']);
            $user_address = escape($row['user_address']);
            $user_website = escape($row['user_website']);
                             
        }
    
         $_SESSION['user_phone'] = $user_phone;
         $_SESSION['user_email'] = $user_email;
    
    if(isset($_POST['edit_buyer_profile'])){
        
        $buyer_image       = escape($_FILES['buyer_image']['name']);
        $buyer_image_temp  = escape($_FILES['buyer_image']['tmp_name']);
        $buyer_name        = escape($_POST['buyer_name']);
        $buyer_phone       = escape($_POST['buyer_phone']);
        $buyer_email       = escape($_POST['buyer_email']);
        $buyer_website     = escape($_POST['buyer_website']);
        $buyer_state       = escape($_POST['buyer_state']);
        $buyer_address     = escape($_POST['buyer_address']);

        move_uploaded_file($buyer_image_temp,"../img/$buyer_image" );

        //UPDATE query
        $query = "UPDATE buyer SET                               ";
        $query .= "buyer_image        = '{$buyer_image}',     ";
        $query .= "buyer_name         = '{$buyer_name}',      ";
        $query .= "buyer_phone        = '{$buyer_phone}',     ";
        $query .= "buyer_email        = '{$buyer_email}',     ";
        $query .= "buyer_website      = '{$buyer_website}',   ";
        $query .= "buyer_state        = '{$buyer_state}',     ";
        $query .= "buyer_address      = '{$buyer_address}'    ";
        $query .= "WHERE buyer_id     =  {$buyer_id}          ";

        $edit_buyer_query = mysqli_query($connection,$query);
        confirmQuery($edit_buyer_query);
    }
?>  


<!-- enctype is   -->
     <form action="" method="post" enctype="multipart/form-data">
    
        <div class="container-fluid">

          <!-- Starting of profile content-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Maklumat Pengguna</h6>
            </div>
            <div class="card-body">

        <div class="row">
            
            <div class="col-md-6 mb-3">
                 <b for="product_image">Gambar :</b>
                <input type="file"  name="buyer_image">
            </div>
                </div>
                 <div class="row">
            
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama</label>
            <input type="text" class="form-control" name="supplier_name" placeholder="<?php echo $user_username ?>" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Nombor Telefon</label>
            <input type="text" class="form-control" name="supplier_phone" placeholder="<?php echo $user_phone ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
            
        <div class="col-md-6 mb-3">
            <label for="lastName">Emel</label>
            <input type="text" class="form-control" name="supplier_email" placeholder="<?php echo $user_email ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
           <div class="col-md-6 mb-3">
            <label for="lastName">Website</label>
            <input type="text" class="form-control" name="supplier_website" placeholder="<?php echo $user_website ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
            <div class="col-md-6 mb-3">
            <label for="lastName">Negeri</label>
            <input type="text" class="form-control" name="supplier_state" placeholder="<?php echo $user_state ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="supplier_address" placeholder="<?php echo $user_address ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
            
        
                     
        </div>
      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_buyer_profile" value="Kemaskini">
        </div>
  
                  
                </div>
                </div>

          <!--End of profile content-->
           </div> 
     </form> 

       