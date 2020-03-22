
<?php  include "../includes/admin_header.php"; ?>


        
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      

    <?php  include "includes/admin_sidebar_navigation.php"; ?>


        

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      
          
              
            <!-- Top nav-->
            <?php  include "includes/admin_topbar_navigation.php"; ?>

        
         
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Mengenai Kami</h1>
          </div>

          <!-- Content Row -->
     


  
      <!-- Starting of profile content-->
      <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</label>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>
              <div class="col-md-6 mb-3" align="center">
                <label for="lastName">
                    <img class="" src="../img/bg/aboutus_bg.png" width="400" height="250">
                </label>
              </div>
            </div>
        </div>
      </div> 
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
              <div class="col-md-6 mb-3" align="center">
                <label for="lastName">
                    <img class="" src="../img/bg/aboutus_bg.png" width="400" height="250">
                </label>
              </div>
              <div class="col-md-6 mb-3" align="center">
                <form action="" method="post" enctype="multipart/form-data">
                   <div class="d-sm-flex align-items-center justify-content-between mb-4">
                      <h1 class="h3 mb-0 text-gray-800">Mengenai Kami</h1>
                   </div>                    
                    <div class="form-group">
                      <input class="form-control form-control-user" name="phone_number" placeholder="Nombor Telefon">
                    </div>
                    <div class="form-group">
                      <input class="form-control form-control-user" name="Message" placeholder="Mesej">
                    </div>
                   <div class="form-group">
                      <input class="btn btn-primary" type="submit" name="aboutus_form" value="Hantar">
                   </div>
                </form>
              </div>
              
            </div>
        </div>
      </div>  


            
            
          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
         
          </div>

         
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Agro Online System 2020 - Ver1.0</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>



<?php  include "../includes/admin_footer.php"; ?>
