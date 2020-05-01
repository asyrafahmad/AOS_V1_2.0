<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>


<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/admin_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
    </div>

    <!-- Content Row -->
    <div class="row">

      <!-- Earnings (Monthly) -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #d4d5f9;">
              <img class="img-icon" src="../img/icon/product.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
            <?php 
              global $connection;

              $query = "SELECT * FROM supplier";
              $select_all_suppliers = mysqli_query($connection,$query);
              $supplier_count = mysqli_num_rows($select_all_suppliers);

              echo $supplier_count;
            ?>
            </h1>
            <h5>Petani</h5>
          </div>
        </div>
      </div>

      <!-- Jumlah Pemborong -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #A8F4E5;">
              <img class="img-icon" src="../img/icon/Buyer.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 
                global $connection;

                $query = "SELECT * FROM buyer";
                $select_all_buyers = mysqli_query($connection,$query);
                $buyer_count = mysqli_num_rows($select_all_buyers);

                echo $buyer_count;
            ?>
            </h1>
            <h5>Pemborong</h5>
          </div>
        </div>
      </div>

      <!-- Product Count -->
      <div class="col-xl-3 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #FF9E9E;">
              <img class="img-icon" src="../img/icon/file.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 
                global $connection;

                $query = "SELECT * FROM product";
                $select_all_products = mysqli_query($connection,$query);
                $product_count = mysqli_num_rows($select_all_products);

                echo $product_count;
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
                global $connection;

                $query = "SELECT * FROM elodge_product";
                $select_all_elodge_products = mysqli_query($connection,$query);
                $elodge_product_count = mysqli_num_rows($select_all_elodge_products);

                echo $elodge_product_count;
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
          google.charts.load("current", {packages:["corechart"]});
          google.charts.load('current', {'packages':['line']});
          google.charts.load('current', {'packages':['bar']});
          google.charts.load('current', {'packages':['bar']});
          google.charts.load('current', {'packages':['bar']});
          google.charts.load("current", {packages:["corechart"]});
                       
          google.charts.setOnLoadCallback(totalSupplier);  
          google.charts.setOnLoadCallback(totalProduct);
          google.charts.setOnLoadCallback(averageProduct);
          google.charts.setOnLoadCallback(productBought);
          google.charts.setOnLoadCallback(productSoldEachMonth);
          google.charts.setOnLoadCallback(stockDemand);
          google.charts.setOnLoadCallback(quantityProductDemand);
                       
                       
            function totalSupplier(){ 
                var data = google.visualization.arrayToDataTable([  
                          ['Negeri', 'Jumlah'],  
                          <?php  
                //No of supplier from each state
                $chart_query = "SELECT user_state , count(*) as number FROM user WHERE user_role = '2' GROUP BY user_state ";  
                $result = mysqli_query($connection, $chart_query);


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
              data.addColumn('number', 'Bulan');
              data.addColumn('number', 'Guava');

              data.addRows([
              [0,  7],
              [1,  7],
              [2,  4],
                <?php  
                $query  =  "SELECT MONTH(product_date_submit) as month, AVG(product_price) as product_price FROM product WHERE product_name = 'Guava' GROUP BY MONTH(product_date_submit)  ";    
                $select_suppliers = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($select_suppliers)){

                  echo "[".$row["month"].",  ".$row["product_price"]."],";  
                }
               ?>
              [5,  15],
                [6,  13],
                [7,  12],
                [8,  1],
                [9,  4],
                [10,  6],
                [11,  8],
                [12,  11],
              ]);

              var options = {
              chart: {
//                title: 'Purata Harga Guava Mengikut Bulan',
//                subtitle: 'in millions of dollars (USD)'
              },
              width: 1000,
              height: 500
              };

              var chart = new google.charts.Line(document.getElementById('averageProduct'));

              chart.draw(data, google.charts.Line.convertOptions(options));
            }
             
             
            function productBought() {
              var data = new google.visualization.arrayToDataTable([
                ['Month', 'Produk Jualan'],
                
               <?php
                                global $connection;

                                $query  =  "SELECT COUNT(*) as count, MONTHNAME(product_date_submit) as month FROM product GROUP BY MONTHNAME(product_date_submit) ORDER BY  {MONTHNAME(product_date_submit)} ";    
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
                width: 950,
                legend: { position: 'none' },
                chart: {
                title: 'Jumlah produk dijual setiap bulan',
//                subtitle: 'popularity by percentage' 
                },
                axes: {
                x: {
                  0: { side: 'top', label: 'Jumlah produk'} // Top x-axis.
                }
                },
                bar: { groupWidth: "90%" }
              };

              var chart = new google.charts.Bar(document.getElementById('productBought'));
              // Convert the Classic options to Material options.
              chart.draw(data, google.charts.Bar.convertOptions(options));
              };
             
             
               
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
                       
             
             
           function stockDemand() {
              var data = google.visualization.arrayToDataTable([
//                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['Produk', 'Kuantiti Semasa'],
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
                title: 'Jumlah Stok & Kuantiti Permintaan Bagi Setiap Produk',
                subtitle: '',
                },
                bars: 'horizontal' // Required for Material Bar Charts.
              };

              var chart = new google.charts.Bar(document.getElementById('stockDemand'));

              chart.draw(data, google.charts.Bar.convertOptions(options));
          }
             
             
             
            function quantityProductDemand() {
                var data = google.visualization.arrayToDataTable([
                ['Genre', 'Fantasy & Sci Fi', 'Romance', 'Mystery/Crime', 'General',
                 'Western', 'Literature', { role: 'annotation' } ],
                ['2010', 10, 24, 20, 32, 18, 5, ''],
                ['2020', 16, 22, 23, 30, 16, 9, ''],
                ['2030', 28, 19, 29, 30, 12, 13, '']
                  
                  <?php
                  global $connection;

                  $query  =  "SELECT * FROM ebargain_product GROUP BY ebargain_product_name ";    
                  $select_ebargain = mysqli_query($connection, $query);
                  $all_product_count = mysqli_num_rows($select_ebargain);

                  while ($row = mysqli_fetch_assoc($select_suppliers)){

                    $ebargain_product_name    = escape($row['ebargain_product_name']);
                    $ebargain_product_quantity  = escape($row['ebargain_product_quantity']);
                    $ebargain_product_month   = escape($row['ebargain_product_month']);

                    echo "['$ebargain_product_month'" . "," . "{$product_quantity}],";
                  }
                              ?> 
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
              totalSupplier();
              totalProduct();
              averageProduct();
              productEachMonth();
              stockDemand();
              quantityProductDemand();
            });
                       
                    </script>
    

      
      
      
         
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
                  <div id="totalSupplier" style="width: 100%; height: 100%;"></div>  
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
                  <div id="totalProduct" style="width: 100%; height: 100%;"></div>  
                </div>
              </div>
            </div>
        
  </div>  
      
      
      
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Harga Purata Setiap Produk</h6>
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
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Produk Dijual Setiap Bulan</h6>
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
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Jualan Untuk Setiap Produk</h6>
      </div>
      <div class="card-body">
       <div id="productSoldEachMonth" style="width: 100%; height: 500px;"></div>  
      </div>
      </div>
    </div>
   </div>
      
      
      
      
  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Jumlah Stok & Kuantiti Permintaan Bagi Setiap Produk</h6>
      </div>
      <div class="card-body">
       <div id="stockDemand" style="width: 100%; height: 500px;"></div>  
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
</div>

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
<?php  include "../includes/admin_footer.php"; ?>