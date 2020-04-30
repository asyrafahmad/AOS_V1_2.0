<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>


<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/admin_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      

        
        
        
           


<h1 class="h3 mb-2 text-gray-800"></h1>
          <p class="mb-4"></p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Mengenai Kami</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                                <th>Pengguna</th>
                                <th>No Telefon</th>
                                <th>Komen</th>
                            </tr>
                        </thead>
                         <tbody>
                          
                      
                        
                         <?php
                      
                        $query  =  "SELECT * FROM aboutus JOIN user WHERE aboutus.a_u_user_id=user.user_id";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){
                            
                            $a_u_phone 			= escape($row['a_u_phone']);
                            $a_u_message 		= escape($row['a_u_message']);
                            
                            $user_role 		    = escape($row['user_role']);
                            
                            if($user_role === '2'){
                                $user_role = 'Petani';
                            }
                            else{
                                $user_role = "Pemborong";
                            }
                            
                            echo "<tr>";
                            echo "<td>$user_role  </td>";
                            echo "<td>$a_u_phone  </td>";
                            echo "<td>$a_u_message  </td>";
                            echo "</tr>";

                                }
                         ?>
                             
                        </tbody>
                
                      </table>
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