<?php

function redirect($location){
    header("Location:" . $location);
    exit;
}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }
    return false;
}

function isLoggedIn(){

    if(isset($_SESSION['user_role'])){
        return true;
    }
    return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){

    if(isLoggedIn()){
        redirect($redirectLocation);
    }
}



function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));


}



function set_message($msg){

if(!$msg) {

$_SESSION['message']= $msg;

} else {

$msg = "";


    }


}


function display_message() {

    if(isset($_SESSION['message'])) {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }


}




function users_online() {



    if(isset($_GET['onlineusers'])) {

    global $connection;

    if(!$connection) {

        session_start();

        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


            } else {

            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


            }

        $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);


    }






    } // get request isset()


}

users_online();




function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
        die("QUERY FAILED ." . mysqli_error($connection));
    }
}



function insert_categories(){
    
    global $connection;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
        
             echo "This Field should not be empty";
    
    } else {





    $stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");

    mysqli_stmt_bind_param($stmt, 's', $cat_title);

    mysqli_stmt_execute($stmt);


        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($connection));
        
                  }


        
             }

             
    mysqli_stmt_close($stmt);
   
        
       }

}


function findAllCategories() {
global $connection;

    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_categories)) {
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];

    echo "<tr>";
        
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
   echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
   echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
    echo "</tr>";

    }


}


function deleteCategories(){
global $connection;

    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");


    }
            


}


function UnApprove() {
global $connection;
if(isset($_GET['unapprove'])){
    
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
    
    
    }

    
    

}


function is_admin($user_username) {
    
    //WARNING: 1=ADMIN, 2=SUPPLIER, 3=BUYER

    global $connection; 

    $query = "SELECT user_role FROM user WHERE user_username = '$user_username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);

    

    if($row['user_role'] == '1'){
        
        return header("Location: ./admin/index.php" );

    }
    else if($row['user_role'] == '2') {


        return header("Location: ./admin_supplier/index.php" );
    }
    else if($row['user_role'] == '3') {


        return header("Location: ./admin_buyer/index.php" );
    }
    else {
        return false;
    }

}



function username_exists($username){

    global $connection;

    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }

}



function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}


function register_user($user_username, $user_phone, $user_password, $user_repassword, $user_role){

    global $connection;

    $username = mysqli_real_escape_string($connection, $user_username);
    $phone    = mysqli_real_escape_string($connection, $user_phone);
    $password = mysqli_real_escape_string($connection, $user_password);
    $repassword = mysqli_real_escape_string($connection, $user_repassword);
    $user_role = mysqli_real_escape_string($connection, $user_role);

    //$password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));
    //$repassword = password_hash( $repassword, PASSWORD_BCRYPT, array('cost' => 12));


    if($user_role == '2'){
        
        //insert into user table
        $query = "INSERT INTO user (user_username, user_phone, user_password, user_repassword , user_role ) ";
        $query .= "VALUES('{$username}','{$phone}','{$password}','{$repassword}','{$user_role}')";
        
        $register_user_query = mysqli_query($connection, $query);
        confirmQuery($register_user_query);
        
        //insert into supplier table
        $supplier_query = "INSERT INTO supplier (supplier_name, supplier_role, supplier_phone, supplier_date_register) ";
        $supplier_query .= "VALUES('{$username}','{$user_role}', '{$phone}', now() )";
        
        $register_supplier_query = mysqli_query($connection, $supplier_query);
        confirmQuery($register_supplier_query);
        
    }
    else if($user_role == '3'){
        
        //insert into user table
        $query = "INSERT INTO user (user_username, user_phone, user_password, user_repassword , user_role) ";
        $query .= "VALUES('{$username}','{$phone}','{$password}','{$repassword}','{$user_role}')";
        
        $register_user_query = mysqli_query($connection, $query);
        confirmQuery($register_user_query);
        
         //insert into buyer table
        $buyer_query = "INSERT INTO buyer(buyer_name, buyer_role, buyer_phoneNo, buyer_date_register) ";
        $buyer_query .= "VALUES('{$username}','{$user_role}', '{$phone}', now() )";
        
        $register_buyer_query = mysqli_query($connection, $buyer_query);
        confirmQuery($register_buyer_query);
    }
    else{
        $query = "INSERT INTO user (user_username, user_phone, user_password, user_repassword) ";
        $query .= "VALUES('{$username}','{$phone}','{$password}','{$repassword}')";
    }
    

    header("Location: login.php" );
        
}


 function login_user($username, $password)
 {

     global $connection;

     $username = trim($username);
     $password = trim($password);

     $username = mysqli_real_escape_string($connection, $username);
     $password = mysqli_real_escape_string($connection, $password);


     $query = "SELECT * FROM user WHERE user_username = '{$username}' ";
     $select_user_query = mysqli_query($connection, $query);
     
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }

     
     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['user_id'];
         $db_user_username = $row['user_username'];
         $db_user_password = $row['user_password'];
         $db_user_name = $row['user_name'];


         if ($password === $db_user_password) {

             $_SESSION['user_id'] = $db_user_id;
             $_SESSION['user_username'] = $db_user_username;
             $_SESSION['user_name'] = $db_user_name;

             is_admin($db_user_username);
         }
         else{
             return false;
         }

     }
     return true;
 }


?>






