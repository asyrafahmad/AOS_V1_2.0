<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php
    
    if(isset($_POST['add_buyer'])){
                
//        $admin_buyer_image        = escape($_FILES['buyer_image']['name']);
//        $admin_tmp_buyer_image    = $_FILES['buyer_image']['tmp_name'];
        $admin_buyer_name         = $_POST['buyer_name'];
        $admin_buyer_email        = $_POST['buyer_email'];
        $admin_buyer_phone        = $_POST['buyer_phone'];
        $admin_buyer_address      = $_POST['buyer_address'];
        $admin_buyer_website      = $_POST['buyer_website'];

//        move_uploaded_file($admin_tmp_buyer_image, "../img/$admin_buyer_image" );
       
        if(!empty($admin_buyer_name)  &&  !empty($admin_buyer_email)  &&  !empty($admin_buyer_phone) &&  !empty($admin_buyer_address)){
                 
            $query = "INSERT INTO buyer (buyer_name, buyer_email, buyer_phoneNo, buyer_address, buyer_website, buyer_date_register )  ";
            $query .= "VALUES('{$admin_buyer_name}', '{$admin_buyer_email}', '{$admin_buyer_phone}', '{$admin_buyer_address}', '{$admin_buyer_website}', now()  )  ";

            $create_post_query  =   mysqli_query($connection, $query);

            // function
            confirmQuery($create_post_query);
   
            //to pull out last post created ID
            //$the_post_id = mysqli_insert_id($connection);

            echo "<p class=''>Pemborong berjaya ditambah. </p>";
        }
        else{
            echo "<script>alert('Sila isi ruangan kosong')</script>";
        }
    }
?>
    


<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">
    

      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Pemborong/Pembeli</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="buyer_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama</label>
            <input type="text" class="form-control" name="buyer_name" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Emel</label>
            <input type="text" class="form-control" name="buyer_email" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombor Telefon</label>
            <input type="text" class="form-control" name="buyer_phone" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="buyer_address" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Laman Web</label>
            <input type="text" class="form-control" name="buyer_website" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>

        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_buyer" value="Hantar">
        </div>  
    </div>
</div>


          
</form> 

          
          