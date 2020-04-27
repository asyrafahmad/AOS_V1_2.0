<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <p class="mb-">Produk Pasaran. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				  
				  
				<?php
                  
                  
                    //PAGINATION
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
                        $page_1 = ($page * 5) - 5;
                    }
                  

                    $querys  =  "SELECT * FROM product ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = $count/5;
                    //PAGINATION
                  
				?>    
                  
                  <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='order.php?source=view_all_order_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='order.php?source=view_all_order_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                  
          
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Invois</th>
                      <th>Produk</th>
                      <th>Gred</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Harga (RM) / Kg</th>
                      <th>Tarikh Bayaran</th>
                      <th>Status Bayaran</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                        
                        if(isset($_GET['payment_status'])){

                            $the_product_id = $_GET['payment_status'];

                            $query = "UPDATE product SET product_status = 'Selesai' WHERE product_id = $the_product_id  ";
                            $payment_status_query = mysqli_query($connection, $query);
                            
                            //TODO: redirect to same page
                        }
                      
                       
                      
                        // ----------------------------------------------------------------
                      
                        $user_id = $_SESSION['user_id'];
                        $user_username = $_SESSION['user_username'];
                      
					  	$var = 0;
                      
//                        $query  =  "SELECT * FROM product WHERE product_supplier='{$user_id}'  LIMIT $page_1,5 ";     
                        $query  =  "SELECT * FROM payment_product_history WHERE payment_supplier='{$user_username}'  LIMIT $page_1,5 ";     
                        $select_suppliers = mysqli_query($connection, $query);
					  	

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $payment_invoice = escape($row['payment_invoice']);
                            $payment_supplier = escape($row['payment_supplier']);
                            $payment_product = escape($row['payment_product']);
                            $payment_gred = escape($row['payment_gred']);
                            $payment_quantity = escape($row['payment_quantity']);
                            $payment_price = escape($row['payment_price']);
                            $payment_status = escape($row['payment_status']);
                            $payment_date = escape($row['payment_date']);
                      
                            echo "<tr>";
                            echo "<td>$payment_invoice  </td>";
                            echo "<td>$payment_product  </td>";
                            echo "<td>$payment_gred  </td>";
                            echo "<td>$payment_quantity  </td>";
                            echo "<td>$payment_price</td>";
                            echo "<td>$payment_date</td>";
                            echo "<td>$payment_status</td>";
                            echo "</tr>";
							
                       }
					  
                  ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>