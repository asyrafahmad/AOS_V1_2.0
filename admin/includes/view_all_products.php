<?php 
session_start();

?>
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				  
				  
				<?php
                  
                  
                   $connection = mysqli_connect("localhost", "root", "", "agro_db");
                  
					if(isset($_GET['delete'])){

						$product_id = $_GET['delete'];

						$query = "DELETE FROM product WHERE product_id = {$product_id}	";
						$delete_query = mysqli_query($connection, $query);

						echo "<p>Produk telah dibuang.</p>";
					}
                  
                  
                    $per_page = 5;
                  
                    $page = $_SESSION['page'];
                    
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
                  <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM product  WHERE product_name LIKE '%".$search."%' OR product_gred LIKE '%".$search."%' OR product_quantity LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM product LIMIT $page_1,$per_page";
                            
                        }

                        $var = 0;
                      
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>ID</th>
                                        <th>Produk</th>
                                        <th>Gred</th>
                                        <th>Kuantiti (Kg)</th>
                                        <th>Harga Semasa (RM) / Kg</th>
                                        <th>Harga Jualan (RM) / Kg</th>
                                        <th width="20%"></th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td class="align-middle">'.$row["product_id"].'</td>
                                            <td class="align-middle">'.$row["product_name"].'</td>
                                            <td class="align-middle">'.$row["product_gred"].'</td>
                                            <td class="align-middle">'.$row["product_quantity"].'</td>
                                            <td class="align-middle">'.$row["product_current_price"].'</td>
                                            <td class="align-middle">'.$row["product_price"].'</td>
                                            <td class="text-center"><a class="btn" href="product.php?source=view_product&p_id='.$row["product_id"].'"><i class="fas fa-eye"></i></a>
                                            <a class="btn" href="product.php?source=edit_product&p_id='.$row["product_id"].'"><i class="fas fa-edit"></i></a>
                                            <a class="btn" onClick=\'javascript: return confirm("Anda pasti untuk padam maklumat ini? ");  \'  href="product.php?delete='.$row["product_id"].' "><i class="fas fa-trash-alt"></i></a></td>
                                            </tr>
                                            <tbody>';
                                
                                
                                            $_SESSION["total"] = $var += $row["product_price"] ;
                                
                                
                                           
                                
                            }
                            
                          

                            echo $output;
                        }
                        else
                        {
                            echo 'Data Not Found';
                        }
                      
                      
                            

                    ?>
                </table>
              </div>
              </div>
            </div>
          </div>