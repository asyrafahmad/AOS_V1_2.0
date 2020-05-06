<?php 
session_start();
?>

<!-- Page Heading -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pemborong</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
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
                            $query = "SELECT * FROM user WHERE user_role = '3' ";
                            
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
                                
                                
                                            //Set as global
                                            $_SESSION['buyer_id'] = $row["user_id"];
                                            $_SESSION['buyer_name'] = $row["user_username"];
                                         
                                
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