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
              <a href="index.php" ><img src="img/icon/double-chevron.png" height="24"></a>
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
                    <a href="index.php" class="nav-link">
                          <img src="img/icon/dashboard.svg" height="24px">
                          Menu
                    </a>
                  </li>

                  
                  <li id="dashboard" class="nav-item">
                    <a href="index.php" class="nav-link">
                          <img src="img/icon/dashboard.svg" height="24px">
                          Dashboard
                    </a>
                  </li>

                

                  <li id="product" class="nav-item">
                    <a href="index.php" class="nav-link">
                          <img src="img/icon/product.svg" height="24px">
                          Produk
                    </a>
                  </li>

                  <li id="order_history" class="nav-item">
                    <a href="index.php" class="nav-link">
                          <img src="img/icon/history.svg" height="24px">
                          Sejarah Pesanan
                      </a>
                  </li>

                
                  <li id="aboutus" class="nav-item">
                    <a href="index.php" class="nav-link">
                        <img src="img/icon/aboutus.svg" height="24px">
                          Mengenai Kami
                      </a>
                  </li>

                <div class="sidebar_bottom">
                  <!-- <li id="profile" class="profile nav-item"> -->
                    <a href="index.php" class="profile">
                      <img src="img/human.png">
                    </a>
                  <!-- </li> -->

                  <li id="logout" class="nav-item p-4">
                  </li>



                </div>             
              
              </ul>
        </div>
    </nav>
    
    
  
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
            <a href="index.php"><img height="32" width="32" src="img/icon/add-to-cart.png" ></a>
            </div>
          </div>
        </div>

        
        
        
        
    <div class="row">

     <div class="col-xl-20">
        <div class="card p-4 border">
          

       
            
            
            
            

<?php

        $product_id = $_GET['add'];
          
         $connection = mysqli_connect("localhost", "root", "", "agro_db");
    
            
        echo "<div class='card shadow mb-4 py-6'>";    
        echo "<div class='card-body'> ";        
        echo "<div class='row' align='center'>";


        $query  =  "SELECT * FROM product WHERE product_id = '{$product_id}'";    
        $select_product = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($select_product)){

            $product_image = $row['product_image'];
            $product_name  = $row['product_name'];
            $product_description  = $row['product_description'];
            $product_current_price = $row['product_current_price'];
            $product_image = $row['product_image'];
            $product_quantity = $row['product_quantity'];

            echo "<div class='col-md-4'>";
            echo "<div class='img-container'>";
            echo "<img class='card-img product_image' src='img/$product_image'>";		
            echo "</div>";	
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body product_detail'>";	
            echo "<h1 class='card-title product_name'>$product_name</h1>";		 
            echo "<p class='card-text'>$product_description</p>";		 
            echo "<h3 class='card-text product_price'>RM$product_current_price</h3>";		 
            echo "<p class='card-text'>Stok : $product_quantity</p>";		 
            echo "<a class='btn btn-success' href='login.php'>Tambah ke troli </a>";		 
            echo "</div>";
            echo "</div>";

        } 

        echo "</div>";  
        echo "</div>"; 
        echo "</div>"; 


?>
  


            
           
            
            
            
            
            
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