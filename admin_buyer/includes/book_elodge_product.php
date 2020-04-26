<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php

  
    $query  =  "SELECT * FROM elodge_product_book ";    
    $select_elodge_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($select_elodge_query)){

        $book_buyer_product_id     = escape($row['book_buyer_product_id']);
        $book_buyer_name           = escape($row['book_buyer_name']);
    }  


   if(isset($_SESSION['user_username'])){
                          
        $user_username = $_SESSION['user_username'];
    }


    //View data
    if(isset($_GET['b_e_p_id'])){

        $elodge_product_id = $_GET['b_e_p_id'];

        $query  =  "SELECT * FROM elodge_product WHERE elodge_product_id = $elodge_product_id";    
        $select_elodge_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_elodge_query)){

            $elodge_product_id           = escape($row['elodge_product_id']);
            $elodge_product_image           = escape($row['elodge_product_image']);
            $elodge_product_name            = escape($row['elodge_product_name']);
            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
            $elodge_product_amount_booked   = escape($row['elodge_product_amount_booked']);
            $elodge_product_status          = escape($row['elodge_product_status']);
                            
        }
    }

    //Update data
    if(isset($_POST['edit_elodge'])){
        

        $elodge_product_amount_booked    = escape($_POST['elodge_product_amount_booked']);
        
        if($elodge_product_amount_booked <= $elodge_product_quantity && !empty($elodge_product_amount_booked)){
            
       
            $query = "INSERT INTO elodge_product_book (book_buyer_product_id, book_buyer_name, book_buyer_product_quantity, book_buyer_product_name, book_buyer_product_image, book_buyer_product_date)  ";
            $query .= "VALUES('{$elodge_product_id}', '{$user_username}', '{$elodge_product_amount_booked}', '{$elodge_product_name}', '{$elodge_product_image}', now())  ";
            $create_buyer_query  =   mysqli_query($connection, $query);
            confirmQuery($create_buyer_query);
   
            
            $amount_left = (($elodge_product_quantity)-($elodge_product_amount_booked));
            
            $query = "UPDATE elodge_product SET                                         ";
            $query .= "elodge_product_quantity      = '{$amount_left}',                 ";
            $query .= "elodge_product_amount_booked = '{$elodge_product_amount_booked}',";
            $query .= "elodge_product_status        = 'Berjaya'    ";
            $query .= "WHERE elodge_product_id      =  {$elodge_product_id}             ";

            $edit_elodge_query = mysqli_query($connection,$query);
            confirmQuery($edit_elodge_query);
			
//			header("Location: ./includes/elodge.php" );
//          echo "<script>window.location='./order.php?menu=$menu'</script>";
            
            echo "<script>alert('Tempahan telah berjaya.')</script>";
        }
        else{
            echo "<script>alert('Sila isi maklumat pada ruangan kosong.')</script>";
        }
        
    }

   
?>



<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">

  
      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Produk</h6>
        </div>
        <div class="card-body">


        
        <div class="row">
          <div class="col-md-6 mb-3">
            <img width="100"  src="../img/<?php echo $elodge_product_image; ?>"  alt="image" class="rounded-circle" /><br><br>
            <label for="">Nama Produk : <?php echo $elodge_product_name; ?></label><br>
            <label for="">Kuantiti : <?php echo $elodge_product_quantity; ?></label>
          </div>
            
          <div class="col-md-6 mb-3">
            <label for="firstName">Jumlah Kuantiti Produk Tempahan</label>
            <input type="text" class="form-control" name="elodge_product_amount_booked" placeholder="<?php echo $elodge_product_quantity; ?>" value="" required="Isi nama produk" >
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
                             
            <div class="form-group">
                 <input class="btn btn-primary" type="submit" name="edit_elodge" value="Hantar">
            </div>
              
      
          </div>
        </div>



</div>
</div>  
</form> 




          <div class="card shadow mb-4">
         
            <div class="card-body">
              <div class="table-responsive">
                  
                  
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>Tarikh Tempahan Dibuat</th>
                        <th>Produk</th>
                        <th>Kuantiti Tempahan</th>

                    </tr> 
                  </thead>
                 
                  <tbody>
                      <?php
                
                        $user_username = $_SESSION['user_username'];


                        $query  =  "SELECT * FROM elodge_product_book WHERE book_buyer_name = '{$user_username}'   ";    
                        $elodge_book_query = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($elodge_book_query)){

                            $book_buyer_id                  = escape($row['book_buyer_id']);
                            $book_buyer_product_name         = escape($row['book_buyer_product_name']);
                            $book_buyer_product_image                  = escape($row['book_buyer_product_image']);
                            $book_buyer_product_date        = escape($row['book_buyer_product_date']);
                            $book_buyer_product_quantity    = escape($row['book_buyer_product_quantity']);

                            echo "<tr>";
                            echo "<td>$book_buyer_product_date</td>";
                            echo "<td>$book_buyer_product_name</td>";
                            echo "<td>$book_buyer_product_quantity</td>";
                            echo "</tr>";
                        }

                    ?>
                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
