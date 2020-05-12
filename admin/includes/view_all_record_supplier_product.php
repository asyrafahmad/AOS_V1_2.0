<?php session_start();   ?>

<!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
				  
<!--				FOR PAGINATION  -->
				<?php
                  
                   $connection = mysqli_connect("localhost", "root", "", "agro_db");
                  
                    
                    $per_page=5;
                  
//                    $page = $_SESSION['page'];  
                  
                    if(isset($_SESSION['v_r_s_page'])){
                         $page = $_SESSION['v_r_s_page']; 
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
                  

                    $querys  =  "SELECT * FROM product  JOIN user ON product.product_supplier=user.user_id ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count/$per_page);
                    //PAGINATION
                  
				?>    
                  
                  <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?source=view_all_record_supplier_product&v_r_s_page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='product.php?source=view_all_record_supplier_product&v_r_s_page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                  
                  
                  
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  
                    <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM product JOIN user ON product.product_supplier=user.user_id WHERE user_username LIKE '%".$search."%' OR product_name LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM product JOIN user ON product.product_supplier=user.user_id LIMIT $page_1,$per_page ";
                            
                        }

                        $var = 0;
                      
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>Nama Petani</th>
                                        <th>Gambar produk</th>
                                        <th>Produk</th>
                                        <th>Gred</th>
                                        <th>Kuantiti (Kg)</th>
                                        <th>Harga (RM) / Kg</th>
                                        <th>Tarikh Produk Ditambah</th>
                                        <th>Status Produk Dikemaskini</th>
                                        <th>Status Bayaran</th>
                                        <th>Pembayaran</th> <p>Nota: Tekan <b>Selesai</b> jika pembayaran ke petani telah dilakukan.</p>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td class="align-middle">'.$row["user_username"].'</td>
                                            <td><img width="100"  src="../img/'.$row["product_image"].'"  alt="image" class="img-category" </td>
                                            <td class="align-middle">'.$row["product_name"].'</td>
                                            <td class="align-middle">'.$row["product_gred"].'</td>
                                            <td class="align-middle">'.$row["product_quantity"].'</td>
                                            <td class="align-middle">'.$row["product_price"].'</td>
                                            <td class="align-middle">'.$row["product_date_submit"].'</td>
                                            <td class="align-middle">'.$row["product_date_modified"].'</td>
                                            <td class="align-middle">'.$row["product_status"].'</td>
                                            <td class="align-middle"><a class="btn btn-info" href="product.php?source=view_all_record_supplier_product&payment_status_id='.$row["product_id"].'">Selesai</a></td>
                                            </tr>
                                            <tbody>';
                                
                                
                                            $_SESSION["total"] = $var += $row["product_price"] ;
                                
                                
                                            $user_username = $row["user_username"];
                                            $product_name = $row["product_name"];
                                            $product_gred = $row["product_gred"];
                                            $product_quantity = $row["product_quantity"];
                                            $product_price = $row["product_price"];
                                
                                
                                           if(isset($_SESSION['payment_status_id'])){

                                                $the_product_id = $_SESSION['payment_status_id'];

                                                $query = "UPDATE product SET product_status = 'Selesai' WHERE product_id = $the_product_id  ";
                                                $payment_status_query = mysqli_query($connection, $query);
                                               
                                               
                                               
                                                $query  =  "SELECT * FROM product JOIN supplier ON product.product_supplier = supplier.supplier_id WHERE product_id = $the_product_id  ";     
//                                                $query  =  "SELECT * FROM product  WHERE product_id = $the_product_id  ";     
                                                $select_suppliers = mysqli_query($connection, $query);


                                                while ($row = mysqli_fetch_assoc($select_suppliers)){

                                                    $product_id = $row['product_id'];
                                                    $product_gred = $row['product_gred'];
                                                    $product_name = $row['product_name'];
                                                    $product_quantity = $row['product_quantity'];
                                                    $product_price = $row['product_price'];
                                                    
                                                    $supplier_name = $row['supplier_name'];
                                                }
                                               
                                               echo $supplier_name;

                                                $query = "INSERT INTO payment_product_history (payment_supplier_name, payment_product, payment_gred, payment_quantity, payment_price, payment_status, payment_date)";
                                                $query .= "VALUES( '{$product_id}', '{$product_name}', '{$product_gred}', '{$product_quantity}', '{$product_price}', 'Selesai', now() )  ";

                                                $payment_product_query  =   mysqli_query($connection, $query);
                                            }
                                            else{
                                                //TO: CONSOLE NO INPUT DATA
                                            }
                                
                            }
                            
                          

                            echo $output;
                        }
                        else
                        {
                            echo 'Tiada Maklumat';
                        }
                      
                      
                            

                    ?>
                </table>
              </div>
            </div>
          </div>


<?php 



?>