
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>





<?php
//echo '<meta http-equiv=Refresh content="2;url=order.php?reload=1">';



        //ADD-TO-CART    
        if(isset($_POST['add_to_cart'])){
            
            for($i = 0; $i <= 10; $i++){
                   $product_name = $_POST['item_name_'.$i];
            }
         

            $query = "INSERT INTO buyer_order_product (b_o_product_name ";
            $add_to_cart_query .= "VALUES('{$product_name}' )  ";

            $create_post_query  =   mysqli_query($connection, $add_to_cart_query);

            confirmQuery($create_post_query);

        }
        //ADD-TO-CART

?>



   
<!-- Page Heading -->

      <!-- Starting of profile content-->
      <div class="card shadow mb-6">
        <div class="card-body">
            
            
        <div class="row" >
            &nbsp;&nbsp;&nbsp;<h1>Troli</h1>
        </div>
            
        <div class="">
            <form action="" method="post">
                <div class="table-responsive">
                <table class="table order">
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
                                    if($product_quantity != $_SESSION['product_quantity_'.$_GET['add']]){
                                        
                                        $_SESSION['product_quantity_'.$_GET['add']] +=1;
                                         echo "<script>window.location='./order.php?menu=$menu'</script>";
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
                        
                        
                            //function cart()
                            function cart(){
                                
                                
                            if(isset($_GET['menu'])){
                            
                                $menu = $_GET['menu'];
                            }
                        
                                
                            $total = 0;                //variable for total amount of all items
                            $total2 = 0;                //variable for total amount of all items
                            $total_quantity = 0;     //variable for total quantity of all items
                                
                            //STORE TO DB VARIABLES
                            $item_name = 1;
                            $item_number = 1;
                            $amount = 1;
                            $quantity = 1;
                                
                            foreach ($_SESSION as $name => $value){

                                if($value > 0){

                                if(substr($name, 0,17) == "product_quantity_"){

                                    $length = strlen("product_quantity_");

                                    $id = substr($name, 17, $length);

                                    global $connection;
									
//									$send_order = query("INSERT INTO orders (order_amount, order_transaction, order_status) VALUES ('{$amount}', '{$trasaction}', '{$status}')")
//									$last_id = last_id ();
//									confirmQuery($send_order);

                                    $query  =  "SELECT * FROM product WHERE product_id = " . escape($id) . " ";    
                                    $add_to_cart_query = mysqli_query($connection, $query);

                                    while ($row = mysqli_fetch_assoc($add_to_cart_query)){

                                        $product_id = escape($row['product_id']);
                                        $product_image = escape($row['product_image']);
                                        $product_name  = escape($row['product_name']);
                                        $product_category  = escape($row['product_category']);
                                        $product_gred  = escape($row['product_gred']);
                                        $product_price  = escape($row['product_price']);
                                        $product_quantity  = escape($row['product_quantity']);
                                        $product_current_price  = escape($row['product_current_price']);
                                        
                                        $total_price = $product_price*$value;
                                        $total_price_afterConvert = ($product_price*$value)/0.01;
                                        $total_quantity += $value;

                                        echo"<tr>";
                                        echo"<td><img class='' src='../img/$product_image' width='50' height='50'> </td>";
                                        echo"<td>$product_name</td>";
                                        echo"<td>RM$product_price</td>";
                                        echo"<td>
                                        <a class='btn btn-warning' href='order.php?menu=$menu&remove={$product_id}'><span class='glyphicon glyphicon-minus'>-</span></a>
                                        <a class='btn'><span class='glyphicon glyphicon-minus'>$value</span></a>
                                        <a class='btn btn-success' href='order.php?menu=$menu&add={$product_id}'><span class='glyphicon glyphicon-plus'>+</span></a></td>";
                                        echo"<td>RM$total_price</td>";
                                        echo"<td>
                                            
                                            <a class='btn btn-danger' href='order.php?menu=$menu&delete={$product_id}'><span class='glyphicon glyphicon-remove'>x</span></a>
                                            </td>";
                                        echo"</tr>";
                                        
                                        
                                        //STORE ITEM INTO DATABASE
                                        echo "<input type='hidden' name='item_name_{$item_name}' value='{$product_name}'    >";
                                        echo "<input type='hidden' name='item_number_{$item_number}' value='{$product_id}'  >";
                                        echo "<input type='hidden' name='amount_{$amount}' value='{$total_price}'           >";
                                        echo "<input type='hidden' name='quantity_{$quantity}' value='{$value}'             >";
                                        
                                        
                                        $item_name++;
                                        $item_number++;
                                        $amount++;
                                        $quantity++;
                               

                                        }
                                    
                                    
                                    $_SESSION['total_price'] = $total += $total_price;
                                    $_SESSION['total_price_afterConvert'] = $total2 += $total_price_afterConvert;
                                    $_SESSION['item_total_quantity'] = $total_quantity;
                                    $_SESSION['product_id'] = $product_name;
                                    
                                    
                                    }
                                }
                                elseif($value == 0){
                                    $_SESSION['item_total_price'] = $total;
                                    $_SESSION['item_total_quantity'] = $total_quantity;
                                    
                                }

                            }
                                     
                        }
                        //function cart()
                        
                        
    
                        ?>
                        
                         <?php cart(); ?>
                        
                        <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total: &nbsp;<span class="amount"><?php echo $_SESSION['item_total_quantity'] ?></span></strong></td>
                        <td><strong><span class="amount">RM<?php echo $_SESSION['total_price']; ?></span></strong></td>
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
            </div>
                
                
         	<?php 
                 if(isset($_GET['menu'])){
                            
                    $menu = $_GET['menu'];
                }
                        
				
				if($_SESSION['item_total_quantity'] >= 1){ 
					
				echo "<div class='col-xs-1' align='center'>";
                echo "<td><a class='btn btn-success' href='./includes/createBill.php?menu=$menu'>Seterusnya </a></td>";
            	echo "</div>";
                    
                    
                    
                    
			?>
                
                
<!--
            <div class="col-xs-1" align="center">
                <td><a class='btn btn-success' href='./includes/createBill.php'>Seterusnya </a></td>
            </div>
-->
    
         	<?php 
				
				}
				else{ 
					
					echo "<script>alert('Tiada barang di dalam troli')</script>"; 
					echo "<script>window.location='./product.php?menu=$menu'</script>";
				}  
			?>
                
            
                
            </form>
            
            
            
 
            
            
        </div>
            
 </div> 
</div>

<br>




<!--



<div class="card shadow mb-6">
<div class="card-body">

   
                <div class="">
                <h2>Jumlah Keseluruhan</h2>
                    
                <table class="table table-bordered" cellspacing="0">

                    <tr class="cart-subtotal">
                    <th>Gambar:</th>
                    <th>Nama Produk:</th>
                    <th>Kuantiti:</th>
                   
                    </tr>
                    <tr class="cart-subtotal">
                     <td><span class="amount">4</span></td>
                     <td><span class="amount">4</span></td>
                     <td><span class="amount">4</span></td>
                   
                    </tr>

            
                </table>
                    
                <hr>
                    
                    
                    
                    
                    
                <hr>

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
                </table>
                    
                <hr>
                    
                </div>

</div> </div>
    
    -->
