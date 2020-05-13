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

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/Style.css" rel="stylesheet">

</head>

    

<body id="whitewave">
  <div class="container login">

    <!-- Outer Row -->
    <div class="row main">
      <div class="col-xl-6 col-lg-6 col-sm-12">
        <div class="left-side text-center">
          <img src="img/bg/logo-02.png" width="100">
          <h4 class="text-gray-900 mt-4"><strong>Daftar Akaun</strong></h4>
          <hr class="underline" style="width: 10%;">

          <form class ="user" role="form" method="post" autocomplete="off">

				  
			
				<!--TODO: make radio button with image displayed-->
<!--
				<div class="form-group row">
					<div class="col-sm-6 mb-3 mb-sm-0" align="right">
						<input type="radio" class="btn info" id="supplier" name="user_role" value="Petani"><br>
					</div>
					<div class="col-sm-6 mb-3 mb-sm-0" align="left">
						<input type="radio"  class="btn info" id="buyer" name="user_role" value="Pemborong"><br>
					</div>
				</div>
-->
				  
				<div class="row justify-content-center my-3 choose-user" align="center">
					<div class="col-xl-4 col-sm-2 radio-toolbar">
						<input type="radio"  id="Petani" name="user_role" value="Petani">
						<label for="Petani">Petani</label>
					</div>
					<div class="col-xl-4 col-sm-2 radio-toolbar">
						<input type="radio"  class="btn info" id="Pemborong" name="user_role" value="Pemborong">
						<label for="Pemborong">Pemborong</label>
					</div>
				</div>
				  
				  
				  
                <div class="form-group">
                    <input  class="form-control " name="user_username" placeholder="ID Pengguna" required>
                </div>
				<div class="form-group">
                  <input type="email" class="form-control" name="user_email" placeholder="Emel" required>
                </div>
                <div class="form-group">
                  <input class="form-control" name="user_phone" placeholder="Nombor Telefon" required>
                </div>
                <div class="row form-group">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control " name="user_password" placeholder="Katalaluan" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control" name="user_repassword" placeholder="Ulang Katalaluan" required>
                  </div>
                </div>

				<?php
				  
					if($_SERVER['REQUEST_METHOD'] == "POST") {

						$user_username = trim($_POST['user_username']);
						$user_email = trim($_POST['user_email']);
						$user_role = trim($_POST['user_role']);
						$user_phone    = trim($_POST['user_phone']);
						$user_password = trim($_POST['user_password']);
						$user_repassword = trim($_POST['user_repassword']);

//					    $error = [
//					
//					        'user_username'=>'',
//					        'user_email'=>'',
//					        'user_phone'=>'',
//					        'user_password'=>'',
//					        'user_repassword'=>''
//					    ];
//					
//					
//					    if(strlen($user_username) < 4){
//					        $error['user_username'] = 'Username needs to be longer';
//					    }
//						
//						if(strlen($user_username) < 4){
//					        $error['user_email'] = 'Username needs to be longer';
//					    }
//					
//					     if(strlen($user_phone) < 12){
//					        $error['user_phone'] = 'Phone number cannot be exceed 11 number';
//					    }
//					
//					    if($user_password == '') {
//					        $error['password'] = 'Password cannot be empty';
//					    }
//					    
//					    if($user_password == '') {
//					        $error['user_password'] = 'Retype password cannot be empty';
//					    }

						if($user_password === $user_repassword){
							register_user($user_username, $user_email, $user_phone, $user_password ,$user_role);

							$data['message'] = $user_username;
//							$pusher->trigger('notifications', 'new_user', $data);

							echo "<div class='text-center'>";
							echo "<p>Akaun telah berjaya didaftarkan.";
							echo "</div>";
						}
						else {
							echo "<div class='text-center'>";
							echo "<p>Katalaluan tidak sama. Sila isi semula katalaluan.</p>";
							echo "</div>";
						}  
					} 


				?>
				  
                <div class="">
                    <input type="submit" name="register"  class="btn btn-primary btn-user btn-block mt-4" value="Daftar">
                </div>
              </form>
              <hr>
              <div class="text-center" style="color: #fff;">
                <p class="small" style="color: #000;">Sudah mempunyai akaun? <a class="" style="color: #14BD0C;" href="login.php">Log Masuk</a></p>
              </div>

        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-sm-12">
        <div class="right-side text-center">
          <img src="img/bg/register.png" width="80%">
        </div>
      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
