<?php session_start(); ?>
    


          <div class="card shadow mb-4">
              
        
            <div class="card-header py-2">
                <div class="row">
                  <div class="col-md-12" align="right">
                     <div align="right"><a class='btn btn-success' href='e-bargain.php?menu=<?php echo $menu ?>&source=add_ebargain'>+ Produk </a></div>
                  </div>
                </div>
            </div>
              

              
              
              
            <div class="card-body">
              <div class="table-responsive">
                  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php
                       if(isset($_SESSION['user_username'])){
                          
                                $user_username = $_SESSION['user_username'];
                        }
                        


                        $connect = mysqli_connect("localhost", "root", "", "agro_db");
                        $output = '';

                        if(isset($_POST["query"]))
                        {
                            $search = mysqli_real_escape_string($connect, $_POST["query"]);
                            $query = "SELECT * FROM ebargain_product WHERE ebargain_product_name LIKE '%".$search."%' OR ebargain_product_quantity LIKE '%".$search."%'  ";
                        }
                        else
                        {
                            $query = "SELECT * FROM ebargain_product WHERE ebargain_buyer_name = '{$user_username}' ";
//                            $query = "SELECT * FROM ebargain_product";
                        }

                        $result = mysqli_query($connect, $query);

                        if(mysqli_num_rows($result) > 0)
                        {
                            
                            
                            $output .= '<thead>
                                        <tr>
                                        <th>Nama Produk</th>
                                        <th>Kuantiti</th>
                                        <th>Dijangka Terima Bulan</th>
                                        <th>Tarikh Permintaan</th>
                                        </tr>
                                        <thead>';


                            while($row = mysqli_fetch_array($result))
                            {
                                $output .= '<tbody>
                                            <tr>
                                            <td class="align-middle">'.$row["ebargain_product_name"].'</td>
                                            <td class="align-middle">'.$row['ebargain_product_quantity'].'</td>
                                            <td class="align-middle">'.$row['ebargain_product_month'].'</td>
                                            <td class="align-middle">'.$row['ebargain_product_date_requested'].'</td>
                                            </tr>
                                            <tbody>';
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