<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "functions.php";   ?>

   
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Kategori Produk</h6>
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
                <!--TODO: add product category-->
                <?php add_category(); ?>
                <h1 class="page-header">
                  Kategori Produk
                </h1><br>

                <div class="col-md-4">
                    <h3 class="bg-success"><?php display_message(); ?></h3>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="category-title">Kategori</label>
                            <input name="cat_product_title" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <input name="add_product_category" type="submit" class="btn btn-primary" value="Tambah Kategori">
                        </div>
                    </form>
                </div>
                <br>
                  
                  
                
                <div class="col-md-8">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Title</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                  
                            $query = "SELECT * FROM categories_product ";
                            $categories_product_query = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($categories_product_query)){

                                $cat_product_id = $row['cat_product_id'];
                                $cat_product_title = $row['cat_product_title'];

                                echo "<tr>";
                                echo "<td>$cat_product_id </td>";
                                echo "<td>$cat_product_title </td>";
                                echo "</tr>";

                            }
                        ?>
                        </tbody>
                    </table>
                </div>

                
              </div>
            </div>
          </div>