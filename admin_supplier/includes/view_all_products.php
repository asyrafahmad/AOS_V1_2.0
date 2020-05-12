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

                        $connection = mysqli_connect("localhost", "root", "", "agro_db");

                        $per_page = 8;

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


                        $querys  =  "SELECT * FROM product WHERE product_supplier = '{$user_id}' ";    
                        $find_count = mysqli_query($connection, $querys);
                        $count = mysqli_num_rows($find_count);

                        $count = ceil($count/$per_page);

                  
                  
                        if(isset($_SESSION['user_id'])){

                              $user_id = $_SESSION['user_id'];
                          }
                      
                            echo "<div class='card-body'> ";        
                            echo "<div class='row' align='center'>";
                          
                        $query  =  "SELECT * FROM product WHERE product_supplier = '{$user_id}' LIMIT $page_1,$per_page   ";    
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
                            
                  
                                // echo "<div class='col-xl-3'>";
                                // echo "<div class='card shadow '>";
                                // echo "<div class='card-body'>";
                                // echo "<div class='no-gutters align-items-center'>";
                                // echo "<a href='product.php?source=view_product&p_id={$product_id}'><img style='height:80px;' src='../img/$product_image' alt=''></a>";
                                // echo "</div>";
                                // echo "<h4 align='center'><b>$product_name</b></h4>";
                                // echo "<h6>Gred: $product_gred </h6>";
                                // echo "<h6>Kuantiti: $product_quantity </h6>";
                                // echo "<h6>RM$product_price</h6>";
                                // echo "<h6><a class='btn btn-info' href='product.php?source=edit_product&p_id={$product_id}'>Kemaskini </a></h6>";
                                // echo "</div>";  
                                // echo "</div>"; 
                                // echo "</div>";

                              echo "<div class='col-xl-3 col-md-4 col-sm-6 py-3'>";
                              echo "<div class='card shadow'>";
                              echo "<div class='card-body'>";
                              echo "<div class='no-gutters align-items-left'>";
                              echo "<a href='product.php?source=view_product&p_id={$product_id}'><img class='img-category mb-2' src='../img/$product_image' ></a>";
                              echo "</div>";
                              echo "<h4>$product_name</h4>";
                              echo "<div class='text-justify pl-4'>";
                              echo "<h6 class='mt-3'>Gred : $product_gred</h4>";
                              echo "<h6>Kuantiti : $product_quantity kg</h4>";
                              echo "<h6>RM$product_price</h6>";
                              echo "</div>";
                              echo "<a class='btn btn-success mt-3' href='product.php?source=edit_product&p_id={$product_id}'>Kemaskini</a>";
                              echo "</div>";  
                              echo "</div>"; 
                              echo "</div>";
                            }
                            
                            echo "</div>";  
                            echo "</div>"; 
                     
                    ?>

          
                  <div class="table-responsive" align="center">
                       <div  align="right">
                       <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                           <ul class="pagination">
                               <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                               <?php
                                    for($i = 1; $i <= $count; $i++){

                                        if($i == $page){
                                            echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                        }
                                        else{
                                            echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                        }

                                    }
                               ?>
                            </ul>
                      </div>
                    </div>
                </div>

              </div>
            </div>
          </div>