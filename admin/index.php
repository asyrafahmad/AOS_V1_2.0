<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>

<?php 
include "../includes/admin_header.php"; ?>

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
          google.charts.load('current', {'packages':['bar']});
          google.charts.load("current", {packages:["corechart"]});
                       
          google.charts.setOnLoadCallback(totalSupplier);  
          google.charts.setOnLoadCallback(totalProduct);
          google.charts.setOnLoadCallback(averageProduct);
          google.charts.setOnLoadCallback(productBought);
          google.charts.setOnLoadCallback(productSoldEachMonth);
          google.charts.setOnLoadCallback(quantityElodgeProduct);
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
              data.addColumn('number', '<?php 
                             if(isset($_GET['g_p'])){
                                echo $graph_product = $_GET['g_p'];  
                             }
                             else{
                             
                             }
                             ?>');
              data.addRows([
                <?php   
                  
                    if(isset($_GET['g_p'])){
                        
                        $graph_product = $_GET['g_p'];  

                        $query  =  "SELECT MONTH(product_date_submit) as month, AVG(product_price) as product_price FROM product WHERE product_name = '{$graph_product}' GROUP BY MONTH(product_date_submit)  ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                          echo "[".$row["month"].",  ".$row["product_price"]."],";  
                        }
                    }
                    else{
                        
                        $graph_product = '';
                        
                        $query  =  "SELECT MONTH(product_date_submit) as month, AVG(product_price) as product_price FROM product WHERE product_name = '{$graph_product}' GROUP BY MONTH(product_date_submit)  ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                          echo "[".$row["month"].",  ".$row["product_price"]."],";  
                            
                        }
                    }
                    
                    
               ?>
              ]);

              var options = {
              chart: {
                title: 'Purata Harga Produk <?php  
                            if(isset($_GET['g_p'])){
                                echo $graph_product = $_GET['g_p'];  
                             }
                             else{
                             
                             }  ?> Mengikut Bulan',
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
                width: 900,
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

                        $query  =  "SELECT payment_product, SUM(payment_quantity) as sum_product_quantity FROM payment_product_history WHERE payment_status = 'Berjaya' GROUP BY payment_product ";    
                        $select_suppliers = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_assoc($select_suppliers)){

                            $product_name = escape($row['payment_product']);
                            $product_quantity = escape($row['sum_product_quantity']);

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
             
             
             
             
             
             function quantityElodgeProduct() {
                var data = google.visualization.arrayToDataTable([
                  ['Bulan', 'Kuantiti (<?php  
                            if(isset($_GET['g_p'])){
                                echo $graph_product = $_GET['g_p'];  
                             }
                             else{
                             
                             }  ?>)'],
                
                     <?php
                    
                        global $connection;
                    
                        if(isset($_GET['g_p'])){
                    
                            $product_name = $_GET['g_p'];

                            $query  =  "SELECT elodge_product_name, SUM(elodge_product_quantity) as product_quantity, elodge_product_harvest_date FROM elodge_product WHERE elodge_product_name = '$product_name' GROUP BY elodge_product_harvest_date ORDER BY elodge_product_harvest_date ASC";    
                            $select_suppliers = mysqli_query($connection, $query);
                            $all_product_count = mysqli_num_rows($select_suppliers);

                            while ($row = mysqli_fetch_assoc($select_suppliers)){

                                $month = escape($row['elodge_product_harvest_date']);
                                $quantity = escape($row['product_quantity']);

                                echo "['$month'" . "," . "'$quantity'],";
                            }
                        }
                        else{
                            
                            $product_name = '';

                            $query  =  "SELECT elodge_product_name, SUM(elodge_product_quantity) as product_quantity, elodge_product_harvest_date FROM elodge_product WHERE elodge_product_name = '$product_name' GROUP BY elodge_product_harvest_date ORDER BY elodge_product_harvest_date ASC";    
                            $select_suppliers = mysqli_query($connection, $query);
                            $all_product_count = mysqli_num_rows($select_suppliers);

                            while ($row = mysqli_fetch_assoc($select_suppliers)){

                                $month = escape($row['elodge_product_harvest_date']);
                                $quantity = escape($row['product_quantity']);

                                echo "['$month'" . "," . "'$quantity'],";
                            }
                        }
                    
                    
                     ?>
                ]);

                var options = {
                  chart: {
                    title: 'Kuantiti Produk Elodge (<?php  
                            if(isset($_GET['g_p'])){
                                echo $graph_product = $_GET['g_p'];  
                             }
                             else{
                             
                             }  ?>)',
                    subtitle: '',
                  }
                };

                var chart = new google.charts.Bar(document.getElementById('quantityElodgeProduct'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
                       
             
             
         
             
             function stockDemand() {
                var data = google.visualization.arrayToDataTable([
                  ['Produk', 'Stok Semasa', 'Kuantiti Permintaan'],

                    <?php


                      if(isset($_GET['g_p'])){

                          $product_name = $_GET['g_p'];

                          $query  =  "SELECT SUM(product.product_quantity) as sum_product_quantity, SUM(elodge_product_book.book_buyer_product_quantity) as sum_product_demand FROM product JOIN elodge_product_book ON product.product_name=elodge_product_book.book_buyer_product_name WHERE  product.product_name = '$product_name' GROUP BY book_buyer_product_name";    
                            $select_suppliers = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_suppliers)){

                              echo "['$product_name',  ".$row["sum_product_quantity"].",  ".$row["sum_product_demand"]."],";  
                            }
                      }
                      else{

                          $product_name = '';

                          $query  =  "SELECT SUM(product.product_quantity) as sum_product_quantity, SUM(elodge_product_book.book_buyer_product_quantity) as sum_product_demand FROM product JOIN elodge_product_book ON product.product_name=elodge_product_book.book_buyer_product_name WHERE  product.product_name = '$product_name' GROUP BY book_buyer_product_name";    
                            $select_suppliers = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($select_suppliers)){

                              echo "['$product_name',  ".$row["sum_product_quantity"].",  ".$row["sum_product_demand"]."],";  
                            }
                      }



                    ?>

                ]);

                var options = {
                  chart: {
                    title: 'Stok Semasa & Kuantiti Permintaan (<?php  
                            if(isset($_GET['g_p'])){
                                echo $graph_product = $_GET['g_p'];  
                             }
                             else{
                             
                             }  ?>)',
                    subtitle: '',
                  }
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
              quantityElodgeProduct();
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
      
        
<!--
        
   <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Kuantiti Produk Elodge mengikut Bulan</h6>
      </div>
      <div class="card-body">
       <div id="quantityElodgeProduct" style="width: 100%; height: 100%;"></div>  
      </div>
      </div>
    </div>
   </div>
-->
      
      
      
    <div class="row">
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Kuantiti Produk Elodge Mengikut Bulan (pilih produk)</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                  <div class="dropdown-header text-primary">Produk</div>
                  <div class="dropdown-divider"></div>

                <?php


                    $query  =  "SELECT * FROM elodge_product ";    
                    $select_product = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_product)){

                        $elodge_product_name  = escape($row['elodge_product_name']);

                        echo "<a class='dropdown-item' href='index.php?g_p=$elodge_product_name'>$elodge_product_name</a>";


                    } 
                ?>                  
                </div>
            </div>
          </div>
          <div class="card-body">
           <div id="quantityElodgeProduct" style="width: 100%; height: 100%;"></div>  
          </div>
        </div>
      </div>
    </div>
        
        
    <div class="row">
      <div class="col-xl-12 col-lg-7">
        <div class="card shadow mb-4">
          <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Jumlah Stok Semasa dan Kuantiti Permintaan Untuk Setiap Produk (pilih produk)</h6>
            <div class="dropdown no-arrow">
                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(17px, 19px, 0px);">
                  <div class="dropdown-header text-primary">Produk</div>
                  <div class="dropdown-divider"></div>

                <?php


                    $query  =  "SELECT * FROM elodge_product_book GROUP BY book_buyer_product_name";    
                    $select_product = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($select_product)){

                        $book_buyer_product_name  = escape($row['book_buyer_product_name']);

                        echo "<a class='dropdown-item' href='index.php?menu=elodge&g_p=$book_buyer_product_name'>$book_buyer_product_name</a>";


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