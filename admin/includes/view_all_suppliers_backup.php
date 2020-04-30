<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    



<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Petani</h1>
          <p class="mb-4">Senarai Petani <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Petani</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
<!--                      <th>No</th>-->
                      <th>Gambar</th>
                      <th>Petani</th>
                      <th>No Telefon</th>
<!--                      <th>Jumlah Produk</th>-->
                      <th>Tarikh Buka Akaun</th>
                      <th>Profil petani</th>
                      <th>Kemaskini Profil Petani</th>
                      <th>Produk Petani</th>
<!--                      <th>Padam</th>-->
                    </tr>
                  </thead>
                 
                  <tbody>
                     
                    <!-- Get data in db and display  -->
                    <?php
                      
                        if(isset($_SESSION['user_id'])){
                          
                            $user_id = $_SESSION['user_id'];
                        }
                      
//                        $query  =  "SELECT *,count(product.product_quantity) as number FROM user  INNER JOIN product ON user.user_id = product.product_supplier WHERE user_role = '2' ";  
                        $query  =  "SELECT * FROM user WHERE user_role = '2' ";    
                        $select_suppliers = mysqli_query($connection, $query);


                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $user_id 			= escape($row['user_id']);
                            $user_image 		= escape($row['user_image']);
                            $user_name 			= escape($row['user_username']);
                            $user_email 		= escape($row['user_email']);
                            $user_phone 		= escape($row['user_phone']);
                            $user_address 		= escape($row['user_address']);
                            $user_website 		= escape($row['user_website']);
                            $user_date_register = escape($row['user_date_register']);
                            $user_website 		= escape($row['user_website']);
							
//							$product_quantity   = escape($row['number']);
                            
                            //Set as global
                            $_SESSION['supplier_id'] = $user_id;
                            $_SESSION['supplier_name'] = $user_name;
                            
                            echo "<tr>";
//                            echo "<td>$user_id </td>";
                            echo "<td><img width='100'  src='../img/$user_image'  alt='image' class='rounded-circle' </td>";
                            echo "<td>$user_name  </td>";
                            echo "<td>0$user_phone  </td>";
//                            echo "<td>$product_quantity</td>";
                            echo "<td>$user_date_register</td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td><a class='btn btn-info' href='supplier.php?source=view_supplier&supplier_id={$user_id}'>Lihat Profil </a></td>";
                            echo "<td><a class='btn btn-info' href='supplier.php?source=edit_supplier&supplier_id={$user_id}'>Kemaskini Profil</a></td>";
                            echo "<td><a class='btn btn-info' href='supplier.php?source=view_supplier_product&supplier_id={$user_id}'>Lihat Produk </a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='users.php?delete={$user_id} '>Padam </a></td>";
//                            echo "<td></td>";
                            echo "</tr>";

                                }
                         ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>