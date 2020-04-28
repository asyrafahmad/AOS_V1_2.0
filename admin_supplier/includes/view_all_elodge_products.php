<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->

          <!-- DataTales Example -->
          <!-- <div class="card shadow mb-4"> -->
       
			  
	
				  
		    <div class="card-header py-2">
                <div class="row">
<!--
					<div class="col-md-4">
						<form >
							<div class="input-group">
							  <input type="text" class="form-control bg-light border-1 " placeholder="Search for..." >
							  <div class="input-group-append">
								<button class="btn btn-primary" type="button">
								  <i class="fas fa-search fa-sm"></i>
								</button>
							  </div>
							</div>
						 </form>
					</div>
-->
					
				
				  <div class="col-md-12" align="center">
                     <div align="right"><a class="btn btn-success" href="e-lodge.php?source=add_elodge">+ Produk </a></div>
                  </div>
                </div>
            </div>      
			  
			  
			  
			  
			<?php
				if(isset($_GET['delete'])){

					$elodge_product_id = $_GET['delete'];

					$elodge_product_query = "DELETE FROM elodge_product WHERE elodge_product_id = {$elodge_product_id}	";
					$delete_query = mysqli_query($connection, $elodge_product_query);

					echo "<p>Produk e-lodge telah dibuang.</p>";
				}

			?>  
			  
			  
			  
            <!-- <div class="card-body"> -->
				
              <div class="table-responsive">
                  		  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

<!--                      <th>ID</th>-->
                      <th colspan="2" class="ml-2">Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Bulan Menuai</th>
                      <th>Jumlah Tempahan</th>
                      <!-- <th>Nama Pemborong</th> -->
                      <th></th>
<!--                      <th>Padam</th>-->
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                      
                      if(isset($_SESSION['user_id'])){
                          
                          $user_id = $_SESSION['user_id'];
                      }
                      
                          
                        $query  =  "SELECT *, SUM(book_buyer_product_quantity) as sum  FROM elodge_product JOIN elodge_product_book ON elodge_product.elodge_product_id = elodge_product_book.book_buyer_product_id WHERE elodge_product.elodge_supplier = '{$user_id}' GROUP BY elodge_product_book.book_buyer_name ";     
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $elodge_product_id              = escape($row['elodge_product_id']);
                            $elodge_product_name            = escape($row['elodge_product_name']);
                            $elodge_product_image           = escape($row['elodge_product_image']);
                            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
                            $elodge_product_harvest_date    = escape($row['elodge_product_harvest_date']);
                            $elodge_product_amount_booked   = escape($row['sum']);
                            $elodge_product_status          = escape($row['elodge_product_status']);
                            
                            $book_buyer_name          = escape($row['book_buyer_name']);
                            
                            //Set as global
                            $_SESSION['elodge_product_id'] = $elodge_product_id;
                            $_SESSION['elodge_product_name'] = $elodge_product_name;
                            
                            echo "<tr>";
//                            echo "<td>$elodge_product_id </td>";
                            echo "<td><img src='../img/$elodge_product_image'  alt='image' class='img-category ml-2' </td>";
                            echo "<td class='align-middle'>$elodge_product_name  </td>";
                            echo "<td class='align-middle'>$elodge_product_quantity  </td>";
                            echo "<td class='align-middle'>$elodge_product_harvest_date  </td>";
                            echo "<td class='text-info align-middle '>$elodge_product_amount_booked</td>";
                            // echo "<td class='text-info'>$book_buyer_name</td>";
//                            echo "<td>$elodge_product_status</td>";
                            
                            echo "<td class='text-center align-middle'><a class='btn ' href='e-lodge.php?source=view_elodge&e_p_id={$elodge_product_id}'><i class='fas fa-eye'></i></a>
                            <a class='btn' href='e-lodge.php?source=edit_elodge&e_p_id={$elodge_product_id}'><i class='fas fa-edit'></i></a></td>";
//                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? ');  \"  href='e-lodge.php?delete={$elodge_product_id} '>Padam </a></td>";
                            echo "</tr>";

                        }
                         ?>
                  </tbody>
                </table>
              </div>
           <!--  </div> -->
          <!-- </div> -->