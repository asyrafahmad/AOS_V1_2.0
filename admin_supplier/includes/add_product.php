<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>
    
    
<?php

      if(isset($_SESSION['user_id'])){
                          
            $user_id = $_SESSION['user_id'];
      }
    
    
    if(isset($_POST['add_product'])){
        
        $product_image       = escape($_FILES['product_image']['name']);
        $product_image_temp  = escape($_FILES['product_image']['tmp_name']);
        $product_name        = escape($_POST['product_name']);
        $product_description = escape($_POST['product_description']);
        $product_type        = escape($_POST['product_type']);
        $product_gred        = escape($_POST['product_gred']);
        $product_quantity    = escape($_POST['product_quantity']);
        $product_price       = escape($_POST['product_price']);

        move_uploaded_file($product_image_temp, "../img/$product_image" );
       
        if(!empty($product_name)  &&  !empty($product_type)  &&  !empty($product_quantity) &&  !empty($product_price) &&  !empty($product_gred )){
                 
            $query = "INSERT INTO product (product_image, product_name, product_description, product_type, product_gred, product_quantity, product_price, product_date_submit, product_supplier, product_status    )";
            $query .= "VALUES( '{$product_image}', '{$product_name}', '{$product_description}', '{$product_type}', '{$product_gred}', '{$product_quantity}', '{$product_price}' , now(), '{$user_id}', 'Belum Selesai'  )  ";

            $create_post_query  =   mysqli_query($connection, $query);
            confirmQuery($create_post_query);
   
            //to pull out last post created ID
            //$the_post_id = mysqli_insert_id($connection);

            echo "<p class=''>Produk telah berjaya ditambah</p>";
			
			
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
          <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <div class="card-body">


          <div class="col-md-6 mb-3">
             <b for="product_image">Gambar :</b>
            <input type="file"  name="product_image">
          </div>
        <div class="row">
			
<!--
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama produk </label>
            <input type="text" class="form-control" name="product_name" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
-->
			
			
			<div class="col-md-4 mb-2">
				<label for="firstName">Nama Produk </label>
				<div>
					<select name="product_name" id="" class="btn border-secondary form-control">
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
			
			<!--
		  <div class="col-md-6 mb-3">
            <label for="firstName">Jenis produk</label>
            <input type="text" class="form-control" name="product_type" placeholder="" value="" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
-->
			
		  <div class="col-md-4 mb-3">
           <label for="product_type">Jenis Produk</label>
			<div>
				<select name="product_type" class="btn border-secondary form-control">
					<option value="">Pilih Jenis Produk...</option>
					<?php
					
						$query = "SELECT * FROM categories_product  ";
						$categories_product_query = mysqli_query($connection, $query);

						while($row = mysqli_fetch_array($categories_product_query)){

							$cat_product_title   = escape($row['cat_product_title']);
							$cat_product_image   = escape($row['cat_product_image']);
							
							echo "<option value=$cat_product_title>$cat_product_title</option>";
						}
					
					?>
				</select>
			</div>
          </div>
			
		  <!--
          <div class="col-md-6 mb-3">
            <label for="product_gred">Gred</label>
            <input type="text" class="form-control" name="product_gred" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
-->
			
		<div class="col-md-4 mb-3">
            <label for="product_gred">Gred</label>
			<div>
				<select name="product_gred" class="btn border-secondary form-control">
					<option value="">Pilih Gred...</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
				</select>
			</div>
        </div>
			

			


        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <label for="firstName">Kuantiti (Kg)</label>
            <input type="text" class="form-control" name="product_quantity" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <label for="lastName">Harga (RM) / Kg</label>
            <input type="text" class="form-control" name="product_price" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
			
						
          <div class="col-md-4 mb-3 ">
            <label for="firstName">Huraian</label>
            <input type="text" class="form-control" name="product_description" placeholder="" value="" required="Deskripsi">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
<!--
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Harga Semasa (RM) / Kg</label>
            <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
        </div>
-->

                      
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_product" value="Hantar">
        </div>
              


</div>
</div>  
</form> 
