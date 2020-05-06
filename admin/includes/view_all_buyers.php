<?php 
session_start();
?>

                <?php

                    $connection = mysqli_connect("localhost", "root", "", "agro_db");

                    if(isset($_SESSION['page'])){
                        $page = $_SESSION['page']; 
                    }
                    else{
                        $page = "";
                    } 

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
                  

                    $querys  =  "SELECT * FROM user WHERE user_role='3' ";    
                    $find_count = mysqli_query($connection, $querys);
                    $count = mysqli_num_rows($find_count);

                    $count = ceil($count/$per_page);
				?>    



          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pemborong</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                   <div  align="right">
                   <div class="dataTables_paginate paging_simple_numbers
                               " id="dataTable_paginate">
                       <ul class="pagination">
                           <li class="paginate_button page-item previous" id="dataTable_previous"><a class="page-link">Page</a></li>
                           <?php
                                for($i = 1; $i <= $count; $i++){
                                    
                                    if($i == $page){
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='buyer.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='buyer.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                  
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM user  WHERE user_username LIKE '%".$search."%' OR user_email LIKE '%".$search."%' OR user_date_register LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM user WHERE user_role = '3' LIMIT $page_1,$per_page ";
                            
                        }

                        $var = 0;
                      
                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            $output .= '<thead>
                                        <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Nama Pemborong</th>
                                        <th>Emel</th>
                                        <th>Nombor Telefon</th>
                                        <th>Tarikh Daftar</th>
                                        <th colspan="3"></th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td class="align-middle">'.$row["user_id"].'</td>
                                            <td class="align-middle">'.$row["user_username"].'</td>
                                            <td class="align-middle">'.$row["user_image"].'</td>
                                            <td class="align-middle">'.$row["user_email"].'</td>
                                            <td class="align-middle">'.$row["user_phone"].'</td>
                                            <td class="align-middle">'.$row["user_date_register"].'</td>
                                            <td width="170" align="center"><a class="btn" href="buyer.php?source=view_buyer&buyer_id='.$row["user_id"].'" data-toggle="tooltip" data-placement="top" title="Lihat Profil"><i class="fas fa-eye"></i></a>
                                            <a class="btn" href="buyer.php?source=edit_buyer&buyer_id='.$row["user_id"].'" data-toggle="tooltip" data-placement="top" title="Kemaskini"><i class="fas fa-edit"></i></a>
                                            <a class="btn" href="buyer.php?source=view_buyer_history&buyer_id='.$row["user_id"].'" data-toggle="tooltip" data-placement="top" title="Sejarah Pembelian"><i class="fas fa-history"></i></a></td>
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