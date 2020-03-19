<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>


<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Pemborong</h1>
          <p class="mb-4">Senarai Pemborong. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Pemborong</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Emel</th>
                      <th>Nombor Telefon</th>
                      <th>Date Register</th>
                      <th>Lihat</th>
                      <th>Kemaskini</th>
                      <th>Padam</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                  
                     <?php
                      
                        $query  =  "SELECT * FROM buyer ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $buyer_id = escape($row['buyer_id']);
                            $buyer_name = escape($row['buyer_name']);
                            $buyer_email = escape($row['buyer_email']);
                            $buyer_phone = escape($row['buyer_phoneNo']);
                            
                            //Set as global
                            $_SESSION['buyer_id'] = $buyer_id;
                            $_SESSION['buyer_name'] = $buyer_name;
                            
                            echo "<tr>";
                            echo "<td>$buyer_id </td>";
                            echo "<td>$buyer_name  </td>";
                            echo "<td>$buyer_email  </td>";
                            echo "<td>$buyer_phone  </td>";
                            echo "<td>Date</td>";
                            
//                            echo "<td><a href='users.php?change_to_admin={$user_id} '>Admin </a></td>";
//                            echo "<td><a href='users.php?change_to_subscriber={$user_id} '>Atlet </a></td>";
                            echo "<td><a class='btn btn-info' href='buyer.php?source=view_buyer&b_id={$buyer_id}'>Lihat </a></td>";
                            echo "<td><a class='btn btn-info' href='buyer.php?source=edit_buyer&b_id={$buyer_id}'>Kemaskini </a></td>";
                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Are you sure you want to delete? ');  \"  href='buyer.php?delete={$buyer_id} '>Padam </a></td>";
                            echo "</tr>";

                                }
                         ?>
                   
                  </tbody>
                </table>
              </div>
            </div>
          </div>