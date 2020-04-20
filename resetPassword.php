<?php include "includes/functions.php"; ?> 
<?php  include "includes/db_connection.php"; ?>    
    
<?php  include "includes/head.php"; ?>    
    
    

    
    
    
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
						<img src="img/bg/reset_password.svg" height="100%" width="150%" alt="LogMasukLogo">
					</div>
				</div>
				  
			  </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <img src="img/bg/MakmurLogo.png" height="150" alt="MakmurLogo">
                    <h1 class="h4 text-gray-900 mb-4">Pembaharuan Katalaluan</h1>
                  </div>

                    
                <form id="login-form" role="form" autocomplete="off" class="user" method="post">
<!--					<label>Isi maklumat emel anda</label>-->
                     <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Katalaluan">
                    </div>
					<div class="form-group">
                      <input type="password" class="form-control form-control-user" name="retypePassword" placeholder="Isi Semula Katalaluan">
                    </div>
                  
					<?php
	
						global $connection;

						$user_token= '04362562e3a672cb4965690736de57669cb4a272bd91e8431266ec1dabb47ff2c674634af5b213c6fe70e05e3daa832174fd';

						if($stmt = mysqli_prepare($connection, "SELECT user_username, user_email, user_token FROM user WHERE user_token = ? ")){

							mysqli_stmt_bind_param($stmt, "s", $user_token);							//bind parameters for markers

							mysqli_stmt_execute($stmt);													//execute query

							mysqli_stmt_bind_result($stmt, $user_username, $user_email, $user_token);	//bind result variables

							mysqli_stmt_fetch($stmt);													//fetch value

							mysqli_stmt_close($stmt);													//close statement
						}

						if(isset($_GET['email'])){
							$email = $_GET['email'];
						}

						if(isset($_POST['password']) &&  isset($_POST['retypePassword'])){

							if($_POST['password'] === $_POST['retypePassword']){

								$password = $_POST['password'];

								$hashedPassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

								if($stmt = mysqli_prepare($connection, "UPDATE user SET user_token='', user_password='{$hashedPassword}' WHERE user_email = ? ")){

									mysqli_stmt_bind_param($stmt, "s", $email);
									mysqli_stmt_execute($stmt);

									if(mysqli_stmt_affected_rows($stmt) >= 1){
										echo "<a class='small'>Katalaluan telah berjaya ditukar.</a>";
									}

									mysqli_stmt_close($stmt);
								}
								else{
									echo "Error.";
								}
							}
							else{
								echo "<a class='small'>Terdapat kesalahan pada katalaluan. Sila isi semula.</a>";
							}
						}

					?>
					
					
                    <div class="">
                        <input name="reset" class="btn btn-primary btn-user btn-block" value="Hantar" type="submit">
                    </div>
					
					<input type="hidden" class="hide" name="user_token" id="token" value="">

                  </form>
                    
                    
                  <div class="text-center">
                    <a class="small" href="login.php">Log Masuk</a>
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