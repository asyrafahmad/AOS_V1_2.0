<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai Produk E-Lodge</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Pemborong</th>
                      <th>Kuantiti (Kg)</th>
                    </tr>
                  </thead>
                 
                  <tbody>
					  
                    <?php
					  
					  	if(isset($_GET['e_p_id'])){
							
							$elodge_product_id = $_GET['e_p_id'];
						}
                      
                        global $connection;
					  
					             
                        $query  =  "SELECT * FROM elodge_product JOIN elodge_product_book ON elodge_product.elodge_product_id = elodge_product_book.book_buyer_product_id  WHERE book_buyer_product_id = '{$elodge_product_id}'";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            
                            $book_buyer_name            	= escape($row['book_buyer_name']);
                            $book_buyer_product_quantity    = escape($row['book_buyer_product_quantity']);
                            

                            echo "<tr>";
                            echo "<td>$book_buyer_name  </td>";
                            echo "<td>$book_buyer_product_quantity  </td>";
                            echo "</tr>";

                                }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>