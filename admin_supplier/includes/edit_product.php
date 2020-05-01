<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

	//delete data
	if(isset($_GET['delete'])){

		$p_id = $_GET['delete'];

		$product_query = "DELETE FROM product WHERE product_id = {$p_id}	";
		$delete_query = mysqli_query($connection, $product_query);

		//TODO: direct to view_all_elodge_products.php
		
		echo "<p>Produk telah dibuang.</p>";
	}


    //View data
    if(isset($_GET['p_id'])){

        $product_id = $_GET['p_id'];

        $query  =  "SELECT * FROM product WHERE product_id = $product_id";    
        $select_product_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_product_query)){

//            $product_id = escape($row['product_id']);
//            $product_category = escape($row['product_category']);
//            $product_image = escape($row['product_image']);
//            $product_description = escape($row['product_description']);
//            $product_current_price = escape($row['product_current_price']);
            $product_name = escape($row['product_name']);
            $product_type = escape($row['product_type']);
            $product_gred = escape($row['product_gred']);
            $product_quantity = escape($row['product_quantity']);
            $product_price = escape($row['product_price']);
            $product_image_test = escape($row['product_image']);
            
                            
        }
    }

    //Update data
    if(isset($_POST['edit_product'])){
        
        $product_image = $_FILES['product_image']['name'];
        $product_image_temp = $_FILES['product_image']['tmp_name'];
//        $product_category = escape($_POST['product_category']);
        $product_type = escape($_POST['product_type']);
        $product_name = escape($_POST['product_name']);
        $product_gred = escape($_POST['product_gred']);
//        $product_description= escape($_POST['product_description']);
        $product_quantity= escape($_POST['product_quantity']);
        $product_price= escape($_POST['product_price']);
//        $product_current_price= escape($_POST['product_current_price']);

        //move upload image to the server image file
        move_uploaded_file($product_image_temp,"../img/$product_image" );

        //UPDATE query
        $query = "UPDATE product SET                                       ";
        $query .= "product_image            = '{$product_image}',           ";
//        $query .= "product_category         = '{$product_category}',    ";
        $query .= "product_type             = '{$product_type}',            ";
        $query .= "product_gred             = '{$product_gred}',            ";
        $query .= "product_name             = '{$product_name}',            ";
//        $query .= "product_description      = '{$product_description}', ";
        $query .= "product_quantity         = '{$product_quantity}',        ";
        $query .= "product_price            = '{$product_price}',           ";
//        $query .= "product_current_price    = '{$product_current_price}',";
        $query .= "product_date_modified    = now()                         ";
        $query .= "WHERE product_id         =  {$product_id}                ";

        $edit_product_query = mysqli_query($connection,$query);
        confirmQuery($edit_product_query);
		
		echo "<p class=''>Produk telah berjaya dikemaskini.</p>";
    }

?>


	<!-- enctype is   -->
	<form action="" method="post" enctype="multipart/form-data">

	  
	  <!-- Starting of profile content-->
	  <div class="card shadow mb-4">
	        <div class="card-header py-2">
	            <div class="row">
	              <div class="col-md-6">
	                 <h6 class="m-2 font-weight-bold text-primary">Kemaskini Produk</h6>
	              </div>
	              <div class="col-md-6" align="center">
					  
					<?php  
	                	echo "<div align='right'><a class='btn btn-danger' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? '); \"  href='product.php?source=edit_product&delete={$product_id}'><i class='fas fa-trash-alt'></i></a></div>";
					?>
	              </div>
	            </div>
		  </div>
		 
	    <div class="card-body">

			<!-- echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? ');  \"  href='e-lodge.php?delete={$product_id} '>Padam </a></td>"; -->

			<div class="row">
				<div class="col-md-4">
					<!-- <label for="lastname"></label> -->
					<div class="img-container">    
				      <img id="imagePreview" class="card-img product_image" src="../img/<?php echo $product_image;?>"> 
				       <div class="row justify-content-center">
				       	<div class="col-md-12 image-upload">
						    <label for="file-input"><i class="fas fa-camera"></i></label>
						    <input id="file-input" name="product_image" value="<?php echo $product_image ?>"type="file"/>
						</div>
				       </div>
				       

					</div>					
				</div>
				<div class="col-md-8">
					<div class="card-body product_detail">
						<div class="row">
							<div class="col-md-10">
								<label for="firstName">Nama Produk</label>
									<select name="product_name" id="" class="btn border-secondary form-control text-left">
										<option value="<?php echo $product_name; ?>"><?php echo $product_name; ?></option>
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
						<div class="row mt-3">
							<div class="col-md-10">
								<label for="firstName">Jenis Produk</label>
								<select name="product_type" class="btn border-secondary form-control text-left">
								<option value="<?php echo $product_type; ?>"><?php echo $product_type; ?></option>
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
						<div class="row mt-3">
							<div class="col-md-10">
								<label for="lastName">Gred</label>
				            	<!-- <input type="text" class="form-control" name="product_gred" placeholder="" value="<?php echo $product_gred; ?>" required=""> -->
								<select name="product_gred" class="btn border-secondary form-control text-left">
									<option value="<?php echo $product_gred; ?>"><?php echo $product_gred; ?></option>
										<option value="A">A</option>
										<option value="B">B</option>
										<option value="C">C</option>
								</select>	
							</div>
							
						</div>
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="firstName">Kuantiti (Kg)</label>
					            <input type="text" class="form-control" name="product_quantity" placeholder="" value="<?php echo $product_quantity; ?>" required="">
					            <div class="invalid-feedback">
					              Valid first name is required.
					            </div>	
							</div>
						</div>	
						<div class="row mt-3">
							<div class="col-md-4">
								<label for="lastName">Harga (RM) / Kg</label>
					            <input type="text" class="form-control" name="product_price" placeholder="" value="<?php echo $product_price; ?>" required="">
					            <div class="invalid-feedback">
					              Valid last name is required.
					            </div>
							</div>
						</div>
						<div class="row mt-5 justify-content-end">
							<div class="col-md-4">
								<div class="form-group" >
						            <input class="btn btn-primary" style="width: 100%;" type="submit" name="edit_product" value="Simpan">
						        </div>
							</div>
						</div>			
					</div>
				</div>
			
	          


			</div>
		</div>  
	</form> 
