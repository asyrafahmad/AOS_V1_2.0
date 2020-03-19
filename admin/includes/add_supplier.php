<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
<!--Turn on the SESSION-->
<?php session_start();   ?>

    
    
    
<?php
    
    if(isset($_POST['add_supplier'])){
                
        $admin_supplier_image        = escape($_FILES['supplier_image']['name']);
        $admin_tmp_supplier_image    = $_FILES['supplier_image']['tmp_name'];
        $admin_supplier_name         = $_POST['supplier_name'];
        $admin_supplier_email        = $_POST['supplier_email'];
        $admin_supplier_phone        = $_POST['supplier_phone'];
        $admin_supplier_address      = $_POST['supplier_address'];
        $admin_supplier_website      = $_POST['supplier_website'];

        move_uploaded_file($post_tmp_supplier_image, "../img/$post_supplier_image" );
       
        if(!empty($post_supplier_name)  &&  !empty($post_supplier_email)  &&  !empty($post_supplier_phone) &&  !empty($post_supplier_address)&&  !empty($post_supplier_website)){
                 
            $query = "INSERT INTO supplier(supplier_image, supplier_name, supplier_email, supplier_phone, supplier_address, supplier_website)  ";
            $query .= "VALUES('{$admin_supplier_image}', '{$admin_supplier_name}', '{$admin_supplier_email}', '{$admin_supplier_phone}', '{$admin_supplier_address}', '{$admin_supplier_website}'  )  ";

            $create_post_query  =   mysqli_query($connection, $query);

            // function
            confirmQuery($create_post_query);
   
            //to pull out last post created ID
            //$the_post_id = mysqli_insert_id($connection);

            echo "<p class='bg-success'>Supplier added. </p>";
        }
        else{
            echo "<script>alert('Fields cannot be empty')</script>";
        }
    }
?>
    


<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">


    <div class="container-fluid">

      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Petani</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="supplier_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama Petani</label>
            <input type="text" class="form-control" name="supplier_name" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Email</label>
            <input type="text" class="form-control" name="supplier_email" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">No Telefon</label>
            <input type="text" class="form-control" name="supplier_phone" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Alamat</label>
            <input type="text" class="form-control" name="supplier_address" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Laman Web</label>
            <input type="text" class="form-control" name="supplier_website" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>  
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_supplier" value="Hantar">
        </div>
    </div>
</div>

<!--End of profile content-->
</div> 
          
          
</form> 