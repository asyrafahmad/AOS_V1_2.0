<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Produk</h1>
          <p class="mb-4">Produk Petani. <a target="_blank" href="https://datatables.net">@PenerajuMedia.Sdn.Bhd</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Senarai E-Lodge Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                  
                  
<!--           TODO: put elodge_product table-->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>

<!--                      <th>ID</th>-->
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kuantiti</th>
                      <th>Tarikh Tempahan</th>
                      <th>Padam Tempahan</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                         if(isset($_SESSION['user_username'])){
                          
                            $user_username = $_SESSION['user_username'];
                        }
					  
                          
                        $query  =  "SELECT * FROM elodge_product_book WHERE book_buyer_name = '{$user_username}' ";    
                        $select_product_book = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_product_book)){

                            $book_buyer_id                    = escape($row['book_buyer_id']);
                            $book_buyer_product_name          = escape($row['book_buyer_product_name']);
                            $book_buyer_product_image         = escape($row['book_buyer_product_image']);
                            $book_buyer_product_quantity      = escape($row['book_buyer_product_quantity']);
                            $book_buyer_product_date          = escape($row['book_buyer_product_date']);
                            
                            //Set as global
//                            $_SESSION['elodge_product_id'] = $book_product_id;
//                            $_SESSION['elodge_product_name'] = $book_product_name;
                            
                            echo "<tr>";
                            echo "<td><img width='100'  src='../img/$book_buyer_product_image'  alt='image' class='rounded-circle' /></td>";
                            echo "<td>$book_buyer_product_name  </td>";
                            echo "<td>$book_buyer_product_quantity  </td>";
                            echo "<td>$book_buyer_product_date  </td>";
                            echo "<td><a class='btn btn-danger' onClick=\"javascript: return confirm('Anda pasti untuk padam maklumat ini? ');  \"  href='e-lodge.php?delete={$book_buyer_id} '>Padam </a></td>";
                            echo "</tr>";

                         }
                         ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>