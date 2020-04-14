<?php session_start(); ?>
<?php include "includes/functions.php"; ?> 
<?php  include "includes/db_connection.php"; ?>    
    

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Agro Online System - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/Style.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    

    
<?php
    
		checkIfUserIsLoggedInAndRedirect('./admin/index.php');

		if(ifItIsMethod('post')){

			if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){

		          login_user($_POST['inputUsername'], $_POST['inputPassword']);

			}else {

                //echo "Failed";
				redirect('./login.php');
			}

		}

?>
    
    
    
    
    
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6">
				  
				<div class="p-5">
					<div class="text-center">
						<img src="img/bg/login.png" height="100%" width="150%" alt="LogMasukLogo">
					</div>
				</div>
				  
			  </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/bg/MakmurLogo.png" height="150" alt="MakmurLogo">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                    
                    
                    
                    
                    
                    
                <form id="login-form" role="form" autocomplete="off" class="user" method="post">
                    <div class="form-group">
                      <input class="form-control form-control-user" name="inputUsername" placeholder="ID pengguna">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="inputPassword" placeholder="Katalaluan">
                    </div>
<!--
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
-->
                    <div class="">
                        <input name="login" class="btn btn-primary btn-user btn-block" value="Submit" type="submit">
                    </div>
<!--
                    <hr>
                    <a href="index.html" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a>
-->
                  </form>
                    
                    
                    
                    
<!--
                  <hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
-->
                  <div class="text-center">
                    <a class="small" href="register.php">Daftar Akaun !</a>
                  </div>
					<div class="text-center">
                    <a class="small" href="register.php">Lupa Katalaluan ?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<?php  include "includes/footer.php"; ?>    