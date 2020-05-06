<?php ob_start();   ?>
    
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk E-Lodge</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
                <?php
                  
                   $connection = mysqli_connect("localhost", "root", "", "agro_db");
                  
                   $per_page = 5;
                  
                    if(isset($_SESSION['page'])){
                         $page = $_SESSION['page']; 
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
                  

                    $querys  =  "SELECT * FROM elodge_product ";    
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
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='supplier.php?source=view_elodge_supplier&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='supplier.php?source=view_elodge_supplier&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>  
                  
                <div class="table-responsive">  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            
                            $query = "SELECT * FROM elodge_product JOIN user ON  elodge_product.elodge_supplier = user.user_id WHERE elodge_product_name LIKE '%".$search."%' OR elodge_product_quantity LIKE '%".$search."%'  OR elodge_product_harvest_date LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM elodge_product JOIN user ON  elodge_product.elodge_supplier = user.user_id";
                        }

                        $var = 0;
                      
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>Gambar</th>
                                        <th>Produk</th>
                                        <th>Baki Kuantiti</th>
                                        <th>Tarikh Menuai</th>
                                        <th>Nama Petani</th>
                                        <th>Lebih Lanjut</th>
                                        <th>Garis Panduan</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img src="../img/'.$row["elodge_product_image"].'"  alt="image" class="img-category" </td>
                                            <td class="align-middle">'.$row["elodge_product_name"].'</td>
                                            <td class="align-middle">'.$row["elodge_product_quantity"].'</td>
                                            <td class="align-middle">'.$row["elodge_product_harvest_date"].'</td>
                                            <td class="align-middle">'.$row["user_username"].'</td>
                                            <td><a class="btn btn-info" href="supplier.php?source=view_elodge_details&e_p_id='.$row["elodge_product_id"].'">Lihat </a></td>
                                            <td><input type="file"  name="user_image"></td>
                                            </tr>
                                            <tbody>';
                                
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
          </div>