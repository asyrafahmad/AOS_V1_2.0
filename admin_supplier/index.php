<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>


<?php  include "../includes/admin_header.php"; ?>

        
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      

    <?php  include "includes/supplier_sidebar_navigation.php"; ?>


        

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      
          
              
            <!-- Top nav-->
            <?php  include "includes/supplier_topbar_navigation.php"; ?>

        
         
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Petani Dashboard</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Produk</div>
                        <?php 
                            global $connection;
                            $query = "SELECT * FROM product";
                            $select_all_products = mysqli_query($connection,$query);
                            $product_count = mysqli_num_rows($select_all_products);

                            echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$product_count}</div>"
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
            <div class="col-xl-4 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Bayaran Selesai</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                    </div>
                    <div class="col-auto">
                      <img class="img-profile rounded-circle" src="../img/icon/product.png" height="50" width="50">
                    </div>
                  </div>
                </div>
              </div>
            </div>

              
            <div class="col-xl-4  mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produk E-lodge</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">40</div>
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
          </div>

            
<!----------------------------------------------------------------------------------------------------------------------------------------------  --> 
            
            
<!--Fruit Graph-->
        <div class="card-body">  
              <div class="col-xl-16">
              <div class="card shadow mb-5">
                  
                   <?php  
                     $query = "SELECT buyer_state, count(*) as number FROM buyer GROUP BY buyer_state";  
                     $result = mysqli_query($connection, $query);  
                     ?>  

                   <script type="text/javascript" src="../js/resizeChart.js"></script>
                   <script type="text/javascript" src="../js/barChartProductSupplier.js"></script>
        
                   <script type="text/javascript">
                       
                    google.charts.load('current', {'packages':['bar']});                    
                    google.charts.load('current', {'packages':['corechart']});  
                       
                    google.charts.setOnLoadCallback(drawCharts);
                    google.charts.setOnLoadCallback(drawChart);  

                       
                    function drawCharts() {
                        var data = google.visualization.arrayToDataTable([
                          ['Nama Buah', 'Kuantiti'],
                                <?php
                                global $connection;

                                $query  =  "SELECT * FROM product WHERE product_type = 'Buah-buahan' ";    
                                $select_suppliers = mysqli_query($connection, $query);
                                $all_product_count = mysqli_num_rows($select_suppliers);

                                while ($row = mysqli_fetch_assoc($select_suppliers)){

                                    $product_name = escape($row['product_name']);
                                    $product_quantity = escape($row['product_quantity']);

                                    echo "['$product_name'" . "," . "{$product_quantity}],";
                                }
                                ?> 
                        ]);

                        var options = {
                          chart: {
                            title: '',
                            subtitle: '',
                          },
                          bars: 'horizontal',
                          series: {
                            0: { axis: 'distance' }, // Bind series 0 to an axis named 'distance'.
                            1: { axis: 'brightness' } // Bind series 1 to an axis named 'brightness'.
                          },
                          axes: {
                            x: {
                              distance: {label: 'Jumlah'}, // Bottom x-axis.
                              brightness: {side: 'top', label: 'apparent magnitude'} // Top x-axis.
                            }
                          }
                        };
                          
                        var chart = new google.charts.Bar(document.getElementById('fruit_graph'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                       
                       
                    function drawChart(){ 
                        var data = google.visualization.arrayToDataTable([  
                                  ['Negeri', 'Jumlah'],  
                                  <?php  
                                  while($row = mysqli_fetch_array($result))  
                                  {  
                                       echo "['".$row["buyer_state"]."', ".$row["number"]."],";  
                                  }  
                                  ?>  
                             ]);  
                        var options = {  
                              //title: 'Jumlah pembeli mengikut negeri',  
                              //is3D:true,  
                              pieHole: 0.5  
                             };  
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                        chart.draw(data, options);  
                    }
                       
                    //RESPONSIVE CHART
                    $(window).resize(function(){
                        drawCharts();
                        drawChart();
                    });
                       
                    </script>
                  
                  
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pembelian Mengikut Kontan</h6>
                    </div><br>
                    <div id="fruit_graph" style="width: 95%; height: 800px;"></div><br>

                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembeli Mengikut Negeri</h6>
                    </div>

                    <div id="piechart" style="width: 100%; height: 350px;"></div>  
                
                  
               </div>       
              </div>
        </div>  
   <!--Fruit Graph--> 
            
            
            
            
            
 <!----------------------------------------------------------------------------------------------------------------------------------------------  -->           
            
            
        
            
<!--
  
     <div class="row">
      <div class="col-xl-6 ">
      <div class="card shadow mb-4">
                   
-->
                  
                    <?php  
//                     $query = "SELECT buyer_state, count(*) as number FROM buyer GROUP BY buyer_state";  
//                     $result = mysqli_query($connection, $query);  
//                  
//                     $json_array = array();
//                  
//                       while($row  = mysqli_fetch_assoc($result)){
//                           $json_array[] = $row;
//                       } 
//                  
//                        $encode_json = json_encode($json_array);
//                            
//                        echo $encode_json;
//                  
                        //print_r(json_decode($encode_json, true));
                        //$decode =json_decode($encode_json, true);
                    
                     ?>  
                  

<!--
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myPieChart" width="552" height="208" class="chartjs-render-monitor" style="display: block; width: 552px; height: 208px;"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Sayur
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Buah
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Kontan
                    </span>
                  </div>
                    
 
            </div>       
      </div>
    </div>  
-->
                  
           

            
            
            

<!---------------------------------------------------------------------------------------------------------------------------------            -->
            
            

     <!-- 
              
         <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                  
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Jualan Sayuran</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Pilih Kategori:</div>
                      <a class="dropdown-item" href="#">Sayur</a>
                      <a class="dropdown-item" href="#">Buah buahan</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Kontan</a>
                    </div>
                  </div>
                </div>
                  
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" style="display: block; width: 552px; height: 160px;" width="552" height="160" class="chartjs-render-monitor"></canvas>
                  </div>
                </div>
              </div>
            </div>
              
          </div>

            
            
           <div class="row">
            
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                  
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Pembelian Produk</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Johor</a>
                      <a class="dropdown-item" href="#">Kedah</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Melaka</a>
                    </div>
                  </div>
                </div>
                  
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myPieChart" width="552" height="208" class="chartjs-render-monitor" style="display: block; width: 552px; height: 208px;"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Sayur
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Buah
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-info"></i> Kontan
                    </span>
                  </div>
                </div>
              </div>
            </div>

            </div> 
            
-->
            
            
            
            
<!--------------------------------------------------------------------------------------------------------------------------------------------------  -->          
         
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
