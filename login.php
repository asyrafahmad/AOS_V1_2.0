<?php include "includes/functions.php"; ?> 
<?php  include "includes/db_connection.php"; ?>    
    
<?php  include "includes/head.php"; ?>    

    
<?php
    
checkIfUserIsLoggedInAndRedirect('./admin/index.php');

if(ifItIsMethod('post')){

  if(isset($_POST['login'])){
    
    if(isset($_POST['inputUsername']) && isset($_POST['inputPassword'])){
      
      login_user($_POST['inputUsername'], $_POST['inputPassword']);
    }else {
      
      echo "Failed";
    }
  }
}


?>

  <div class="container login">

    <!-- Outer Row -->
    <div class="row main">
      <div class="col-xl-6 col-lg-6 col-sm-12">
        <div class="left-side text-center">
          <img src="img/bg/logo-02.png" width="100">
          <h4 class="text-gray-900 mt-4"><strong>Selamat Kembali!</strong></h4>
          <hr class="underline">

          <form id="login-form" role="form" autocomplete="off" class="user mt-5" method="post">
            <div class="form-group">
              <input class="form-control" name="inputUsername" placeholder="ID pengguna">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="inputPassword" placeholder="Katalaluan">
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
                <input name="login" class="btn btn-primary btn-user btn-block mt-5" value="Log Masuk" type="submit">
            </div>
            <hr>
            <div class="text-center">
              <a style="color: #14BD0C;" class="small" href="register.php">Daftar Akaun</a>
            </div>
            <div class="text-center">
              <a style="color: #14BD0C;" class="small" href="forgotPassword.php?forgot=<?php echo uniqid(true); ?>">Lupa Katalaluan ?</a>
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

        </div>
      </div>

      <div class="col-xl-6 col-lg-6 col-sm-12">
        <div class="right-side text-center">
          <img src="img/bg/login.png" width="95%">
        </div>
      </div>

    </div>

  </div>

<?php  include "includes/footer.php"; ?>    