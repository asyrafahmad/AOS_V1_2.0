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
                      <th>ID</th>
                      <th>Gambar</th>
                      <th>Petani</th>
                      <th>Email</th>
                      <th>No Telefon</th>
                      <th>Alamat</th>
                      <th>Laman Web</th>
                      <th>Tarikh Buka Akaun</th>
                      <th>Lihat</th>
                      <th>Kemaskini</th>
                      <th>Padam</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     
                    <!-- Get data in db and display  -->
                    <?php
                      
                        $query  =  "SELECT * FROM supplier ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $supplier_id = escape($row['supplier_id']);
                            $supplier_image = escape($row['supplier_image']);
                            $supplier_name = escape($row['supplier_name']);
                            $supplier_email = escape($row['supplier_email']);
                            $supplier_phone = escape($row['supplier_phone']);
                            $supplier_address = escape($row['supplier_address']);
                            $supplier_website = escape($row['supplier_website']);
                            $supplier_date_register = escape($row['supplier_date_register']);
                            
                            //Set as global
                            $_SESSION['supplier_id'] = $supplier_id;
                            $_SESSION['supplier_name'] = $supplier_name;
                            
                            echo "<tr>";
                            echo "<td>$supplier_id </td>";
                            echo "<td><img width='100'  src='../img/$supplier_image'  alt='image' class='rounded-circle' </td>";
                            echo "<td>$supplier_name  </td>";
                            echo "<td>$supplier_email  </td>";
                            echo "<td>$supplier_phone  </td>";
                            echo "<td>$supplier_address  </td>";
                            echo "<td>$supplier_website  </td>";
                            echo "<td>$supplier_date_register </td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td><a class='btn btn-info' href='supplier.php?source=view_supplier&s_id={$supplier_id}'>Lihat </a></td>";
                            echo "<td><a class='btn btn-info' href='supplier.php?source=edit_supplier&s_id={$supplier_id}'>Kemaskini </a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='users.php?delete={$user_id} '>Padam </a></td>";
                            echo "<td></td>";
                            echo "</tr>";

                                }
                         ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>