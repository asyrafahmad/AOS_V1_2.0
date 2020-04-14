<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['e_p_id'])){

        $elodge_product_id = $_GET['e_p_id'];

        $query  =  "SELECT * FROM elodge_product WHERE elodge_product_id = $elodge_product_id";    
        $select_elodge_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_elodge_query)){

            $elodge_product_image            = escape($row['elodge_product_image']);
            $elodge_product_name            = escape($row['elodge_product_name']);
            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
            $elodge_product_harvest_date    = escape($row['elodge_product_harvest_date']);
//            $elodge_product_amount_booked   = escape($row['elodge_product_amount_booked']);
//            $elodge_product_status          = escape($row['elodge_product_status']);
                            
        }
    }

    //Update data
    if(isset($_POST['edit_elodge'])){
        
        $elodge_product_image            = $_FILES['elodge_product_image']['name'];
        $elodge_product_image_temp       = $_FILES['elodge_product_image']['tmp_name'];
        $elodge_product_name             = escape($_POST['elodge_product_name']);
        $elodge_product_quantity         = escape($_POST['elodge_product_quantity']);
        $elodge_product_harvest_date     = escape($_POST['elodge_product_harvest_date']);
//        $elodge_product_amount_booked    = escape($_POST['elodge_product_amount_booked']);
//        $elodge_product_status           = escape($_POST['elodge_product_status']);

        move_uploaded_file($elodge_product_image_temp,"../img/$elodge_product_image" );

        $query = "UPDATE elodge_product SET                                   ";
        $query .= "elodge_product_image            = '{$elodge_product_image}',       ";
        $query .= "elodge_product_name         = '{$elodge_product_name}',    ";
        $query .= "elodge_product_quantity             = '{$elodge_product_quantity}',        ";
        $query .= "elodge_product_harvest_date             = '{$elodge_product_harvest_date}'        ";
//        $query .= "elodge_product_amount_booked      = '{$elodge_product_amount_booked}', ";
//        $query .= "elodge_product_status         = '{$elodge_product_status}',    ";
        $query .= "WHERE elodge_product_id         =  {$elodge_product_id}             ";

        $edit_elodge_query = mysqli_query($connection,$query);
        confirmQuery($edit_elodge_query);
		
		echo "<p class=''>Produk telah berjaya dikemaskini.</p>";
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
            <input type="file"  name="elodge_product_image">
          </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="firstName">Nama produk</label>
            <div>
					<select name="elodge_product_name" id="" class="btn border-secondary form-control">
						<option value="<?php echo $elodge_product_name; ?>"><?php echo $elodge_product_name; ?></option>
						<optgroup label="Buah-buahan">
							<option value="Belimbing">Belimbing</option>
							<option value="Betik Eksotika">Betik Eksotika</option>
							<option value="Betik Panjang">Betik Panjang</option>
							<option value="Ciku">Ciku</option>
							<option value="Durian">Durian</option>
							<option value="Guava">Guava</option>
							<option value="Jagung">Jagung</option>
							<option value="Jambu Air">Jambu Air</option>
							<option value="Jambu Batu">Jambu Batu</option>
							<option value="Limau Bali">Limau Bali</option>
							<option value="Limau Manis">Limau Manis</option>
							<option value="Limau Nipis">Limau Nipis</option>
							<option value="Longan">Longan</option>
							<option value="Mangga">Mangga</option>
							<option value="Nanas">Nanas</option>
							<option value="Nangka">Nangka</option>
							<option value="Pisang">Pisang</option>
							<option value="Pitaya">Pitaya</option>
							<option value="Rambutan">Rambutan</option>
							<option value="Roselle">Roselle</option>
							<option value="Tembikai">Tembikai</option>
							<option value="Belimbing">Belimbing</option>
							<option value="Tembikai Wangi">Tembikai Wangi (Rock Melon)</option>
						</optgroup>
						<optgroup label="Sayur-sayuran">
							<option value="Bayam">Bayam</option>
							<option value="Bendi">Bendi</option>
							<option value="Cendawan Tiram Kelabu">Brokoli</option>
							<option value="Cendawan Tiram Kelabu">Cendawan Tiram Kelabu</option>
							<option value="Cili Manis">Cili Manis</option>
							<option value="Cili Merah">Cili Merah</option>
							<option value="Halia">Halia</option>
							<option value="Halia Muda">Halia Muda</option>
							<option value="Jagung Sayur">Jagung Sayur</option>
							<option value="Kacang Bendi">Kacang Bendi</option>
							<option value="Kacang Botor">Kacang Botor</option>
							<option value="Kacang Buncis">Kacang Buncis</option>
							<option value="Kacang Panjang">Kacang Panjang</option>
							<option value="Kangkung">Kangkung</option>
							<option value="Keledek">Keledek</option>
							<option value="Ketola Segi">Ketola Segi</option>
							<option value="Kobis Bulat">Kobis Bulat</option>
							<option value="Labu Manis">Labu Manis</option>
							<option value="Peria Kambas">Peria Kambas</option>
							<option value="Salad Bulat">Salad Bulat</option>
							<option value="Sawi">Sawi</option>
							<option value="Terung">Terung</option>
							<option value="Timun">Timun</option>
							<option value="Tomato">Tomato</option>
						</optgroup>
					</select>
				</div>
            </div>
        </div>
		<div class="row">
          <div class="col-md-4 mb-3">
            <label for="firstName">Kuantiti (Kg)</label>
            <input type="text" class="form-control" name="elodge_product_quantity" placeholder="" value="<?php echo $elodge_product_quantity; ?>" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="lastName">Tarikh mula tanaman</label>
            <input type="text" class="form-control" name="elodge_product_harvest_date" placeholder="" value="<?php echo $elodge_product_harvest_date; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
<!--
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Jumlah tempahan</label>
            <input type="text" class="form-control" name="elodge_product_amount_booked" placeholder="" value="<?php echo $elodge_product_amount_booked; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Status</label>
            <input type="text" class="form-control" name="elodge_product_status" placeholder="" value="<?php echo $elodge_product_status; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
-->


                      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_elodge" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
