<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['b_id'])){

        $buyer_id = $_GET['b_id'];

        $query = "SELECT * FROM buyer WHERE buyer_id = '{$buyer_id}'     ";

        $select_buyer_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_buyer_profile_query)){

          $buyer_id = escape($row['buyer_id']);
          $buyer_name = escape($row['buyer_name']);
          $buyer_email = escape($row['buyer_email']);
          $buyer_phoneNo = escape($row['buyer_phoneNo']);
          //TOD0:date register
            
            
        }
    }

?>
                        
   <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary" align="center">Profil Pemborong/Pembeli</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  <table class="" >
                      <tr>
                           <table class="" align="center">
                            <tr><td><label for="buyer_name" > <?php echo strtoupper("$buyer_name");  ?>  </label></td></tr>
                            <tr><td><label for="buyer_email" > <?php echo strtoupper("$buyer_email");  ?>  </label></td></tr>
                            <tr><td><label for="buyer_phoneNo" > <?php echo strtoupper("$buyer_phoneNo");  ?>  </label></td></tr>
                          </table>
                      </tr>
                  </table>
                 
                  
              </div>
            </div>
          </div>