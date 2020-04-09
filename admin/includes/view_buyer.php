<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



<?php

    if(isset($_GET['buyer_id'])){

        $user_id = $_GET['buyer_id'];

        $query = "SELECT * FROM user WHERE user_id = '{$user_id}'     ";

        $select_buyer_profile_query = mysqli_query($connection, $query);

        while($row = mysqli_fetch_array($select_buyer_profile_query)){

          $user_id      = escape($row['user_id']);
          $user_image   = escape($row['user_image']);
          $user_username    = escape($row['user_username']);
          $user_email   = escape($row['user_email']);
          $user_phone   = escape($row['user_phone']);
          $user_address = escape($row['user_address']);
          $user_website = escape($row['user_website']);
          //TOD0:date register

        }
    }

?>
                        
	<div class="col-xl-12 col-lg-5" align="center">
	  <div class="card shadow mb-4">
		<div class="card-header py-3">
		  <h6 class="m-0 font-weight-bold text-primary" >Profil Pemborong/Pembeli</h6>
		</div>
		  <div class="card-body">
			  <td align="center"><img height="25%" width="25%"src="../img/<?php echo $user_image;  ?>"  ></td>
			  <td><p for="user_name"><b>Nama: </b> <?php echo strtoupper("$user_username");  ?>  </p></td>
			  <td><p for="user_phone" ><b>No Telefon: </b>0<?php echo strtoupper("$user_phone");  ?>  </p></td>
			  <td><p for="user_email" ><b>Emel: </b> <?php echo strtoupper("$user_email");  ?>  </p></td>
			  <td><p for="user_address" ><b>Alamat: </b> <?php echo strtoupper("$user_address");  ?>  </p></td>
			  <td><p for="user_website" ><b>Website: </b> <?php echo strtoupper("$user_website");  ?>  </p></td>
		  </div>
	  </div>
    </div>