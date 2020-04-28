
<?php ob_start();   ?>
<?php include "../includes/db_connection.php";   ?>
<!-- to call file and make it available  -->
<?php include "../includes/functions.php";   ?>



			<!-- select category items--> 
			<?php
 
				echo "<div class='card-body'> ";        
				echo "<div class='row'>";        
				echo "<div class='col-xl-12 text-gray-800'><h2>Kategori</h2></div>";
				echo "</div>";
				echo "<div class='row' align='center'>"; 


				$query  =  "SELECT * FROM categories_product ";    
				$select_categories_product = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($select_categories_product)){

					$cat_product_title = escape($row['cat_product_title']);
					$cat_product_image = escape($row['cat_product_image']);

					echo "<div class='col-xl-3 col-md-4 col-sm-4 py-3'>";
					echo "<div class='card shadow'>";
					echo "<div class='card-body'>";
					echo "<div class='no-gutters align-items-center'>";
					echo "<a href='product.php?menu=$menu&p_c=$cat_product_title'><img class='img-category mb-2' width='40%' height='40%' src='../img/$cat_product_image' ></a><br>";
					echo "<a class='align-items-center cat-title'>$cat_product_title</a>";
					echo "</div>";   
					echo "</div>";   
					echo "</div>";   
					echo "</div>";


				}
				echo "</div>"; 
				echo "</div>";
	




//		<!-- select sub-category items-->        


			if(isset($_GET['p_c'])){

				$product_category = $_GET['p_c'];

				echo "<div class='card-body'> ";        
				echo "<div class='row'>";        
				echo "<div class='col-xl-12 text-gray-800'><h2>Sub-Kategori</h2></div>";
				echo "</div>";
				echo "<div class='row'  align='center'>"; 

				$query  =  "SELECT * FROM product WHERE product_category = '{$product_category}'";    
				$select_product = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($select_product)){

					$product_id = escape($row['product_id']);
					$product_image = escape($row['product_image']);
					$product_name = escape($row['product_name']);
					$product_current_price = escape($row['product_current_price']);
					$product_image = escape($row['product_image']);


					echo "<div class='col-xl-3 col-md-4 col-sm-6 py-3'>";
					echo "<div class='card shadow sub_category'>";
					echo "<div class='card-body'>";
					echo "<div class='no-gutters align-items-left'>";
					echo "<a href='product.php?menu=$menu&b_p_id={$product_id}'><img class='img-category mb-2' src='../img/$product_image' ></a>";
					echo "</div>";
					echo "<h4>$product_name</h4>";
					echo "<h6>RM$product_current_price</h6>";
					echo "<a class='btn btn-success' href='order.php?menu=$menu&add=$product_id'>Tambah ke troli</a>";
					echo "</div>";  
					echo "</div>"; 
					echo "</div>";
				}

				echo "</div>";  
				echo "</div>"; 
			}
//		<!-- select sub-category items-->   



//		<!-- view sub-category items-->   

		   if(isset($_GET['b_p_id'])){

				$product_id = $_GET['b_p_id'];

				echo "<div class='card shadow mb-4 py-6'>";    
				echo "<div class='card-body'> ";        
				echo "<div class='row' align='center'>";


				$query  =  "SELECT * FROM product WHERE product_id = '{$product_id}'";    
				$select_product = mysqli_query($connection, $query);

				while ($row = mysqli_fetch_assoc($select_product)){

					$product_image = escape($row['product_image']);
					$product_name  = escape($row['product_name']);
					$product_description  = escape($row['product_description']);
					$product_current_price = escape($row['product_current_price']);
					$product_image = escape($row['product_image']);
					$product_quantity = escape($row['product_quantity']);


					echo "<div class='col-md-4 mb-3'>";
					echo "<label for='lastName'>";
					echo "<img class='' src='../img/$product_image' width='70%' height='50%' >";   
					echo "</label>";
					echo "</div>";


					echo "<div class='col-md-8 mb-3'";
					echo "<p><h3><b>$product_name</b></h3></p>";
					echo "<p>Huraian: $product_description</p>";
					echo "<p>Harga: RM$product_current_price</p>";
					echo "<p>Kuantiti: $product_quantity</p>";
					echo "<a class='btn btn-success' href='order.php?menu=$menu&add=$product_id'>Tambah ke troli</a>";
					echo "</div>";
				} 

				echo "</div>";  
				echo "</div>"; 
				echo "</div>";
		   }
//		<!-- view sub-category items--> 

		?>
  
