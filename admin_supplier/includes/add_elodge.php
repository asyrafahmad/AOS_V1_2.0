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
   
            //TODO: direct to e-lodge.php\
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
          <div class="col-md-4 mb-3">
            <label for="firstName">Nama Produk</label>
            <div>
					<select name="elodge_product_name" id="" class="btn border-secondary form-control">
						<option value="">Pilih Produk...</option>
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
			
          <div class="col-md-4 mb-3">
            <label for="firstName">Tarikh Menuai Pada Bulan</label>
            <input type="number" class="border-secondary form-control" name="elodge_product_harvest_date"  oninput="maxLengthCheck(this)" maxlength ="1" min="1" max="12">
          </div>
            <script>
              function maxLengthCheck(object)
              {
                if (object.value.length > object.maxLength)
                  object.value = object.value.slice(0, object.maxLength)
              }
            </script>
        </div> 
			
		<div class="row">
          <div class="col-md-4 mb-3">
            <label for="firstName">Kuantiti (Kg)</label>
            <input type="text" class="form-control" name="elodge_product_quantity" required="">
          </div>
        </div>

                      
        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="add_elodge_product" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
