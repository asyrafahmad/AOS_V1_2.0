
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>

        

<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Produk</h1>
          </div>

      <!-- Starting of profile content-->
      <div class="card  mb-4">
        <div class="card-body">
            
        <div class="row">
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> 
        </div>
            <br><br>
            
            
<!--
            
            echo "<div class='card shadow mb-4 py-3 '>";    
                                echo "<div class='card-body'> ";        
                                echo "<div class='row'>";  
-->
                                
            
<!--            Select category items-->
            <div class="card shadow mb-4 py-3 ">
                <div class="card-body">     
                    <div class="row">

                        <?php

                            $query  =  "SELECT * FROM product ";    
                            $select_product = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_product)){

                                $product_image = escape($row['product_image']);
                                $product_category = escape($row['product_category']);


                                echo "<div class='card-body col-xl-2' align='center'>";
                                echo "<a href='product.php?p_c=$product_category'><img style='height:100px; width:' src='../img/$product_image' alt=''></a>";
                                echo "<a class='align-items-center'>$product_category</a>";
                                echo "</div>";   
                                
                                
//                                echo "<div class='col-xl-3 col-md-6 '>";
//                                echo "<div class='card shadow '>";
//                                echo "<div class='card-body''>";
//                                echo "<div class='row no-gutters align-items-center'>";
//                                echo "<a href=''><img style='height:50px; width:' src='../img/$product_image' alt=''></a>";
//                                echo "</div>";   
//                                echo "</div>";  
//                                echo "</div>"; 
//                                echo "</div>";
                            }
                        ?>

                      </div>
                </div>
              </div>
            
            
                    <!-- select sub-category items-->        
                      <?php
                        
                        if(isset($_GET['p_c'])){
                           
                            $product_category = $_GET['p_c'];
                            
                            echo "<div class='card shadow mb-4 py-3' align='center'>";    
                            echo "<div class='card-body'> ";        
                            echo "<div class='row'>";
                            
                            $query  =  "SELECT * FROM product WHERE product_category = '{$product_category}'";    
                            $select_product = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_product)){

                                $product_id = escape($row['product_id']);
                                $product_image = escape($row['product_image']);
                                $product_name = escape($row['product_name']);
                                $product_current_price = escape($row['product_current_price']);
                                $product_image = escape($row['product_image']);


                                echo "<div class='col-xl-2'>";
                                echo "<div class='card shadow '>";
                                echo "<div class='card-body'>";
                                echo "<div class='no-gutters align-items-center'>";
                                echo "<a href='product.php?b_p_id={$product_id}'><img style='height:50px;' src='../img/$product_image' alt=''></a>";
                                echo "</div>";
                                echo "<h4>$product_name</h4>";
                                echo "<h6>RM$product_current_price</h6>";
                                echo "<a class='btn btn-info' href='product.php?b_p_id={$product_id}'>Tambah ke troli</a>";
                                echo "</div>";  
                                echo "</div>"; 
                                echo "</div>";
                            }
                             echo "</div>";  
                            echo "</div>"; 
                            echo "</div>";
                        }
                    ?>

            

                
                      <?php
                
                       if(isset($_GET['b_p_id'])){
                           
                            $product_id = $_GET['b_p_id'];
                           
                            echo "<div class='card shadow mb-4 py-3 '>";    
                            echo "<div class='card-body'> ";        
                            echo "<div class='row'>";
                           

                            $query  =  "SELECT * FROM product WHERE product_id = '{$product_id}'";    
                            $select_product = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_product)){

                                $product_image = escape($row['product_image']);
                                $product_name  = escape($row['product_name']);
                                $product_description  = escape($row['product_description']);
                                $product_current_price = escape($row['product_current_price']);
                                $product_image = escape($row['product_image']);
                                $product_quantity = escape($row['product_quantity']);


                                echo "<div class='col-md-6 mb-3' align='center'>";
                                echo "<label for='lastName'>";
                                echo "<img class='' src='../img/$product_image' width='400' height='250'>";   
                                echo "</label>";
                                echo "</div>";
                                
                                
                                echo "<div class='col-md-6 mb-3'";
                                echo "<h1>$product_name</h1><br>";
                                echo "<label>$product_description</label>";
                                echo "<p>Price: RM$product_current_price</p>";
                                echo "<p>Stock: $product_quantity</p>";
                                echo "<a class='btn btn-info' href='order.php?add=$product_id'>Tambah ke troli</a>";
                                echo "</div>";
                            } 
                           
                            echo "</div>";  
                            echo "</div>"; 
                            echo "</div>";
                       }
                    
                    ?>
<!--
                
                <div class="col-md-6 mb-3" align="center">
                <label for="lastName">
                    <img class="" src="../img/bg/aboutus_bg.png" width="400" height="250">
                </label>
              </div>
              <div class="col-md-6 mb-3">
                <label for="firstName">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</label>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
-->
              
                
                

            
            
        </div>
      </div> 
    
