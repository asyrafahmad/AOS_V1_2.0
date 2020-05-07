<?php 

session_start();
?>

    
 <?php
    
                    if(isset($_SESSION['user_id'])){
                          
                      $user_id = $_SESSION['user_id'];
                    }

                    $connection = mysqli_connect("localhost", "root", "", "agro_db");


                    $per_page = 10;
                  
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
                  

                    $querys  =  "SELECT *, SUM(book_buyer_product_quantity) as sum  FROM elodge_product JOIN elodge_product_book ON elodge_product.elodge_product_id = elodge_product_book.book_buyer_product_id WHERE elodge_product.elodge_supplier = '{$user_id}' GROUP BY elodge_product_book.book_buyer_name  ";    
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
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='e-lodge.php?page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                </div>

				  
		    <div class="card-header py-2">
                <div class="row">
				  <div class="col-md-12" align="center">
                     <div align="right"><a class="btn btn-success" href="e-lodge.php?source=add_elodge">+ Produk </a></div>
                  </div>
                </div>
            </div>      
			  
			  
			  
	
			  
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <?php
                    
                       

                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
//                            $query = "SELECT * FROM payment_product_history WHERE  payment_invoice LIKE '%".$search."%' OR payment_order_date LIKE '%".$search."%'   ";
                            $query = "SELECT *, SUM(book_buyer_product_quantity) as sum  FROM elodge_product JOIN elodge_product_book ON elodge_product.elodge_product_id = elodge_product_book.book_buyer_product_id WHERE elodge_product.elodge_supplier = '{$user_id}'  AND elodge_product.elodge_product_name LIKE '%".$search."%' GROUP BY elodge_product_book.book_buyer_product_name   ";
                        }
                        else
                        {
                            $query = "SELECT *, SUM(book_buyer_product_quantity) as sum  FROM elodge_product JOIN elodge_product_book ON elodge_product.elodge_product_id = elodge_product_book.book_buyer_product_id WHERE elodge_product.elodge_supplier = '{$user_id}' GROUP BY elodge_product_book.book_buyer_product_name ORDER BY elodge_product.elodge_product_quantity DESC LIMIT $page_1,$per_page  ";                         
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            
                            
                            $output .= '<thead>
                                        <tr>
                                        <th colspan="2" class="ml-2">Produk</th>
                                        <th>Kuantiti (Kg)</th>
                                        <th>Bulan Menuai</th>
                                        <th>Jumlah Tempahan</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td><img src="../img/'.$row['book_buyer_product_image'].'"  alt="image" class="img-category ml-2" </td>
                                            <td class="align-middle">'.$row['book_buyer_product_name'].'</td>
                                            <td class="align-middle">'.$row['elodge_product_quantity'].'</td>
                                            <td class="align-middle">'.$row['elodge_product_harvest_date'].'</td>
                                            <td class="text-info align-middle ">'.$row['sum'].'</td>
                                            <td class="text-center align-middle"><a class="btn" href="e-lodge.php?source=view_elodge&e_p_id='.$row['elodge_product_id'].'"><i class="fas fa-eye"></i></a>
                                            <a class="btn" href="e-lodge.php?source=edit_elodge&e_p_id='.$row['elodge_product_id'].'"><i class="fas fa-edit"></i></a></td>
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
           <!--  </div> -->
          <!-- </div> -->