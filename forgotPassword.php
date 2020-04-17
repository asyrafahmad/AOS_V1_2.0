
<?php include "includes/functions.php"; ?> 
<?php  include "includes/db_connection.php"; ?>    
    


<?php  include "includes/head.php"; ?>    
    
    
<?php
	
	
//EMAIL PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './classes/Config.php';

// Load Composer's autoloader
require 'vendor/autoload.php';

	
	
    
	//if it is not GET unique id for forgot password request then go to login.php
	if(!ifItIsMethod('get') && !isset($_GET['forgot'])){
		
		redirect('login.php');
	}
	
	if(ifItIsMethod('post')){
		
		

		
		
		if(isset($_POST['user_email'])){
			
			$email = $_POST['user_email'];
			
			$length = 50;
			
			
			//Generates a string of pseudo-random bytes, with the number of bytes determined by the length parameter.
			$token = bin2hex(openssl_random_pseudo_bytes($length));
			
			if(email_exists($email)){
				
				if($stmt = mysqli_prepare($connection, "UPDATE user SET user_token='{$token}' WHERE user_email = ? ")){
					mysqli_stmt_bind_param($stmt, "s" , $email);			// "s" = string for "email = ?" , $email = variable
					mysqli_stmt_execute($stmt);								// to execute statement
					mysqli_stmt_close($stmt);								// close connection
					
					
					/*
					*
					* configure PHPMailer
					*
					*/
					
					
					// Instantiation and passing `true` enables exceptions
					$mail = new PHPMailer(true);

					try {
						//Server settings
					//    $mail->SMTPDebug = SMTP::SMTP_SERVER;                      // Enable verbose debug output
						$mail->isSMTP();                                            // Send using SMTP
						$mail->Host       = Config::SMTP_HOST;                    // Set the SMTP server to send through
						$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
						$mail->Username   = Config::SMTP_USER;                     // SMTP username
						$mail->Password   = Config::SMTP_PASSWORD;                               // SMTP password
					//    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
						$mail->Port       = Config::SMTP_PORT;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
						$mail->CharSet    = 'UTF-8';

						//Recipients
						$mail->setFrom('are.syraf97@yahoo.com', 'Mailer');	// Add a sender
						$mail->addAddress($email);     						// Add a recipient


						// Content
						$mail->isHTML(true);                                  // Set email format to HTML
						$mail->Subject = 'Terlupa Katalaluan';
						$mail->Body    = '<p>Sila tekan link ini untuk menetapkan semula katalaluan anda. <a href="http://localhost/DEVELOPMENT/AOS_1.0_V1/resetPassword.php?email='.$email.'&token='.$token.' ">http://localhost/DEVELOPMENT/AOS_1.0_V1/resetPassword.php?email='.$email.'&token='.$token.'</a></p>';
//						$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

						$mail->send();
						
						echo 'Emel telah berjaya dihantar.';
						
//						if($mail => send()){
//							$emailSent = true;
////							echo 'Emel telah berjaya dihantar.';
//						}
//						else{
//							$emailSent = false;
//						}
						
					} catch (Exception $e) {
						echo "Mail Error: {$mail->ErrorInfo}";
					}

					
				}
				else{
				
					echo "Emel ini tidak sah.";
				}
			}
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
						<img src="img/bg/forgot_password.svg" height="100%" width="130%" alt="LogMasukLogo">
					</div>
				</div>
				  
			  </div>
              <div class="col-lg-6">
                <div class="p-5">
					
					
				<?php 
						
	if(isset($_SESSION['emails'])){
		$emails = $_SESSION['emails'];
	
	}
	
	echo $emails;
					
					
					
					if(!isset($emailSent)): ?>	
					
                  <div class="text-center">
                    <img src="img/bg/MakmurLogo.png" height="150" alt="MakmurLogo">
                    <h1 class="h4 text-gray-900 mb-4">Lupa Katalaluan?</h1>
                  </div>
                    
					
					
    
                    
                <form id="login-form" role="form" autocomplete="off" class="user" method="post">
<!--					<label>Isi maklumat emel anda</label>-->
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="user_email" placeholder="Emel Pengguna" required="Sila isi emel anda di ruangan kosong">
                    </div>
                  
                    <div class="">
                        <input name="forgot" class="btn btn-primary btn-user btn-block" value="Hantar" type="submit">
                    </div>

                  </form>
                    
                    
                    
                    
                  <div class="text-center">
                    <a class="small" href="login.php">Log Masuk</a>
                  </div>
				
				<?php else: ?>
					
					<h2>Sile cek email anda.</h2>
					
				<?php endIf; ?>	
					
					
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

<?php  include "includes/footer.php"; ?>    