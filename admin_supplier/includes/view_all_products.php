<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
              
              
            <div class="card-header py-2">
                <div class="row">
                  <div class="col-md-6">
                     <h6 class="m-2 font-weight-bold text-primary">Senarai Produk</h6>
                  </div>
                  <div class="col-md-6" align="center">
                     <div align="right"><a class='btn btn-success' href='product.php?source=add_product'>+ Produk </a></div>
                  </div>
                </div>
            </div>
              
            <div class="card-body">
              <div class="table-responsive">
                  
                  
                  
                       
                      <?php
                  
                  
                  
                        if(isset($_SESSION['user_id'])){

                              $user_id = $_SESSION['user_id'];
                          }
                      
                            echo "<div class='card-body'> ";        
                            echo "<div class='row' align='center'>";
                          
                        $query  =  "SELECT * FROM product WHERE product_supplier = '{$user_id}'    ";    
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
                            $product_date_submit = escape($row['product_date_submit']);
                            $product_date_modified = escape($row['product_date_modified']);
                            
                  
                                echo "<div class='col-xl-3'>";
                                echo "<div class='card shadow '>";
                                echo "<div class='card-body'>";
                                echo "<div class='no-gutters align-items-center'>";
                                echo "<a href='product.php?source=view_product&p_id={$product_id}'><img style='height:80px;' src='../img/$product_image' alt=''></a>";
                                echo "</div>";
                                echo "<h4 align='center'><b>$product_name</b></h4>";
                                echo "<h6>Gred: $product_gred </h6>";
                                echo "<h6>Kuantiti: $product_quantity </h6>";
                                echo "<h6>RM$product_price</h6>";
                                echo "<h6><a class='btn btn-info' href='product.php?source=edit_product&p_id={$product_id}'>Kemaskini </a></h6>";
                                echo "</div>";  
                                echo "</div>"; 
                                echo "</div>";
                            }
                            
                            echo "</div>";  
                            echo "</div>"; 
                     
                    ?>

            
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
<!--           TODO: put product table-->
<!--
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Harga (RM) / Kg</th>
                      <th>Tarikh produk dimasukkan</th>
                      <th>Tarikh produk diubahsuai</th>
                      <th>Lihat</th>
                      <th>Kemaskini</th>
                      <th>Padam</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                      Get data in db and display  
                    <?php
                      
                      if(isset($_SESSION['user_id'])){
                          
                          $user_id = $_SESSION['user_id'];
                      }
                      
                          
                        $query  =  "SELECT * FROM product WHERE product_supplier = '{$user_id}'    ";    
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
                            $product_date_submit = escape($row['product_date_submit']);
                            $product_date_modified = escape($row['product_date_modified']);
                            
                            $_SESSION['product_id'] = $product_id;
                            $_SESSION['product_name'] = $product_name;
                            
                            echo "<tr>";
                            echo "<td><img width='100'  src='../img/$product_image'  alt='image' class='rounded-circle' </td>";
                            echo "<td>$product_name  </td>";
                            echo "<td>$product_quantity  </td>";
                            echo "<td>$product_price  </td>";
                            echo "<td>$product_date_submit</td>";
                            echo "<td>$product_date_modified</td>";
                            
                            echo "<td><a class='btn btn-info' href='product.php?source=view_product&p_id={$product_id}'>Lihat </a></td>";
                            echo "<td><a class='btn btn-info' href='product.php?source=edit_product&p_id={$product_id}'>Kemaskini </a></td>";
                            echo "<td></td>";
                            echo "</tr>";

                                }
                         ?>
                  </tbody>
                </table>
-->
              </div>
            </div>
          </div>