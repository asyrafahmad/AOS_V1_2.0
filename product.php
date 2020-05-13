<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/Style.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
  <!-- Search data from db -->
  <script src="js/search_data.min.js"></script>
    
  <link rel="icon" type="image/ico" href="../img/bg/logo-152-03.png">


    
    

      
  <?php session_start(); ?>
	
	


</head>

    
    
    
<body id="page-top">
<div class="wrapper d-flex align-items-stretch">


    
    
       <nav id="sidebar" class="">

      <div class="p-4">

        <div class="row my-3">
          <button type="button" id="" class="btn btn-primary custom-menu">
            <img src="img/icon/double-chevron.png" height="24">
          </button>
        </div>

        <div class="row mb-4 justify-content-end">
          <button type="button" id="close">
            <img src="img/icon/close.png" height="18px">
          </button>
        </div>

          <h1 align="center"><a href="index.php" class="logo"><img src="img/bg/logo-02.png" class="logo"></a></h1>

              <ul class="list-unstyled components">

            
                <li id="menu" class="nav-item">
                    <a href="menu.php" class="nav-link">
                          <img src="img/icon/dashboard.svg" height="24px">
                          Menu
                    </a>
                  </li>

                  
                  <li id="dashboard" class="nav-item">
                    <a href="index.php?menu=<?php echo $menu; ?>" class="nav-link">
                          <img src="img/icon/dashboard.svg" height="24px">
                          Dashboard
                    </a>
                  </li>

                

                  <li id="product" class="nav-item">
                    <a href="product.php?menu=<?php echo $menu; ?>" class="nav-link">
                          <img src="img/icon/product.svg" height="24px">
                          Produk
                    </a>
                  </li>

                  <li id="order_history" class="nav-item">
                    <a href="order.php?menu=<?php echo $menu; ?>&source=view_all_order_products" class="nav-link">
                          <img src="img/icon/history.svg" height="24px">
                          Sejarah Pesanan
                      </a>
                  </li>

                  <li id="aboutus" class="nav-item">
                    <a href="../admin_buyer/aboutus.php?menu=<?php echo $menu; ?>" class="nav-link">
                        <img src="img/icon/aboutus.svg" height="24px">
                          Mengenai Kami
                      </a>
                  </li>

                <div class="sidebar_bottom">
                  <!-- <li id="profile" class="profile nav-item"> -->
                    <a href="profile.php?menu=<?php echo $menu; ?>&source=edit_profile" class="profile">
                      <img src="img/<?php echo $_SESSION['user_image'] ?>">
                    </a>
                  <!-- </li> -->

                  <li id="logout" class="nav-item p-4">
                    <a href="../includes/logout.php" class="nav-link">
                        <img src="img/icon/logout.svg" height="24px">
                          Keluar
                      </a>
                  </li>


    
    
    
    
    
    
    
    
    
    
  
  <!-- Page Content  -->
  <div id="content" class="">

    <div class="row justify-content-between py-4 px-5 fixed-top topnav">
          
  <button type="button" id="sidebarCollapse" class="btn" style="padding: 0;">
      <img src="img/icon/menu.png" height="36">
    </button>
    <a href="admin_supplier/profile.php" class="profile">
      <img src="img/<?php echo $_SESSION['user_image'] ?>">
    </a>

</div>

    <div class="container-fluid">
      
    <div class="row d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Produk</h1>
      <div class="add-to-cart" align="center">
        <div class="card p-2 ">
        <a href="order.php?menu=<?php echo $menu; ?>"><img height="32" width="32" src="img/icon/add-to-cart.png" ></a>
        </div>
      </div>
    </div>

    <!-- Content Row -->
    <div class="row">

     <div class="col-xl-12">
        <div class="card p-4 border">
          

       
            
            
            
            



   
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
//                                         echo "<script>window.location='./order.php?menu=$menu'</script>";
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
                        
				
		
                    
                    
			?>
                

                
            </form>
            
            
            
 
            
            
        </div>
            
 </div> 
</div>

<br>



            
           
            
            
            
            
            
        </div>
      </div>

    </div>


 

    </div>
      
      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agro Online System 2020 - Ver1.0</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  </div>


</div>


<?php  include "includes/admin_footer.php"; ?>