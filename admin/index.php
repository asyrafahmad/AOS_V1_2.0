<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>

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
            <h1 class="h3 mb-0 text-gray-800">AOS Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Petani</div>
                       <?php 
                            global $connection;

                            $query = "SELECT * FROM supplier";
                            $select_all_suppliers = mysqli_query($connection,$query);
                            $supplier_count = mysqli_num_rows($select_all_suppliers);

                            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$supplier_count}</div>";
                      ?>
                    </div>
                    <div class="col-auto">
                        <img class="img-profile rounded-circle" src="../img/icon/product.png" height="50" width="50">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Pemborong</div>
                        <?php 
                            global $connection;

                            $query = "SELECT * FROM buyer";
                            $select_all_buyers = mysqli_query($connection,$query);
                            $buyer_count = mysqli_num_rows($select_all_buyers);

                            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$buyer_count}</div>";
                        ?>
                    </div>
                    <div class="col-auto">
                      <img class="img-profile rounded-circle" src="../img/icon/product.png" height="50" width="50">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Keseluruhan Produk</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                            <?php 
                            global $connection;

                            $query = "SELECT * FROM product";
                            $select_all_products = mysqli_query($connection,$query);
                            $product_count = mysqli_num_rows($select_all_products);

                            echo "<div class='h5 mb-0 mr-3 font-weight-bold text-gray-800'>{$product_count}</div>";
                            ?>
                        </div>
                        <div class="col">
<!--
                          <div class="progress progress-sm mr-2">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
-->
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <img class="img-profile rounded-circle" src="../img/icon/product.png" height="50" width="50">
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">E-Lodge</div>
                        <?php 
                            global $connection;

                            $query = "SELECT * FROM elodge_product";
                            $select_all_elodge_products = mysqli_query($connection,$query);
                            $elodge_product_count = mysqli_num_rows($select_all_elodge_products);

                            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$elodge_product_count}</div>";
                        ?>
                    </div>
                    <div class="col-auto">
                      <img class="img-profile rounded-circle" src="../img/icon/product.png" height="50" width="50">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

            
            
            
            
<!--
           <div class="row">
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" width="107" height="160" class="chartjs-render-monitor" style="display: block; width: 107px; height: 160px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
            </div>
-->

            
            
    
            <!-- Graph average price for each product-->
          <div class="row">

            <!-- Area Chart -->
                <script type="text/javascript" src="../js/resizeChart.js"></script>
                <script type="text/javascript" src="../js/barChartProductSupplier.js"></script>
                <script type="text/javascript">
                  
                      google.charts.load('current', {'packages':['line']});
                      google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {

                      var data = new google.visualization.DataTable();
                      data.addColumn('number', 'Day');
                      data.addColumn('number', 'Guardians of the Galaxy');
                      data.addColumn('number', 'The Avengers');
                      data.addColumn('number', 'Transformers: Age of Extinction');

                      data.addRows([
                        [1,  37.8, 80.8, 41.8],
                        [2,  30.9, 69.5, 32.4]
                          
                          <?php
                                global $connection;

                                $query  =  "SELECT * FROM product ";    
                                $select_products = mysqli_query($connection, $query);
                                $all_products_price_count = mysqli_num_rows($select_products);

                                while ($row = mysqli_fetch_assoc($select_products)){

                                    $product_price = escape($row['product_price']);

                                    echo "['$product_name'" . "," . "{$product_quantity}],";
                                }
                                ?> 
                      ]);

                      var options = {
                        chart: {
                          title: 'Average price of product each months',
                          subtitle: ''
                        },
                        width: '100%',
                        height: 500
                      };

                      var chart = new google.charts.Line(document.getElementById('linechart_material'));

                      chart.draw(data, google.charts.Line.convertOptions(options));
                    }

              </script>

              
              
              
              
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Graf Purata Harga Produk Setiap Bulan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div id="linechart_material"></div>
                </div>
              </div>
            </div>
              
 

            <!-- Area Chart -->
<!--
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" width="107" height="160" class="chartjs-render-monitor" style="display: block; width: 107px; height: 160px;"></canvas>
                  </div>
                </div>
              </div>
            </div>
-->

            <!-- Pie Chart -->
           
  
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
          </div>
            <!-- Graph average price for each product-->
         
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
