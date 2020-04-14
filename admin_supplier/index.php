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
            <h1 class="h3 mb-0 text-gray-800">Dashboard Petani</h1>
           
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="no-gutters align-items-center" align="center">
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
                  <div class="no-gutters align-items-center" align="center">
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
                  <div class="no-gutters align-items-center" align="center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produk E-lodge</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
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
            

                   <?php  
                     $query = "SELECT buyer_state, count(*) as number FROM buyer GROUP BY buyer_state";  
                     $result = mysqli_query($connection, $query);  
                     ?>  

                   <script type="text/javascript" src="../js/resizeChart.js"></script>
                   <script type="text/javascript" src="../js/barChartProductSupplier.js"></script>
        
                   <script type="text/javascript">
                       
                                        
                    google.charts.load('current', {'packages':['corechart']});
					google.charts.load('current', {'packages':['bar']});
					google.charts.load('current', {'packages':['bar']});
					google.charts.load('current', {'packages':['bar']});
					google.charts.load("current", {packages:["corechart"]});  
                       
                    
                    google.charts.setOnLoadCallback(supplierEachState);
					google.charts.setOnLoadCallback(stockDemand);
					google.charts.setOnLoadCallback(productSoldEachMonth);
					google.charts.setOnLoadCallback(totalProductSellEachMonth);
					google.charts.setOnLoadCallback(quantityProductDemand);  

                       
                       
                    function supplierEachState(){ 
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
                        var chart = new google.visualization.PieChart(document.getElementById('supplierEachState'));  
                        chart.draw(data, options);  
                    }
					   
					   
					 function stockDemand() {
						   
							var data = google.visualization.arrayToDataTable([
							  ['Month', 'Produk Jualan'],
								
								 <?php
                                global $connection;

                                $query  =  "SELECT COUNT(*) as count, MONTHNAME(product_date_submit) as month FROM product GROUP BY MONTHNAME(product_date_submit) ";    
                                $select_suppliers = mysqli_query($connection, $query);
                                $all_product_count = mysqli_num_rows($select_suppliers);

                                while ($row = mysqli_fetch_assoc($select_suppliers)){

                                    $month = escape($row['month']);
                                    $count = escape($row['count']);

                                    echo "['$month'" . "," . "'$count'],";
                                }
                                ?>
							]);

							var options = {
							  chart: {
//								title: 'Jumlah Jualan Produk Setiap Bulan',
//								subtitle: 'Sales, Expenses, and Profit: 2014-2017',
							  }
							};

							var chart = new google.charts.Bar(document.getElementById('stockDemand'));

							chart.draw(data, google.charts.Bar.convertOptions(options));
						  }  
					   
					   
					   
					   function productSoldEachMonth() {
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
                          
                        var chart = new google.charts.Bar(document.getElementById('productSoldEachMonth'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                       
					   
						   
					
					   
					   
					   
					   
					 
					 
					function totalProductSellEachMonth() {
                        var data = google.visualization.arrayToDataTable([
                          ['Nama Buah', 'Kuantiti'],
                                <?php
                                global $connection;

                                $query  =  "SELECT *, MONTHNAME(product_date_submit) as month FROM product GROUP BY MONTHNAME(product_date_submit) ";    
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
                          
                        var chart = new google.charts.Bar(document.getElementById('totalProductSellEachMonth'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                          
					 
					
					   
					   
					   
					  function quantityProductDemand() {
							  var data = google.visualization.arrayToDataTable([
								['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
								 'Western', 'Literature', { role: 'annotation' } ],
								['2010', 10, 24, 20, 32, 18, 5, ''],
								['2020', 16, 22, 23, 30, 16, 9, ''],
								['2030', 28, 19, 29, 30, 12, 13, '']
							  ]);

							  var view = new google.visualization.DataView(data);
							  view.setColumns([0, 1,
											   { calc: "stringify",
												 sourceColumn: 1,
												 type: "string",
												 role: "annotation" },
											   2]);

							   var options = {
								width: 600,
								height: 400,
								legend: { position: 'top', maxLines: 3 },
								bar: { groupWidth: '75%' },
								isStacked: true
							  };
							  var chart = new google.visualization.BarChart(document.getElementById("quantityProductDemand"));
							  chart.draw(view, options);
						  }
					   
                       
                    //RESPONSIVE CHART
                    $(window).resize(function(){
                        supplierEachState();
						stockDemand();
						productSoldEachMonth();
                        totalProductSellEachMonth();
						quantityProductDemand();
                    });
                       
                    </script>
                  
                  
                    
                    

          			
	<div class="row">
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pembeli Mengikut Negeri</h6>
                    </div>
                <div class="card-body">
                   <div id="supplierEachState" style="width: 100%; height: 350px;"></div>  

                </div>
              </div>
            </div>
    </div>
			
			
	<div class="row">
		<div class="col-xl-12 col-lg-7">
		  <div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
			  <h6 class="m-0 font-weight-bold text-primary">Jumlah Jualan Produk Setiap Bulan</h6>
			</div>
			<div class="card-body">
			 <div id="stockDemand" style="width: 100%; height: 100%;"></div>  
			</div>
		  </div>
		</div>
   </div>
			  
			
			
   <div class="row">
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pembelian Mengikut Kontan</h6>
                    </div>
                <div class="card-body">
                  <div id="productSoldEachMonth" style="width: 95%; height: 800px;"></div><br>

                </div>
              </div>
            </div>
    </div>             
               
			
       			
	<div class="row">
            <div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pembelian Mengikut Kontan</h6>
                    </div>
                <div class="card-body">
                  <div id="totalProductSellEachMonth" style="width: 95%; height: 800px;"></div><br>

                </div>
              </div>
            </div>
    </div>
			                     
                  
       			
	
			               
  
            
            
			
				

						
			
	<div class="row">
			<div class="col-xl-12 col-lg-7">
              <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Jumlah Pembelian untuk Setiap Produk</h6>
                </div>
                <div class="card-body">
                 <div id="quantityProductDemand" style="width: 100%; height: 100%;"></div>  
                </div>
              </div>
            </div>
       </div>
			
			
            
            
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
