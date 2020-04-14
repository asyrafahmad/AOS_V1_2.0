<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>




<?php
    
   if(isset($_SESSION['user_username'])){
                          
        $user_username = $_SESSION['user_username'];
    }

    //Add ebargain data
    if(isset($_POST['add_ebargain_product'])){
        
        $ebargain_product_name              = escape($_POST['ebargain_product_name']);
        $ebargain_product_quantity          = escape($_POST['ebargain_product_quantity']);
        $ebargain_product_month             = escape($_POST['ebargain_product_month']);

		
		if(!empty($ebargain_product_name)  &&  !empty($ebargain_product_quantity) &&  !empty($ebargain_product_month) ){
            
			$query = "INSERT INTO ebargain_product (ebargain_buyer_name, ebargain_product_name, ebargain_product_quantity, ebargain_product_month, ebargain_product_date_requested)  ";
			$query .= "VALUES('{$user_username}', '{$ebargain_product_name}', '{$ebargain_product_quantity}', '{$ebargain_product_month}', now())  ";
			$add_ebargain_query  =   mysqli_query($connection, $query);
			confirmQuery($add_ebargain_query);
			
			echo "<p class=''>Produk E-Bargain telah berjaya ditambah</p>";
		}else{
			echo "<script>alert('Terdapat kekosongan pada maklumat produk')</script>";
		}
        
    }

?>



<!-- enctype is   -->
<form action="" method="post" enctype="multipart/form-data">

  
      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Tambah Produk E-Bargain</h6>
        </div>
        <div class="card-body">


          <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama Produk</label>
                <input type="text" class="form-control" name="ebargain_product_name" placeholder="" value="" required="Isi nama produk">
              </div> 
              <div class="col-md-6 mb-3">
                <label for="firstName">Kuantiti</label>
                <input type="text" class="form-control" name="ebargain_product_quantity" placeholder="" value="" required="Isi nama produk">
              </div>
          </div>   
            
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Dijangka Terima Pada Bulan</label>
                <input type="text" class="form-control" name="ebargain_product_month" placeholder="" value="" required="Isi nama produk">
              </div>
            </div>
            
             <div class="form-group">
                <input class="btn btn-primary" type="submit" name="add_ebargain_product" value="Hantar">
            </div>


          </div>
</div>  
</form> 
