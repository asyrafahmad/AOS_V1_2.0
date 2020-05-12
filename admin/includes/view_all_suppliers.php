<?php session_start(); ?> 

<?php

                    $connection = mysqli_connect("localhost", "root", "", "agro_db");

                    $per_page = 5;
                  
                    if(isset($_SESSION['s_page'])){
                         $page = $_SESSION['s_page']; 
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
                  

                    $querys  =  "SELECT * FROM user WHERE user_role='2' ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count/$per_page);
				?>    
   




          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                  <div class="table-responsive">
                    
                     <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers
                               " id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='supplier.php?s_page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='supplier.php?s_page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                      
                      
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">


                    <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM user WHERE user_role LIKE '2' AND user_username LIKE '%".$search."%' OR user_phone LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM user WHERE user_role LIKE '2' LIMIT $page_1,$per_page ";
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>Gambar</th>
                                        <th>Petani</th>
                                        <th>No Telefon</th>
                                        <th>Tarikh Buka Akaun</th>
                                        <th colspan="3"></th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img width="100"  src="../img/'.$row["user_image"].'"  alt="image" class="img-category" </td>
                                            <td class="align-middle">'.$row["user_username"].'</td>
                                            <td class="align-middle">'.$row["user_phone"].'</td>
                                            <td class="align-middle">'.$row["user_date_register"].'</td>
                                            <td class="text-center align-middle"><a class="btn" href="supplier.php?source=view_supplier&supplier_id='.$row["user_id"].'"><i class="fas fa-eye"></i></a>
                                                
                                                <a class="btn" href="supplier.php?source=edit_supplier&supplier_id='.$row["user_id"].'"><i class="fas fa-edit"></i></a>
                                                
                                                <a class="btn" href="supplier.php?source=view_supplier_product&supplier_id='.$row["user_id"].'"><i class="fas fa-boxes"></i></a></td>
                                            </tr>
                                            <tbody>';
                            }

                            echo $output;
                        }
                        else
                        {
                            echo 'Tiada Maklumat.';
                        }


                    ?>
                  
                      </table>
                    </div>
                </div>
          </div>