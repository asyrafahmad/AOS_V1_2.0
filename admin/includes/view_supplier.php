<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['supplier_id'])){

        $user_id = $_GET['supplier_id'];

        $query = "SELECT * FROM user WHERE user_id = '{$user_id}'     ";

        $select_supplier_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_supplier_profile_query)){

          $user_id      = escape($row['user_id']);
          $user_name    = escape($row['user_name']);
          $user_email   = escape($row['user_email']);
          $user_phone   = escape($row['user_phone']);
          $user_address = escape($row['user_address']);
          $user_image   = escape($row['user_image']);
          $user_website = escape($row['user_website']);
            
            
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
                            <tr><label for="user_fullname" ><?php echo "<td><img  width='50' height='50'  src='../IMG/$user_image'</td>"; ?>  </label></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_name");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_email");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_phone");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_address");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_name");  ?>  </label></td></tr>
                            <tr><td><label for="user_fullname" > <?php echo strtoupper("$user_website");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>