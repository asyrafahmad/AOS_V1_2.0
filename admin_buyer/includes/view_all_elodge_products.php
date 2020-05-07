<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    

              <?php
    
                    if(isset($_SESSION['user_username'])){
                          
                         $user_username = $_SESSION['user_username'];
                    }

                    $connection = mysqli_connect("localhost", "root", "", "agro_db");

                    if(isset($_GET['page'])){
                        $page = $_GET['page']; 
                    }
                    else{
                        $page = "";
                    } 

                    $per_page = 10;
                  
        
                    
                    if($page == "" || $page == 1){
                        $page_1 = 0;
                    }
                    else{
                        $page_1 = ($page * $per_page) - $per_page;
                    }
                  

                    $querys  =  "SELECT * FROM elodge_product ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count/$per_page);
				?>    



              <div class="table-responsive">
                  
                   <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers
                               " id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?menu=elodge&source=view_all_elodge_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?menu=elodge&source=view_all_elodge_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                </div>
                 
                




              <div class="table-responsive elodge">     
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Tarikh Menuai</th>
                      <th></th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                    
                          
                        $query  =  "SELECT * FROM elodge_product LIMIT $page_1,$per_page ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $elodge_product_id              = escape($row['elodge_product_id']);
                            $elodge_product_name            = escape($row['elodge_product_name']);
                            $elodge_product_image           = escape($row['elodge_product_image']);
                            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
                            $elodge_product_harvest_date    = escape($row['elodge_product_harvest_date']);
//                            $elodge_product_amount_booked   = escape($row['elodge_product_amount_booked']);
//                            $elodge_product_status          = escape($row['elodge_product_status']);
                            
                            //Set as global
                            $_SESSION['elodge_product_id'] = $elodge_product_id;
                            $_SESSION['elodge_product_name'] = $elodge_product_name;
                      ?>

                            <tr>
                              <td class="text-center"><img width='50' src='../img/<?php echo $elodge_product_image ?>'  alt='image' /></td>
                              <td class=""><?php echo "$elodge_product_name"?></td>
                              <td class=""><?php echo "$elodge_product_quantity"?></td>
                              <td class=""><?php echo "$elodge_product_harvest_date"?></td>
                              <td class="text-center"><a class="btn btn-success" href="e-lodge.php?menu=elodge&source=book_elodge_product&b_e_p_id=<?php echo $elodge_product_id; ?>">Tempah </a></td>
                            </tr>

                      <?php
                            }
                         ?>
                  </tbody>
                </table>
              </div>