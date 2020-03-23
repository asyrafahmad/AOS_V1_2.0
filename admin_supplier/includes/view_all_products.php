<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk</h1>
          <p class="mb-4">Produk Pasaran. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
<!--
                      <th>Produk ID</th>
                      <th>Kategori Produk</th>
-->
                      <th>ID</th>
                      <th>Produk</th>
                      <th>Jenis</th>
                      <th>Gred</th>
                      <th>Kuantiti (Kg)</th>
<!--
                      <th>Deskripsi</th>
-->
                      <th>Harga (RM) / Kg</th>
<!--                      <th>Harga Semasa (RM) / Kg</th>-->
                      <th>Lihat</th>
                      <th>Kemaskini</th>
                      <th>Padam</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                      
                      if(isset($_SESSION['user_username'])){
                          
                          $user_username = $_SESSION['user_username'];
                      }
                          
                        $query  =  "SELECT * FROM product ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $product_id = escape($row['product_id']);
                            $product_category = escape($row['product_category']);
                            $product_type = escape($row['product_type']);
                            $product_image = escape($row['product_image']);
                            $product_name = escape($row['product_name']);
                            $product_gred = escape($row['product_gred']);
                            $product_description = escape($row['product_description']);
                            $product_quantity = escape($row['product_quantity']);
                            $product_price = escape($row['product_price']);
                            $product_current_price = escape($row['product_current_price']);
                            
                            //Set as global
                            $_SESSION['product_id'] = $product_id;
                            $_SESSION['product_name'] = $product_name;
                            
                            echo "<tr>";
                            echo "<td>$product_id </td>";
//                            echo "<td>$product_category </td>";
//                            echo "<td><img width='100'  src='../img/$product_image'  alt='image' class='rounded-circle' </td>";
                            echo "<td>$product_name  </td>";
                            echo "<td>$product_type  </td>";
                            echo "<td>$product_gred  </td>";
                            echo "<td>$product_quantity  </td>";
//                            echo "<td>$product_description  </td>";
                            echo "<td>$product_price  </td>";
//                            echo "<td>$product_current_price  </td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td><a class='btn btn-info' href='product.php?source=view_product&p_id={$product_id}'>Lihat </a></td>";
                            echo "<td><a class='btn btn-info' href='product.php?source=edit_product&p_id={$product_id}'>Kemaskini </a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='users.php?delete={$user_id} '>Padam </a></td>";
                            echo "<td></td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>