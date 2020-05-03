<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php

    if(isset($_SESSION['user_username'])){

            $user_username = $_SESSION['user_username'];
    }

    global $connection;

	$query  =  "SELECT * FROM user WHERE user_role = '1' AND user_username= '{$user_username}' ";    
	$select_user = mysqli_query($connection, $query);

	while ($row = mysqli_fetch_assoc($select_user)){

		$user_id = escape($row['user_id']);
		$user_password = escape($row['user_password']);
		$user_image = escape($row['user_image']);

	}

 	if(isset($_POST['edit_user_profile'])){
        
        $_SESSION['user_image'] = null;
        
        $user_image       = escape($_FILES['user_image']['name']);
        $user_image_temp  = escape($_FILES['user_image']['tmp_name']);
        $user_password    = escape($_POST['user_password']);
        
        if(empty($user_image)){
            
            $query  =  "SELECT user_image FROM user WHERE  user_username = '{$user_username}' ";    
            $get_picture = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($get_picture)){

                $user_image = escape($row['user_image']);
            }
        }
        
        $_SESSION['user_username']  = $user_username;
        $_SESSION['user_image']     = $user_image;
        
        move_uploaded_file($user_image_temp,"../img/$user_image" );

        //UPDATE query
        $query = "UPDATE user SET                               ";
        $query .= "user_image        = '{$user_image}',     ";
        $query .= "user_password     = '{$user_password}'      ";
        $query .= "WHERE user_id     =  {$user_id}          ";

        $edit_user_query = mysqli_query($connection,$query);
        confirmQuery($edit_user_query);
        
        echo "<p class=''>Profil berjaya dikemaskini.</p>";
        echo "<script>window.location='./profile.php?menu=$menu'</script>";
    }


?>  


<!-- enctype is   -->
     <form action="" method="post" enctype="multipart/form-data">
    
          <!-- Starting of profile content-->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kemaskini Maklumat Admin</h6>
            </div>
            <div class="card-body">

        <div class="row">
            
            <div class="col-md-6 mb-3">
                 <b for="user_image">Gambar Admin:</b>
                <input type="file"  name="user_image">
            </div>
        </div>
             
                
    <div class="row">
            
          <div class="col-md-6 mb-3">
            <label for="firstName">Katalaluan</label>
            <input type="password" class="border-secondary form-control" name="user_password" placeholder="" value="<?php echo $user_password ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        
<!--
        <div class="col-md-6 mb-3">
            <label for="firstName">Nama</label>
            <input type="text" class="form-control" name="user_username" placeholder="<?php echo $user_username ?>" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Nombor Telefon</label>
            <input type="text" class="form-control" name="user_phone" placeholder="<?php echo $user_phone ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
            
        <div class="col-md-6 mb-3">
            <label for="lastName">Emel</label>
            <input type="text" class="form-control" name="user_email" placeholder="<?php echo $user_email ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
           <div class="col-md-6 mb-3">
            <label for="lastName">Website</label>
            <input type="text" class="form-control" name="user_website" placeholder="<?php echo $user_website ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
           
        <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="user_address" placeholder="<?php echo $user_address ?>" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
            
        
-->
                     
        </div>
      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_user_profile" value="Kemaskini">
        </div>
  
                  
                </div>
                </div>

         
     </form> 

       