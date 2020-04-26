
<?php session_start(); ?>

<?php 

$_SESSION['user_username'] = null;
$_SESSION['user_role'] = null;
$_SESSION['user_image'] = null;
$_SESSION['supplier_role'] = null;
    
header("Location: ../login.php");

?>

