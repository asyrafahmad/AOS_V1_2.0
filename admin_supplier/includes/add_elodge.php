<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php

    if(isset($_SESSION['user_id'])){
                          
            $user_id = $_SESSION['user_id'];
    }
    
    if(isset($_POST['add_elodge_product'])){
        
        $elodge_product_image           = escape($_FILES['elodge_product_image']['name']);
        $elodge_product_image_temp      = escape($_FILES['elodge_product_image']['tmp_name']);
        $elodge_product_name            = escape($_POST['elodge_product_name']);
        $elodge_product_quantity        = escape($_POST['elodge_product_quantity']);
        $elodge_product_harvest_date    = escape($_POST['elodge_product_harvest_date']);
//        $elodge_product_amount_booked   = escape($_POST['elodge_product_amount_booked']);
//        $elodge_product_status          = escape($_POST['elodge_product_status']);

        move_uploaded_file($elodge_product_image_temp, "../img/$elodge_product_image" );
       
        if(!empty($elodge_product_name)  &&  !empty($elodge_product_quantity) ){
                 
            $query = "INSERT INTO elodge_product ( elodge_product_name, elodge_product_image, elodge_product_quantity, elodge_product_harvest_date, elodge_supplier)  ";
            $query .= "VALUES( '{$elodge_product_name}', '{$elodge_product_image}', '{$elodge_product_quantity}', '{$elodge_product_harvest_date}', '{$user_id}')";

            $create_elodge_query  =   mysqli_query($connection, $query);
            confirmQuery($create_elodge_query);
   
            
            echo "<p class=''>Produk E-Lodge telah berjaya ditambah</p>";
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
          <h6 class="m-0 font-weight-bold text-primary">Tambah E-Lodge Produk</h6>
        </div>
        <div class="card-body">

          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="elodge_product_image">
          </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama produk</label>
            <input type="text" class="form-control" name="elodge_product_name" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div> 
          <div class="col-md-6 mb-3">
            <label for="firstName">Kuantiti</label>
            <input type="text" class="form-control" name="elodge_product_quantity" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
<!--
          <div class="col-md-6 mb-3">
            <label for="lastName">Jumlah Tempahan (Kg)</label>
            <input type="text" class="form-control" name="elodge_product_amount_booked" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
-->
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Tarikh Menuai Pada Bulan</label>
            <input type="text" class="form-control" name="elodge_product_harvest_date" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
            
            
<!--
          <div class="col-md-6 mb-3">
            <label for="lastName">Status</label>
            <input type="text" class="form-control" name="elodge_product_status" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
-->
        </div>

                      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_elodge_product" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
