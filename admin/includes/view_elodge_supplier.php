<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk</h1>
          <p class="mb-4">Produk Petani. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk E-Lodge</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

<!--                      <th>ID</th>-->
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Tarikh Menuai</th>
                      <th>Garis Panduan</th>
<!--
                      <th>Jumlah Ditempah</th>
                      <th>Status</th>
-->
<!--
                      <th>Lihat</th>
                      <th>Kemaskini</th>
-->
<!--                      <th>Padam</th>-->
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                      
                      if(isset($_SESSION['user_id'])){
                          
                          $user_id = $_SESSION['user_id'];
                      }
                      
                          
                        $query  =  "SELECT * FROM elodge_product  ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $elodge_product_id              = escape($row['elodge_product_id']);
                            $elodge_product_name            = escape($row['elodge_product_name']);
                            $elodge_product_image           = escape($row['elodge_product_image']);
                            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
                            $elodge_product_harvest_date    = escape($row['elodge_product_harvest_date']);
                            $elodge_product_amount_booked   = escape($row['elodge_product_amount_booked']);
                            $elodge_product_status          = escape($row['elodge_product_status']);
                            
                            //Set as global
                            $_SESSION['elodge_product_id'] = $elodge_product_id;
                            $_SESSION['elodge_product_name'] = $elodge_product_name;
                            
                            echo "<tr>";
//                            echo "<td>$elodge_product_id </td>";
                            echo "<td><img width='100'  src='../img/$elodge_product_image'  alt='image' class='rounded-circle' </td>";
                            echo "<td>$elodge_product_name  </td>";
                            echo "<td>$elodge_product_quantity  </td>";
                            echo "<td>$elodge_product_harvest_date  </td>";
                            echo "<td><input type='file'  name='user_image'></td>";     
//                            echo "<td></td>";
//                            echo "<td>$elodge_product_status</td>";
                            
//                            echo "<td><a class='btn btn-info' href='e-lodge.php?source=view_elodge&e_p_id={$elodge_product_id}'>Lihat </a></td>";
//                            echo "<td><a class='btn btn-info' href='e-lodge.php?source=edit_elodge&e_p_id={$elodge_product_id}'>Kemaskini </a></td>";
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