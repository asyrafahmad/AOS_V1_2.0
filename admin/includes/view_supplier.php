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
          $user_username    = escape($row['user_username']);
          $user_email   = escape($row['user_email']);
          $user_phone   = escape($row['user_phone']);
          $user_address = escape($row['user_address']);
          $user_image   = escape($row['user_image']);
          $user_website = escape($row['user_website']);
            
            
        }
    }

?>
                        
   <!-- DataTales Example -->
   <div class="row justify-content-center">
    <div class="col-xl-12 col-lg-6">
    <div class="card shadow ">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" align="center">Profil Petani</h6>
      </div>
      <div class="card-body" >
        <div class="row"  align="center">
          <div class="col-xl-12">
            <td align="center"><img class="img_profile mb-5" src="../img/<?php echo $user_image;  ?>"   ></td>
          </div>
        </div>
        <div class="row justify-content-center">
          <table class="table_profile">
            <tr>
              <td width="100" ><b>Nama </b> </td>
              <td width="200" for="user_name"><?php echo strtoupper("$user_username");  ?>  </td>
            </tr>
            <tr>
              <td width="100"><b>Emel </b> </td>
              <td width="200" for="user_email">0<?php echo strtoupper("$user_phone");  ?>  </td>
            </tr>
            <tr>
              <td width="100"><b>Alamat </b> </td>
              <td width="200" for="user_address"><?php echo strtoupper("$user_address");  ?>  </td>
            </tr>
            <tr>
              <td width="100"><b>Website </b> </td>
              <td width="200" for="user_website"><?php echo strtoupper("$user_website");  ?>  </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>  
   </div>

