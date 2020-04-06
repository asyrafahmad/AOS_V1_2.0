<?php session_start(); ?>
<?php include "../includes/functions.php"; ?> 
<?php  include "../includes/db_connection.php"; ?>    





<?php

if(isset($_POST['sendotp'])){
    

	// Account details
    $username = "are.syraf97@yahoo.com";
	$apiKey = urlencode('9nG/95vKCro-p2qpXsf1tL9TYGkARCSBhxBTisC3dB');

    $test="0";
	$name = $_POST['uname'];
	// Message details
	$numbers = $_POST['mobile'];
	$sender = urlencode('Apit sms testing');
    $otp = mt_rand(100000,999999);
    setcookie("otp", $otp);
	$message = "Hey ".@name. "your OTP is ".$otp;
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.txtlocal.com/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
    
        echo("OTS SEND SUCCESSFULLY");
	curl_close($ch);
    
    
	
	// Process your response here
	echo $response;
}

if(isset($_POST['verifyotp'])){
    $verifyotp = $_POST['otp'];
    
    if($verifyotp == $_COOKIE['otp']){
        echo("success");
    }
    else{
        echo("failed");
    }
}
?>



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
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/Style.css" rel="stylesheet">

</head>


    
    
<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Pembukaan Akaun!</h1>
              </div>
                
                
                
              <form class ="user" role="form" method="post" autocomplete="off">

                  
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="uname" name="uname" placeholder="Nama" value="" maxlength="10" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="mobile" name="mobile" placeholder="Nombor Telefon" value="" maxlength="10" placeholder="Enter valid mobile number" required>
                </div>
                  <div>
                    <input type="submit" name="sendotp" value="Send OTP">
                  </div>
                  <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="mobile" name="otp" placeholder="OTP code"  >
                </div>
                

                <div class="">
                    <input type="submit" name="verifyotp"  class="btn btn-primary btn-user btn-block" value="Verify OTP">
                </div>
              </form>
                
                
<!--
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
-->
              <div class="text-center">
                <a class="small" href="login_otp.php">Mempunyai akaun? Log masuk!</a>
              </div>
            </div>
          </div>
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
