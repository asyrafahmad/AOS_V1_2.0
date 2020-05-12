
<?php ob_start();   ?>
<?php session_start(); ?>



<?php

 
    $connection = mysqli_connect("localhost", "root", "", "agro_db");

    function escape($string) {
        global $connection;

        return mysqli_real_escape_string($connection, trim($string));
    }

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
        echo "<a href='product.php?menu=eselling&p_c=$cat_product_title'><img class='img-category mb-2' width='40%' height='40%' src='../img/$cat_product_image' ></a><br>";
        echo "<a class='align-items-center cat-title'>$cat_product_title</a>";
        echo "</div>";   
        echo "</div>";   
        echo "</div>";   
        echo "</div>";


    }
    echo "</div>"; 
    echo "</div>";
	



    if(isset($_SESSION['p_c'])){

        $product_category = $_SESSION['p_c'];

        echo "<div class='card-body'> ";        
        echo "<div class='row'>";        
        echo "<div class='col-xl-12 text-gray-800'><h2>Sub-Kategori</h2></div>";
        echo "</div>";
        echo "<div class='row'  align='center'>"; 


        $connect = mysqli_connect("localhost", "root", "", "agro_db");
        $output = '';

        if(isset($_POST["query"]))
        {
            $search = mysqli_real_escape_string($connect, $_POST["query"]);
            $query = "SELECT * FROM product WHERE  product_name LIKE '%".$search."%'   ";
        }
        else
        {
            $query = "SELECT * FROM product WHERE product_category = '{$product_category}' ";                         
        }

        $result = mysqli_query($connect, $query);

        if(mysqli_num_rows($result) > 0)
        {

            while($row = mysqli_fetch_array($result))
            {
                $output .= '
                            <div class="col-xl-3 col-md-4 col-sm-6 py-3">
                            <div class="card shadow sub_category">
                            <div class="card-body">
                            <div class="no-gutters align-items-left">
                            <a href="product.php?menu=eselling&b_p_id='.$row['product_id'].'"><img class="img-category mb-2" src="../img/'.$row['product_image'].'"></a>
                            </div>
                            <h4>'.$row['product_name'].'</h4>
                            <h6>RM'.$row['product_current_price'].'</h6>
                            <a class="btn btn-succes"s href="order.php?menu=eselling&add='.$row['product_id'].'">Tambah ke troli</a>
                            </div>  
                            </div> 
                            </div>
                            ';
            }

            echo $output;
        }
        else
        {
            echo 'Tiada Maklumat Dijumpai';
        }

        echo "</div>";  
        echo "</div>"; 

        $_SESSION['p_c'] = NULL;
        
    }
    else{
        
        if(isset($_SESSION['p_c'])){
            $product_category = $_SESSION['p_c'];
        }
        else{
            
        }
        

        $connect = mysqli_connect("localhost", "root", "", "agro_db");
        $output = '';

        if(isset($_POST["query"]))
        {

            echo "<div class='card-body'> ";        
            echo "<div class='row'>";        
            echo "<div class='col-xl-12 text-gray-800'><h2>Sub-Kategori</h2></div>";
            echo "</div>";
            echo "<div class='row'  align='center'>"; 

            $search = mysqli_real_escape_string($connect, $_POST["query"]);
            $query = "SELECT * FROM product WHERE  product_name LIKE '%".$search."%'   ";

            $result = mysqli_query($connect, $query);

             while($row = mysqli_fetch_array($result))
            {
                $output .= '
                            <div class="col-xl-3 col-md-4 col-sm-6 py-3">
                            <div class="card shadow sub_category">
                            <div class="card-body">
                            <div class="no-gutters align-items-left">
                            <a href="product.php?menu=eselling&b_p_id='.$row['product_id'].'"><img class="img-category mb-2" src="../img/'.$row['product_image'].'"></a>
                            </div>
                            <h4>'.$row['product_name'].'</h4>
                            <h6>RM'.$row['product_current_price'].'</h6>
                            <a class="btn btn-succes"s href="order.php?menu=eselling&add='.$row['product_id'].'">Tambah ke troli</a>
                            </div>  
                            </div> 
                            </div>
                            ';
            }

            echo $output;

            echo "</div>";  
            echo "</div>"; 

        }
       
        
        $_SESSION['p_c'] = NULL;
    }

	

//		<!-- view sub-category items-->   

    if(isset($_SESSION['b_p_id'])){

        $product_id = $_SESSION['b_p_id'];

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

            echo "<div class='col-md-4'>";
            echo "<div class='img-container'>";
            echo "<img class='card-img product_image' src='../img/$product_image'>";		
            echo "</div>";	
            echo "</div>";
            echo "<div class='col-md-8'>";
            echo "<div class='card-body product_detail'>";	
            echo "<h1 class='card-title product_name'>$product_name</h1>";		 
            echo "<p class='card-text'>$product_description</p>";		 
            echo "<h3 class='card-text product_price'>RM$product_current_price</h3>";		 
            echo "<p class='card-text'>Stok : $product_quantity</p>";		 
            echo "<a class='btn btn-success' href='order.php?menu=eselling&add=$product_id'>Tambah ke troli </a>";		 
            echo "</div>";
            echo "</div>";

        } 

        echo "</div>";  
        echo "</div>"; 
        echo "</div>"; 

        $_SESSION['b_p_id'] = NULL;
    }
    //		<!-- view sub-category items--> 

?>
  
