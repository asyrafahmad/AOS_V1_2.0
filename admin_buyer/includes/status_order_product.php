


<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>


   
    <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Status</h1>
          </div>


      <!-- Starting of profile content-->
      <div class="card shadow mb-6">
        <div class="card-body">
            
            
        <div class="row" >
            &nbsp;&nbsp;&nbsp;<h1>Pengesahan Pembelian</h1>
        </div><br>
            
        <div class="">
            <form action="" method="post">
<!--                <table class="table table-striped">-->
                <table class="table ">
                    <thead>
                      <tr>
                       <th>Gambar</th>
                       <th>Nama produk</th>
                       <th>Harga</th>
                       <th>Kuantiti</th>
                       <th>Jumlah Harga</th>
                       <th></th>
                      </tr>
                    </thead>
                    <tbody>
                        

                        <?php
                        
                        
                          if(isset($_GET['add'])) {
                                
                                $query  =  "SELECT * FROM product WHERE product_id =". escape($_GET['add']) . " ";    
                                $order_product_query = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($order_product_query)){

                                    $product_quantity  = escape($row['product_quantity']);
                                    
                                    //if order product doesn't exceed the quantity product store
                                    if($product_quantity != $_SESSION['product_quantity_' . $_GET['add']]){
                                        
                                        $_SESSION['product_quantity_' . $_GET['add']] +=1;
                                    }
                                    else{
                                        echo "<script>alert('Maaf ! Jumlah stok tidak mencukupi.')</script>";
                                    } 
                                }
                            }
                        
                        
                            if(isset($_GET['remove'])){
                                
                                if($_SESSION['product_quantity_' . $_GET['remove']] > 0){
                                    
                                     $_SESSION['product_quantity_' . $_GET['remove']]--;
                                }
                                else{
                                    echo "<script>alert('Gagal untuk membuang kuantiti')</script>";
                                }
                            }
                        
                        
                            if(isset($_GET['delete'])){
                                
                                $_SESSION['product_quantity_' . $_GET['delete']] = 0;
                            }
                        
                        
                            function cart(){
                                
                            $total = 0;         //variable for total amount of all items
                            $total_quantity = 0;     //variable for total quantity of all items
                                
                            foreach ($_SESSION as $name => $value){

                                if($value > 0){

                                if(substr($name, 0,17) == "product_quantity_"){

                                    $length = strlen("product_quantity_");

                                    $id = substr($name, 17, $length);

                                    global $connection;

                                    $query  =  "SELECT * FROM product WHERE product_id = " . escape($id) . " ";    
                                    $add_to_cart_query = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($add_to_cart_query)){

                                        $product_id = escape($row['product_id']);
                                        $product_image = escape($row['product_image']);
                                        $product_name  = escape($row['product_name']);
                                        $product_price  = escape($row['product_price']);
                                        $product_quantity  = escape($row['product_quantity']);
                                        $product_current_price  = escape($row['product_current_price']);

                                        $total_price = $product_price*$value;
                                        $total_quantity += $value;

                                        echo"<tr>";
                                        echo"<td><img class='' src='../img/$product_image' width='50' height='50'> </td>";
                                        echo"<td>$product_name</td>";
                                        echo"<td>RM$product_price</td>";
                                        echo"<td>$value</td>";
                                        echo"<td>$total_price</td>";
                                        echo"<td><a class='btn btn-warning' href='order.php?menu=$menu&remove={$product_id}'><span class='glyphicon glyphicon-minus'>-</span></a>
                                            <a class='btn btn-success' href='order.php?menu=$menu&add={$product_id}'><span class='glyphicon glyphicon-plus'>+</span></a>
                                            <a class='btn btn-danger' href='order.php?menu=$menu&delete={$product_id}'><span class='glyphicon glyphicon-remove'>x</span></a>
                                            </td>";
                                        echo"</tr>";

                                    }
                                    
                                    $_SESSION['item_total_price'] = $total += $total_price;
                                    $_SESSION['item_total_quantity'] = $total_quantity;
                                    
                                }
                                }
                                elseif($value == 0){
                                    $_SESSION['item_total_price'] = $total;
                                    $_SESSION['item_total_quantity'] = $total_quantity;
                                    
                                }

                            }
                            }
                        
                        
                        
                        
                        
                        
                        
                        
//                            if(isset($_GET['add'])) {
//                                
//                                $order_product_id = $_GET['add'];
//
//                                $query  =  "SELECT * FROM product WHERE product_id = '{$order_product_id}'";    
//                                $order_product_query = mysqli_query($connection, $query);
//
//                                while ($row = mysqli_fetch_assoc($order_product_query)){
//
//                                    $product_image = escape($row['product_image']);
//                                    $product_name  = escape($row['product_name']);
//                                    $product_quantity  = escape($row['product_quantity']);
//                                    $product_price  = escape($row['product_price']);
//
//                                    //if order product doesn't exceed the quantity product store
//                                    if($product_quantity != $_SESSION['product_quantity_' . $order_product_id]){
//                                        
//                                        $product_quantity = $_SESSION['product_quantity_' . $_GET['add']] +=1;
//                                        
//                                        $total_price = $product_quantity*$product_price;
//                                        
//                                        echo"<tr>";
//                                        echo"<td><img class='' src='../img/$product_image' width='50' height='50'> </td>";
//                                        echo"<td>$product_name</td>";
//                                        echo"<td>RM$product_price</td>";
//                                        echo"<td>$product_quantity </td>";
//                                        echo"<td>RM$total_price</td>";
//                                        echo"<td><a href='order.php?remove=$order_product_id'>Remove</a></td>";
//                                        echo"<td><a href='order.php?delete=1'>Delete</a></td>";
//                                        echo"</tr>";
//                                    }
//                                    else{
//                                        
////                                        set_message("Maaf ! Jumlah stok tidak mencukupi.");
////                                        redirect("../order.php");
////                                        
//                                        echo "<script>alert('Maaf ! Jumlah stok tidak mencukupi.')</script>";
//                                    } 
//                                }
//                            }
                        
                            
//                            if(isset($_GET['remove'])){
//                                
//                                $order_product_id = $_GET['remove'];
//                                
//                                $query  =  "SELECT * FROM product WHERE product_id = '{$order_product_id}'";    
//                                $order_product_query = mysqli_query($connection, $query);
//
//                                while ($row = mysqli_fetch_assoc($order_product_query)){
//
//                                    $product_image = escape($row['product_image']);
//                                    $product_name  = escape($row['product_name']);
//                                    $product_quantity  = escape($row['product_quantity']);
//                                    $product_price  = escape($row['product_price']);
//
//                                    //if order product doesn't exceed the quantity product store
//                                    if( $_SESSION['product_quantity_' . $order_product_id] >= 0){
//                                        
//                                        $product_quantity = $_SESSION['product_quantity_' . $_GET['remove']] --;
//                                        
//                                        $total_price = $product_quantity*$product_price;
//                                        
//                                        echo"<tr>";
//                                        echo"<td><img class='' src='../img/$product_image' width='50' height='50'> </td>";
//                                        echo"<td>$product_name</td>";
//                                        echo"<td>RM$product_price</td>";
//                                        echo"<td>$product_quantity </td>";
//                                        echo"<td>RM$total_price</td>";
//                                        echo"<td><a href='order.php?remove=$order_product_id'>Remove</a></td>";
//                                        echo"<td><a href='order.php?delete=1'>Delete</a></td>";
//                                        echo"</tr>";
//                                    }
//                                    else{
//                                        
////                                        set_message("Maaf ! Jumlah stok tidak mencukupi.");
////                                        redirect("../order.php");
////                                        
//                                        echo "<script>alert('Kuantiti sudah kosong.')</script>";
//                                    }
//                                }
//                              
//                            }
                        
//                            if(isset($_GET['delete'])){
//                                
//                                $_SESSION['product_quantity_' . $_GET['delete']] = 0;
//                                redirect("");
//                            }
                            
                            
//                            function cart(){
//                                
//                            //array, $name of the product, $value is the ID product
//                            foreach($_SESSION as $name => $value){
//                                
//                                if($value > 0){
//                                    
//                                //if substr count number is equal to number of word "product_"
//                                if(substr($name, 0, 8 ) == "product_"){
//                                    
////                                    $length = strlen($name - 8);
//                                    $length = strlen("product_");
//                                    
//                                    $id = substr($name, 8 , $length);
//
//                                    
//                                    global $connection;
//
//                                    $query = "SELECT * FROM product WHERE product_id = " . escape($id). " ";
//                                    $add_to_cart_query = mysqli_query($connection, $query);
//
//                                    while ($row = mysqli_fetch_assoc($add_to_cart_query)){
//
//                                        $product_image = escape($row['product_image']);
//                                        $product_name  = escape($row['product_name']);
//                                        $product_quantity  = escape($row['product_quantity']);
//                                        $product_price  = escape($row['product_price']);
//
//                                        $total_price = $product_price*$value;
//
//                                        echo"<tr>";
//                                        echo"<td><img class='' src='../img/$product_image' width='50' height='50'> </td>";
//                                        echo"<td>$product_name</td>";
//                                        echo"<td>RM$product_price</td>";
////                                        echo"<td>$product_quantity </td>";
//                                        echo"<td>{$value} </td>";
//                                        echo"<td>RM$total_price</td>";
//                                        echo"<td><a class='btn btn-warning' href='order.php?remove=1'><span class='glyphicon glyphicon-minus'>-</span></a>
//                                        <a class='btn btn-success' href='order.php?add=1'><span class='glyphicon glyphicon-plus'>+</span></a>
//                                        <a class='btn btn-danger' href='order.php?delete=1'><span class='glyphicon glyphicon-remove'>x</span></a>
//                                        </td>";
//                                        echo"</tr>";
//                                    }
//
//                                }
//                                }
//
//                            }
//                                
//                               //$order_product_id = $_GET['remove'];
//                                
//                            }
                        
                        ?>
                        
                         <?php cart(); ?>
                        
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong><span class="amount"><?php echo $_SESSION['item_total_quantity'] ?></span></strong></td>
                        <td><strong><span class="amount">RM<?php echo $_SESSION['item_total_price']; ?></span></strong></td>
                        <td></td>
                        </tr>
                        
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        
                        
                    </tbody>
                </table>
                
                
                <div class="col-xs-4 pull-right">
                <h2>Jumlah Keseluruhan</h2>

                <table class="table table-bordered" cellspacing="0">

                    <tr class="cart-subtotal">
                    <th>Jumlah Barang:</th>
                    <td><span class="amount"> <?php echo $_SESSION['item_total_quantity'] ?></span></td>
                    </tr>

                    <tr class="shipping">
                    <th>Penghantaran</th>
                    <td>Percuma</td>
                    </tr>

                    <tr class="order-total">
                    <th>Jumlah Harga</th>
                    <td><strong><span class="amount">RM<?php echo $_SESSION['item_total_price']; ?></span></strong></td>
                    </tr>
                </table></div>
                
                
            </form>
        </div>
            
            
            
          </div> </div>
    