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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/Style.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
  <!-- Search data from db -->
  <script src="../js/search_data.min.js"></script>
    
  <!-- Category css-->
<!--  <link href="../css/category.css" rel="stylesheet">        -->
    
    

      
  <?php session_start(); ?>
	
	
	<?php
	
		if(!isset($_SESSION['user_role'])){
			
//			header("location: ../login.php");
			redirect("../login.php");
		}
	?>

</head>

    
    
    
<body id="page-top">