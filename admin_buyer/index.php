<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>


<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/buyer_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
    </div>

        
    <?php
    
                    echo $user_username = $_SESSION['user_username'];
    
//                    echo $query  =  "SELECT count(*) as count, payment_product FROM payment_product_history WHERE payment_status = 'Berjaya' GROUP BY payment_product ";    
                    echo $query  =  "SELECT product_name, SUM(product_quantity) as sum_product FROM product JOIN payment_product_history ON product.product_name=payment_product_history.product_name ";    
                    $select_order_product = mysqli_query($connection, $query);
//                    $order_product_count = mysqli_num_rows($select_order_product);
//
//                    while ($row = mysqli_fetch_assoc($select_order_product)){
//
//                      echo "[".$row["payment_product"].",  ".$row["count"]."],";  
//                    }
    
    ?>    
        
    <!-- Content Row -->
    <div class="row">

       
      <!-- Petani -->
      <div class="col-xl-3  mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #d4d5f9;">
              <img class="img-icon" src="../img/icon/supplier.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
            <?php 

              $query = "SELECT * FROM user WHERE user_role = '2' ";
              $select_all_suppliers = mysqli_query($connection,$query);
              $suppliers_count = mysqli_num_rows($select_all_suppliers);

              echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$suppliers_count}</div>";
            ?>
            </h1>
            <h5>Petani</h5>
          </div>
        </div>
      </div>

      <!-- Pemborong -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #A8F4E5;">
              <img class="img-icon" src="../img/icon/Buyer.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
            <?php 

              $query = "SELECT * FROM user WHERE user_role = '3' ";
              $select_all_buyers = mysqli_query($connection,$query);
              $buyers_count = mysqli_num_rows($select_all_buyers);

              echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$buyers_count}</div>";
            ?>
            </h1>
            <h5>Pemborong</h5>
          </div>
        </div>
      </div>

      <!-- Product -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #FF9E9E;">
              <img class="img-icon" src="../img/icon/product.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 

                $query = "SELECT * FROM product ";
                $select_all_products = mysqli_query($connection,$query);
                $products_count = mysqli_num_rows($select_all_products);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$products_count}</div>";
              ?>
            </h1>
            <h5>Produk</h5>
          </div>
        </div>
      </div>

      <!-- E-Lodge -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #FF9E9E;">
              <img class="img-icon" src="../img/icon/file.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 
                
                $user_username = $_SESSION['user_username'];
                
                $query = "SELECT * FROM elodge_product_book WHERE book_buyer_name = '{$user_username}'";
                $select_all_elodge_products = mysqli_query($connection,$query);
                $elodge_products_count = mysqli_num_rows($select_all_elodge_products);

                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>{$elodge_products_count}</div>";
            ?>
            </h1>
            <h5>E-Lodge</h5>
          </div>
        </div>
      </div>
    </div>



            <script type="text/javascript" src="../js/barChartProductSupplier.js"></script>
            <script type="text/javascript">
                                          
          google.charts.load('current', {'packages':['corechart']});  
          google.charts.load('current', {'packages':['corechart']});
          google.charts.load('current', {'packages':['line']});
          google.charts.load('current', {'packages':['bar']});
          google.charts.load('current', {'packages':['bar']});
                       
          google.charts.setOnLoadCallback(totalSupplier);  
          google.charts.setOnLoadCallback(totalProduct);
          google.charts.setOnLoadCallback(averageProduct);
          google.charts.setOnLoadCallback(productBought);
          google.charts.setOnLoadCallback(stockDemand);
                       
                       
          function totalSupplier(){ 
              var data = google.visualization.arrayToDataTable([  
                        ['Negeri', 'Jumlah'],  
                        <?php  
                  
                        $query = "SELECT user_state, count(*) as number FROM user WHERE user_role = '2' GROUP BY user_state";  
                        $result = mysqli_query($connection, $query);  
                  
                        while($row = mysqli_fetch_array($result))  
                        {  
                             echo "['".$row["user_state"]."', ".$row["number"]."],";  
                        }  
                        ?>  
                   ]);  
              var options = {  
                    //title: 'Jumlah pembeli mengikut negeri',  
                    //is3D:true,  
                    pieHole: 0.3  
                   };  
              var chart = new google.visualization.PieChart(document.getElementById('totalSupplier'));  
              chart.draw(data, options);  
          }
             
          function totalProduct() {
            var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
             <?php  
//              No of product from each state
                $chart2_query = "SELECT user_state, count(*) as number FROM user JOIN product ON user.user_id = product.product_supplier GROUP BY user_state";  
                $result2 = mysqli_query($connection, $chart2_query);  

                while($row = mysqli_fetch_array($result2))  
                {  
                   echo "['".$row["user_state"]."', ".$row["number"]."],";  
                }  
                           ?>
            ]);

            var options = {
//              title: 'My Daily Activities',
              pieHole: 0.3,
            };

            var chart = new google.visualization.PieChart(document.getElementById('totalProduct'));
            chart.draw(data, options);
            }
             
                
             
          function averageProduct() {
              
               

              var data = new google.visualization.DataTable();
              data.addColumn('number', 'Produk');
              data.addColumn('number', '<?php  echo $graph_product = $_GET['g_p'];  ?>');

              data.addRows([
                <?php  
                  
                    $graph_product = $_GET['g_p'];  
      

                    $query  =  "SELECT MONTH(product_date_submit) as month, AVG(product_price) as product_price FROM product WHERE product_name = '{$graph_product}' GROUP BY MONTH(product_date_submit)  ";    
                    $select_suppliers = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_suppliers)){

                      echo "[".$row["month"].",  ".$row["product_price"]."],";  
                    }
               ?>
              ]);

              var options = {
              chart: {
                title: 'Harga Purata Bagi Produk <?php echo $graph_product = $_GET['g_p'];  ?> untuk Setiap Bulan',
//                subtitle: 'in millions of dollars (USD)'
              },
              width: 900,
              height: 500
              };

              var chart = new google.charts.Line(document.getElementById('averageProduct'));

              chart.draw(data, google.charts.Line.convertOptions(options));
            }
             
             
            function productBought() {
              var data = new google.visualization.arrayToDataTable([
                ['Bulan', 'Jumlah Produk'],
                  
              <?php  
//                   
//                    $query  =  "SELECT count(*) as count, payment_product FROM payment_product_history WHERE payment_supplier_name = '$user_username' AND payment_status = 'Berjaya' GROUP BY payment_product ";    
                    $query  =  "SELECT SUM(payment_quantity) as count, payment_product FROM payment_product_history WHERE payment_supplier_name = '$user_username' AND payment_status = 'Berjaya' GROUP BY payment_product ";    
                    $select_order_product = mysqli_query($connection, $query);
                    $order_product_count = mysqli_num_rows($select_order_product);

                    while ($row = mysqli_fetch_assoc($select_order_product)){

                      echo "[ '".$row["payment_product"]."',  ".$row["count"]."],";  
                    }
               ?>
                  
              ]);

              var options = {
                width: 800,
                legend: { position: 'none' },
//                chart: {
//                title: 'Jumlah Produk Yang Dijual Pada Setiap Bulan',
//                subtitle: '' },
                axes: {
                x: {
                  0: { side: 'top', label: 'Jumlah produk berjaya dibeli'} // Top x-axis.
                }
                },
                bar: { groupWidth: "90%" }
              };

              var chart = new google.charts.Bar(document.getElementById('productBought'));
              // Convert the Classic options to Material options.
              chart.draw(data, google.charts.Bar.convertOptions(options));
              };
             
             
           function stockDemand() {
               
              var data = google.visualization.arrayToDataTable([
                ['Produk', 'Stok Semasa', 'Kuantiti Permintaan'],
//                ['Guava', 1000, 400],
                
                <?php
                  
                  $graph_product = $_GET['g_p']; 
                  
//                  $query  =  "SELECT product_name, SUM(product_quantity) as sum_product FROM product  ";    
                  $query  =  "SELECT product_name, SUM(product_quantity) as sum_product FROM product JOIN payment_product_history ON product.product_name=payment_product_history.product_name ";    
                    $select_suppliers = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_suppliers)){

                      echo "['".$row["product_name"]."',  ".$row["sum_product"].",  ".$row["sum_product"]."],";  
                    }
                  
                ?>
                
              ]);

              var options = {
                chart: {
                title: 'Stok Semasa & Kuantiti Permintaan',
                subtitle: '',
                }
              };

              var chart = new google.charts.Bar(document.getElementById('stockDemand'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
              }
             
                       
            //RESPONSIVE CHART
            $(window).resize(function(){
              totalSupplier();
              totalProduct();
              averageProduct();
              productBought();
              stockDemand();
            });
                       
            </script>
    
        
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
<!--
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
-->
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-area"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                    <canvas id="myAreaChart" width="261" height="160" class="chartjs-render-monitor" style="display: block; width: 261px; height: 160px;"></canvas>
                  </div>
                </div>
              </div>
        
        

            <div class="row">
                  
              <!-- Pie Chart -->
              <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Petani Mengikut Negeri</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div id="totalSupplier" style="width: 100%; height: 250px;"></div>  
                  </div>
                </div>
              </div>
                  

              <div class="col-xl-6 col-lg-5">
                <div class="card shadow mb-4">
                  <!-- Card Header - Dropdown -->
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah Produk Mengikut Negeri</h6>
                  </div>
                  <!-- Card Body -->
                  <div class="card-body">
                    <div id="totalProduct" style="width: 100%; height: 250px;"></div>  
                  </div>
                </div>
              </div>
                  
            </div>

            <div class="row">
                    
              <!-- Area Chart -->
              <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Harga Purata Setiap Produk (Pilih Produk)</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                          <div class="dropdown-header text-primary">Produk</div>
                          <div class="dropdown-divider"></div>
                            
                        <?php
                            
                            $query  =  "SELECT * FROM product GROUP BY product_name";    
                            $select_product = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_product)){

                                $product_name  = escape($row['product_name']);

                                echo "<a class='dropdown-item' href='index.php?menu=elodge&g_p=$product_name'>$product_name</a>";
                             

                            } 
                        ?>                  
                        </div>
                  </div>
                </div>
                <div class="card-body">
                  <div id="averageProduct" style="width: 100%; height: 100%;"></div>  
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
                     <div id="productBought" style="width: 100%; height: 100%;"></div>  
                    </div>
                  </div>
                </div>
            </div>
                
    
            <div class="row">
              <div class="col-xl-12 col-lg-7">
                <div class="card shadow mb-4">
                  <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jumlah stok semasa dan kuantiti permintaan untuk setiap Produk</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                          <div class="dropdown-header text-primary">Produk</div>
                          <div class="dropdown-divider"></div>
                            
                        <?php
                            
                            $query  =  "SELECT * FROM product GROUP BY product_name";    
                            $select_product = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_product)){

                                $product_name  = escape($row['product_name']);

                                echo "<a class='dropdown-item' href='index.php?menu=elodge&s_d_p=$product_name'>$product_name</a>";
                             

                            } 
                        ?>                  
                        </div>
                    </div>
                  </div>
                  <div class="card-body">
                   <div id="stockDemand" style="width: 100%; height: 100%;"></div>  
                  </div>
                </div>
              </div>
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