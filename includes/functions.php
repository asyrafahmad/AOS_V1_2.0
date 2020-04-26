<?php

//to redirect file location
function redirect($location){
    header("Location:" . $location);
    exit;
}

//if application needs to react on request of type POST
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




function UnApprove() {
global $connection;
if(isset($_GET['unapprove'])){
    
    $the_comment_id = $_GET['unapprove'];
    
    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    $unapprove_comment_query = mysqli_query($connection, $query);
    header("Location: comments.php");
    
    
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

    $query = "SELECT user_email FROM user WHERE user_email = '$email'";
    $email_query = mysqli_query($connection, $query);
    confirmQuery($email_query);

    if(mysqli_num_rows($email_query) > 0) {
        return true;

    } else {
        return false;
    }
}


function register_user($user_username, $user_email, $user_phone, $user_password,  $user_role){

    global $connection;

    $username = mysqli_real_escape_string($connection, $user_username);
    $email = mysqli_real_escape_string($connection, $user_email);
    $phone    = mysqli_real_escape_string($connection, $user_phone);
    $password = mysqli_real_escape_string($connection, $user_password);
//    $repassword = mysqli_real_escape_string($connection, $user_repassword);
    $user_role = mysqli_real_escape_string($connection, $user_role);

    $password = password_hash( $password, PASSWORD_BCRYPT, array('cost' => 12));


    if($user_role == 'Petani'){				//supplier
		
		//Petani == 2
		$user_role = 2;
        
        //insert into user table
        $query = "INSERT INTO user (user_username, user_email, user_phone, user_password, user_role ) ";
        $query .= "VALUES('{$username}','{$email}','{$phone}','{$password}', '{$user_role}')";
        
        $register_user_query = mysqli_query($connection, $query);
        confirmQuery($register_user_query);
        
		
        //insert into supplier table
        $supplier_query = "INSERT INTO supplier (supplier_name, supplier_email, supplier_role, supplier_phone, supplier_date_register) ";
        $supplier_query .= "VALUES('{$username}','{$email}','{$user_role}', '{$phone}', now() )";
        
        $register_supplier_query = mysqli_query($connection, $supplier_query);
        confirmQuery($register_supplier_query);
        
    }
    else if($user_role == 'Pemborong'){		//buyer
		
		//Pemborong == 3
		$user_role = 3;
        
        //insert into user table
        $query = "INSERT INTO user (user_username, user_email, user_phone, user_password, user_role) ";
        $query .= "VALUES('{$username}','{$email}','{$phone}','{$password}','{$user_role}')";
        
        $register_user_query = mysqli_query($connection, $query);
        confirmQuery($register_user_query);
        
         //insert into buyer table
        $buyer_query = "INSERT INTO buyer(buyer_name, buyer_email, buyer_role, buyer_phoneNo, buyer_date_register) ";
        $buyer_query .= "VALUES('{$username}','{$email}','{$user_role}', '{$phone}', now() )";
        
        $register_buyer_query = mysqli_query($connection, $buyer_query);
        confirmQuery($register_buyer_query);
    }
    else{	//admin
        return false;
    }  
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
         $db_user_image = $row['user_image'];

		 $password = crypt($password, $db_user_password);

         if ($password === $db_user_password) {

             $_SESSION['user_id'] = $db_user_id;
             $_SESSION['user_username'] = $db_user_username;
             $_SESSION['user_image'] = $db_user_image;

             is_admin($db_user_username);
         }
         else{
             return false;
         }

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
		$_SESSION['user_role'] = 1;
//        return header("Location: ./admin/index.php" );
        redirect("./admin/index.php" );

    }
    else if($row['user_role'] == '2') {
		$_SESSION['user_role'] = 2;
//        return header("Location: ./admin_supplier/index.php" );
        redirect("./admin_supplier/index.php" );
    }
    else if($row['user_role'] == '3') {
		$_SESSION['user_role'] = 3;
//        return header("Location: ./admin_buyer/menu.php" );
        redirect("./admin_buyer/menu.php");
    }
    else {
        return false;
    }

}


?>






