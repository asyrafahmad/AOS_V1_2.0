<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/supplier_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      
    </div>

    <!-- Content Row -->
    <div class="row my-4 justify-content-center">
  
      <div class="col-md-10 "> 
        <div class="row">
        <div class="col-md-4">
            <img src="../img/bg/shop.svg">
        </div>

        <div class="col-md-8">
          <div class="card about_us">
            <h5 class="card-header text-center">Mengenai Kami</h5>
            <div class="card-body p-4">
              <h5 class="card-title"></h5>
              <p class="card-text"><label for="firstName">PENERAJU MEDIA was born out of an experience and passion to provide expert services that meet the needs of modern businesses. Our team is dedicated to delivering great results and providing amazing support.</label></p>
            </div>
          </div>
        </div>          
        </div>
      </div>

    </div>

    <!-- Content Row -->
    <div class="row my-4 justify-content-center">
  
      <div class="col-md-10 "> 
        <div class="row">
        <div class="col-md-8">
          <div class="card about_us">
            <h5 class="card-header text-center">Hubungi Kami</h5>
            <div class="card-body p-4">
              <h5 class="card-title"></h5>
              <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group mb-2">
                  <input class="form-control form-control-user" name="phone_number" placeholder="Nombor Telefon Anda">
                </div>
                <div class="form-group mb-4">
                  <input class="form-control form-control-user" name="Message" placeholder="Mesej">
                </div>
               <div class="form-group text-center">
                  <input class="btn btn-primary" type="submit" name="aboutus_form" value="Hantar">
               </div>
              </form>
            </div>
          </div>
        </div>  

        <div class="col-md-4">
            <img src="../img/bg/contact_us.svg">
        </div>
        </div>
      </div>

    </div>
 


    </div>
      
      <!-- Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agro Online System 2020 - Ver1.0</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

  </div>


</div>


<?php  include "../includes/admin_footer.php"; ?>