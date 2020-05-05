<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				  
				  
				<?php
                  
					if(isset($_GET['delete'])){

						$product_id = $_GET['delete'];

						$query = "DELETE FROM product WHERE product_id = {$product_id}	";
						$delete_query = mysqli_query($connection, $query);

						echo "<p>Produk telah dibuang.</p>";
					}
                  
                    $per_page = 5;
                  
                    if(isset($_GET['page'])){

                        $page = $_GET['page'];
                    }
                    else{
                        $page = "";
                    }
                  
                    
                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }
                    else{
                        $page_1 = ($page * $per_page) - $per_page;
                    }
                  

                    $querys  =  "SELECT * FROM product ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count/$per_page);
				?>    
                  
                  <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers
                               " id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                  
          
                  
                  
<!--           TODO: put product table-->
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
<!--                      <th>Kategori Produk</th>-->
                      <th colspan="2" class="ml-2">Produk</th>
                      <th>Gred</th>
                      <th>Kuantiti (Kg)</th>
<!--                      <th>Deskripsi</th>-->
                      <th>Harga Semasa (RM) / Kg</th>
                      <th>Harga Jualan (RM) / Kg</th>
                      <th></th>
                    </tr>
                  </thead>
                 
                  <tbody class="align-middle">
                     <!-- Get data in db and display  -->
                    <?php
                        
                      
                       
                      
                        // ----------------------------------------------------------------
                      
					  	$var = 0;
                      
                        $query  =  "SELECT * FROM product LIMIT $page_1,$per_page ";    
                        $select_suppliers = mysqli_query($connection, $query);
					  	

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $product_id = escape($row['product_id']);
                            $product_category = escape($row['product_category']);
                            $product_type = escape($row['product_type']);
                            $product_gred = escape($row['product_gred']);
                            $product_image = escape($row['product_image']);
                            $product_name = escape($row['product_name']);
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
                            echo "<td><img height='10%' width='90%' src='../img/$product_image'  alt='image' class='img-category' value='$product_image'></td>";
                            echo "<td>$product_name  </td>";
                            echo "<td>$product_gred  </td>";
                            echo "<td width='110'>$product_quantity  </td>";
//                            echo "<td>$product_description  </td>";
                            echo "<td width='110'>$product_current_price  </td>";
                            echo "<td width='110'>$product_price  </td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td class='text-center'><a class='btn' href='product.php?source=view_product&p_id={$product_id}'><i class='fas fa-eye'></i> </a>";
                            echo "<a class='btn' href='product.php?source=edit_product&p_id={$product_id}'><i class='fas fa-edit'></i> </a>";
                            echo "<a class='btn' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? ');  \"  href='product.php?delete={$product_id} '><i class='fas fa-trash-alt'></i></a></td>";
                            echo "</tr>";
							
							$_SESSION['total'] = $var += $product_price ;

                       }
					  
                  ?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
          </div>