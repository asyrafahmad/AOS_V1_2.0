<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['s_id'])){

        $supplier_id = $_GET['s_id'];

        $query = "SELECT * FROM supplier WHERE supplier_id = '{$supplier_id}'     ";

        $select_supplier_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_supplier_profile_query)){

          $supplier_id = escape($row['supplier_id']);
          $supplier_name = escape($row['supplier_name']);
          $supplier_email = escape($row['supplier_email']);
          $supplier_phone = escape($row['supplier_phone']);
          $supplier_address = escape($row['supplier_address']);
          $supplier_image = escape($row['supplier_image']);
          $supplier_website = escape($row['supplier_website']);
            
            
        }
    }

?>
                        
   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" align="center">Profil Petani</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="" >
                      <tr>
                           <table class="" align="center">
                            <tr><label for="user_fullname" ><?php echo "<td><img  width='50' height='50'  src='../IMG/$supplier_image'</td>"; ?>  </label></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_name");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_email");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_phone");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_address");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_name");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$supplier_website");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>