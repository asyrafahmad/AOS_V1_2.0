
<?php 

session_start();

?>

    
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Pesanan Barangan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
                  <?php
    
                    if(isset($_SESSION['user_username'])){
                          
                         $user_username = $_SESSION['user_username'];
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
                  

                    $querys  =  "SELECT * FROM payment_product_history WHERE payment_supplier_name = '{$user_username}' ";    
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
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='order.php?menu=eselling&source=view_all_order_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link active_link'>{$i}</a> </li>";
                                    }
                                    else{
                                        echo "<li class='paginate_button page-item previous' id='dataTable_previous'><a href='order.php?menu=eselling&source=view_all_order_products&page={$i}' aria-controls='dataTable' data-dt-idx='0' tabindex='0' class='page-link'>{$i}</a> </li>";
                                    }
                                    
                                    
                                }
                           ?>
                           
                        </ul>
                  </div>
                </div>
                </div>
                 
                  
                  
                  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                   <?php

                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            //TODO: payment_supplier_name = '{$user_username}'
                            $query = "SELECT * FROM payment_product_history WHERE  payment_invoice LIKE '%".$search."%' OR payment_order_date LIKE '%".$search."%'   ";
                        }
                        else
                        {
                            $query = "SELECT * FROM payment_product_history WHERE payment_supplier_name = '{$user_username}' LIMIT $page_1,$per_page ";                         
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            
                            
                            $output .= '<thead>
                                        <tr>
                                        <th>Invoice#</th>
                                        <th>Bayaran</th>
                                        <th>Tarikh Transaksi Dibuat</th>
                                        <th>Status</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td class="align-middle">#'.$row['payment_invoice'].'</td>
                                            <td class="align-middle">'.$row['payment_price'].'</td>
                                            <td class="align-middle">'.$row['payment_order_date'].'</td>
                                            <td class="align-middle">'.$row['payment_status'].'</td>
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