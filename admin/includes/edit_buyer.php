<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

    //View data
    if(isset($_GET['b_id'])){

        $buyer_id = $_GET['b_id'];

        $query  =  "SELECT * FROM buyer WHERE buyer_id = $buyer_id ";    
        $select_buyers_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_buyers_query)){

          $buyer_name   = escape($row['buyer_name']);
          $buyer_email  = escape($row['buyer_email']);
          $buyer_phoneNo= escape($row['buyer_phoneNo']);
        }
    }

    //Update data
    if(isset($_POST['edit_buyer'])){
        
        $buyer_name     = escape($_POST['buyer_name']);
        $buyer_email    = escape($_POST['buyer_email']);
        $buyer_phoneNo  = escape($_POST['buyer_phoneNo']);

        //UPDATE query
        $query = "UPDATE buyer SET                           ";
        $query .= "buyer_name        = '{$buyer_name}',   ";
        $query .= "buyer_email       = '{$buyer_email}',  ";
        $query .= "buyer_phoneNo     = '{$buyer_phoneNo}' ";
        $query .= "WHERE buyer_id    =  {$buyer_id}       ";

        $edit_buyers_query = mysqli_query($connection,$query);
        confirmQuery($edit_buyers_query);
    }

?>



<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">


<!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Kemaskini Pemborong/Pembeli</h6>
        </div>
        <div class="card-body">



        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nama</label>
            <input type="text" class="form-control" name="buyer_name" placeholder="" value="<?php echo $buyer_name; ?>" required="Isi nama produk">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Emel </label>
            <input type="text" class="form-control" name="buyer_email" placeholder="" value="<?php echo $buyer_email; ?>" required="">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">Nombor Telefon</label>
            <input type="text" class="form-control" name="buyer_phoneNo" placeholder="" value="<?php echo $buyer_phoneNo; ?>" required="">
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
            </div>
        </div>
        
    
        <div class="form-group">
                <input class="btn btn-primary" type="submit" name="edit_buyer" value="Kemaskini">
        </div>



</div>
</div>
</form> 
