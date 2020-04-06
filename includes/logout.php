<?php ob_start(); ?>
<?php session_start(); ?>

<?php 

$_SESSION['user_username'] = null;
$_SESSION['user_role'] = null;
    
header("Location: ../login.php");

?>

