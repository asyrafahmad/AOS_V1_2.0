<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "./functions.php";   ?>

   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kategori Produk</h6>
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
                <!--TODO: add product category-->
                <?php add_category(); ?>

                <div class="col-md-12">
                    <h3 class="bg-success"><?php display_message(); ?></h3>

                    <form action="" method="post">
                        <div class="form-group">
                            <h2 for="category-title">Kategori</h2>
							<div class="col-md-6 mb-3">
								 <b for="cat_product_image">Gambar :</b>
								<input type="file"  name="cat_product_image">
						  	</div>
                            <input name="cat_product_title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="add_product_category" type="submit" class="btn btn-primary" value="Tambah Kategori">
                        </div>
                    </form>
                </div>
                <br>
                  
				  <?php
						if(isset($_GET['delete'])){

							$cat_product_id = $_GET['delete'];

							$query = "DELETE FROM categories_product WHERE cat_product_id = {$cat_product_id}	";
							$delete_query = mysqli_query($connection, $query);

							echo "<p>Kategori telah dibuang.</p>";
						}
					?>    
                  
                
                <div class="col-md-12">
                    <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th>Padam</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                  
                            $query = "SELECT * FROM categories_product ";
                            $categories_product_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($categories_product_query)){

                                $cat_product_id = $row['cat_product_id'];
                                $cat_product_title = $row['cat_product_title'];
                                $cat_product_image = $row['cat_product_image'];

                                echo "<tr>";
                                echo "<td>$cat_product_id </td>";
                                echo "<td>$cat_product_title </td>";
                                echo "<td><label><img style='height:20%;width:20%;' src='../img/$cat_product_image'></label></td>";
                                echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? ');  \"  href='product.php?source=product_category&delete={$cat_product_id} '>Padam </a></td>";
                                echo "</tr>";

                            }
                        ?>
                        </tbody>
                    </table>
                    <div>
                </div>

                
              </div>
            </div>
          </div>