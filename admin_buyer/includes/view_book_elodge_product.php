<?php 

session_start();
?>
    
<!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-body">
                
                
                
                  <div class="card-body">
                
                 <?php
    
                    if(isset($_SESSION['user_username'])){
                          
                         $user_username = $_SESSION['user_username'];
                    }

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
                  

                    $querys  =  "SELECT * FROM elodge_product_book WHERE book_buyer_name = '{$user_username}'";    
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
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?menu=elodge&source=view_book_elodge_product&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?menu=elodge&source=view_book_elodge_product&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                </div>
                 
                
                
                
                
                
                
                
                
              <div class="table-responsive">
                  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            echo $query = "SELECT * FROM elodge_product_book WHERE  book_buyer_product_name LIKE '%".$search."%' OR book_buyer_product_date LIKE '%".$search."%'   ";
                        }
                        else
                        {
                            $query = "SELECT * FROM elodge_product_book WHERE book_buyer_name = '{$user_username}' ";                         
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            
                            
                            $output .= '<thead>
                                        <tr>
                                        <th>Gambar</th>
                                        <th>Nama Produk</th>
                                        <th>Kuantiti</th>
                                        <th>Tarikh Tempahan</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img width="100"  src="../img/'.$row['book_buyer_product_image'].'"  alt="image" class="rounded-circle" /></td>
                                            <td class="align-middle">'.$row['book_buyer_product_name'].'</td>
                                            <td class="align-middle">'.$row['book_buyer_product_quantity'].'</td>
                                            <td class="align-middle">'.$row['book_buyer_product_date'].'</td>
                                            </tr>
                                            <tbody>';
                            }

                            echo $output;
                        }
                        else
                        {
                            echo 'Tiada Maklumat Dijumpai';
                        }
                                           
                    ?>
                </table>
              </div>
            </div>
          </div>