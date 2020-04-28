<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

    
<!-- Page Heading -->


              <div class="table-responsive elodge">     
<!--           TODO: put elodge_product table-->
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="thead-light">
                    <tr>
                      <th>Gambar</th>
                      <th>Nama Produk</th>
                      <th>Kuantiti (Kg)</th>
                      <th>Tarikh Menuai</th>
                      <th></th>
                    </tr>
                  </thead>
                 
                  <tbody>
                     <!-- Get data in db and display  -->
                    <?php
                    
                          
                        $query  =  "SELECT * FROM elodge_product ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $elodge_product_id              = escape($row['elodge_product_id']);
                            $elodge_product_name            = escape($row['elodge_product_name']);
                            $elodge_product_image           = escape($row['elodge_product_image']);
                            $elodge_product_quantity        = escape($row['elodge_product_quantity']);
                            $elodge_product_harvest_date    = escape($row['elodge_product_harvest_date']);
//                            $elodge_product_amount_booked   = escape($row['elodge_product_amount_booked']);
//                            $elodge_product_status          = escape($row['elodge_product_status']);
                            
                            //Set as global
                            $_SESSION['elodge_product_id'] = $elodge_product_id;
                            $_SESSION['elodge_product_name'] = $elodge_product_name;
                      ?>

                            <tr>
                              <td class="text-center"><img width='50' src='../img/<?php echo $elodge_product_image ?>'  alt='image' /></td>
                              <td class=""><?php echo "$elodge_product_name"?></td>
                              <td class=""><?php echo "$elodge_product_quantity"?></td>
                              <td class=""><?php echo "$elodge_product_harvest_date"?></td>
                              <td class="text-center"><a class="btn btn-success" href="e-lodge.php?menu=$menu&source=book_elodge_product&b_e_p_id={$elodge_product_id}">Tempah </a></td>
                            </tr>

                      <?php
                            }
                         ?>
                  </tbody>
                </table>
              </div>