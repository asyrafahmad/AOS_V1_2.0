<?php

function add_category(){
    
    global $connection;
    
    if(isset($_POST['add_product_category'])) {
        
        $cat_product_title = $_POST['cat_product_title'];
        if(!empty($cat_product_title)) {

            $query = "INSERT INTO categories_product (cat_product_title) VALUES ('{$cat_product_title}') ";
            
            $product_category_query = mysqli_query($connection, $query);
            confirmQuery($product_category_query);
            
            set_message("Kategori berjaya ditambah");
        } 
        else{
            
            echo "<p class='bg-danger'>Sila isi di ruangan kosong</p>";
        }
    }
}


function display_message(){
    
     if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }
}


//function show_product_categories_in_admin(){
//    
//    $query = "SELECT * FROM categories_product ";
//    $categories_product_query = mysqli_query($connection, $query);
//    confirmQuery($product_category_query);
//
//    while($row = fetch_array($category_query)) {
//
//        $cat_product_id = $row['cat_product_id'];
//        $cat_product_title = $row['cat_product_title'];
//
//        $category = <<<DELIMETER
//
//        <tr>
//            <td>{$cat_product_id}</td>
//            <td>{$cat_product_title}</td>
//            <td><a class="btn btn-danger" href="./index.php?delete_category_id={$row['cat_id']}"><span class="glyphicon glyphicon-remove"></span></a></td>
//        </tr>
//
//        DELIMETER;
//
//        echo $category;
//    }
//}










//from categories product
function set_message($msg){
    
    if(!empty($msg)) {
        $_SESSION['message'] = $msg;
    } 
    else {
        $msg = "";
    }
}



function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}






?>