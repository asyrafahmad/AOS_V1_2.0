<?php include "../includes/db_connection.php";   ?>
<?php include "../includes/functions.php";   ?>


<?php  include "../includes/admin_header.php"; ?>

<div class="wrapper d-flex align-items-stretch">

  <?php include "includes/supplier_sidebar_navigation.php" ?>
  
  <!-- Page Content  -->
  <div id="content" class="">

    <?php include "../includes/topbar_nav.php" ?>

    <div class="container-fluid">
      
    <div class="d-sm-flex align-items-center justify-content-between m-4">
      <h1 class="h3 mb-0 text-gray-800">Dashboard</h1> 
    </div>

        
    <?php
    
                    echo $user_username = $_SESSION['user_username'];
    
                    echo $query  =  "SELECT SUM(payment_quantity) as quantity, payment_product FROM payment_product_history WHERE payment_status= 'Berjaya' AND payment_supplier_name = '$user_username' GROUP BY payment_product ";    
                  $select_suppliers = mysqli_query($connection, $query);

                  while ($row = mysqli_fetch_assoc($select_suppliers)){

                      $payment_product = escape($row['payment_product']);
                      $payment_quantity = escape($row['quantity']);

                      echo "['$payment_product'" . "," . "$payment_quantity],";
                  }
    
    ?>        
        
        
        
        
        
        
    <!-- Content Row -->
    <div class="row">

      <!-- Product -->
      <div class="col-xl-4 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #d4d5f9;">
              <img class="img-icon" src="../img/icon/product.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 
    
                global $connection;
        
                $user_id = $_SESSION['user_id'];
    
                $query = "SELECT * FROM product WHERE product_supplier = '{$user_id}' ";
                $select_all_products = mysqli_query($connection,$query);
                $product_count = mysqli_num_rows($select_all_products);

                echo $product_count;
            ?>
            </h1>
            <h5>Produk</h5>
          </div>
        </div>
      </div>

      <!-- Complete Payment -->
      <div class="col-xl-4 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #A8F4E5;">
              <img class="img-icon" src="../img/icon/Buyer.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php
                
                $user_id = $_SESSION['user_id'];
                
                $query = "SELECT * FROM product WHERE product_supplier = '{$user_id}' AND product_status = 'Selesai' ";
                $select_all_products = mysqli_query($connection,$query);
                $product_count = mysqli_num_rows($select_all_products);

                echo $product_count;
            ?>
            </h1>
            <h5>Lengkap Pembayaran</h5>
          </div>
        </div>
      </div>

      <!-- E-lodge -->
      <div class="col-xl-4 mb-2">
        <div class="card py-2 shadow border">
          <div class="card-body dashboard">
            <div class="icon-bg" style="background: #FF9E9E;">
              <img class="img-icon" src="../img/icon/file.png" height="32" width="32">
            </div>
            <h1 class="pt-2 font-weight-bold text-dark dashboard-font">
              <?php 
                
                $query = "SELECT * FROM elodge_product WHERE elodge_supplier = '{$user_id}'";
                $select_all_products = mysqli_query($connection,$query);
                $product_count = mysqli_num_rows($select_all_products);

                echo $product_count;
            ?>
            </h1>
            <h5>E-Lodge</h5>
          </div>
        </div>
      </div>
    </div>

<!----------------------------------------------------------------------------------------------------------------------------------------------  --> 
     <?php  
      
       ?>  

     <script type="text/javascript" src="../js/resizeChart.js"></script>
     <script type="text/javascript" src="../js/barChartProductSupplier.js"></script>

     <script type="text/javascript">
         
                          
//      google.charts.load('current', {'packages':['corechart']});
      google.charts.load('current', {'packages':['bar']});
      google.charts.load('current', {'packages':['bar']});
      google.charts.load('current', {'packages':['bar']});
      google.charts.load("current", {packages:["corechart"]});  
         
      
//      google.charts.setOnLoadCallback(supplierEachState);
      google.charts.setOnLoadCallback(stockDemand);
      google.charts.setOnLoadCallback(productSoldEachMonth);
      google.charts.setOnLoadCallback(totalProductSellEachMonth);
      google.charts.setOnLoadCallback(quantityProductDemand);  

         
//     -----------------------------------------------------------------------------------
//      Pie chart using canvas.js
         
     window.onload = function () {

            var chart = new CanvasJS.Chart("supplierEachState", {
                theme: "light2",
                animationEnabled: true,
                title: {
                    text: "Pembelian Mengikut Negeri"
                },
                subtitles: [{
                    text: "",
                    fontSize: 16
                }],
                data: [{
                    type: "pie",
                    indexLabelFontSize: 18,
                    radius: 80,
                    indexLabel: "{label} - {y}",
//                    yValueFormatString: "###0.0\"%\"",        
                    click: explodePie,
                    dataPoints: 
                    [ 
                        <?php  
                        
                        global $connection; 
                        
                          $query = "SELECT user_state, count(*) as number FROM user WHERE user_role= '3' GROUP BY user_state";  
                          $result = mysqli_query($connection, $query);  

                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "{ y: ".$row["number"].", label: '".$row["user_state"]."'},";  
                          }  
                        ?>  
                    ]
                }]
            });
            chart.render();

            function explodePie(e) {
                for(var i = 0; i < e.dataSeries.dataPoints.length; i++) {
                    if(i !== e.dataPointIndex)
                        e.dataSeries.dataPoints[i].exploded = false;
                }
            }

        }
     
//     -----------------------------------------------------------------------------------
     
     
     
//        window.onload = function () {
//
//        var chart = new CanvasJS.Chart("supplierEachState", {
//            animationEnabled: true,
//            theme: "light2", // "light1", "light2", "dark1", "dark2"
//            title:{
//                text: "Top Oil Reserves"
//            },
//            axisY: {
//                title: "Reserves(MMbbl)"
//            },
//            data: [{        
//                type: "column",  
//                showInLegend: true, 
//                legendMarkerColor: "grey",
//                legendText: "MMbbl = one million barrels",
//                dataPoints: [      
//                    { y: 300878, label: "Venezuela" },
//                    { y: 266455,  label: "Saudi" },
//                    { y: 169709,  label: "Canada" },
//                    { y: 158400,  label: "Iran" },
//                    { y: 142503,  label: "Iraq" },
//                    { y: 101500, label: "Kuwait" },
//                    { y: 97800,  label: "UAE" },
//                    { y: 80000,  label: "Russia" }
//                ]
//            }]
//        });
//        chart.render();
//
//        }
//     
//     
     
//     -----------------------------------------------------------------------------------     
//     -----------------------------------------------------------------------------------
         
         
         
         
//      function supplierEachState(){ 
//        var data = google.visualization.arrayToDataTable([  
//                  ['Negeri', 'Jumlah'],  
//                  <?php  
//                      $query = "SELECT user_state, count(*) as number FROM user WHERE user_role= '3' GROUP BY user_state";  
//                      $result = mysqli_query($connection, $query);  
//
//                      while($row = mysqli_fetch_array($result))  
//                      {  
//                           echo "['".$row["user_state"]."', ".$row["number"]."],";  
//                      }  
//                  ?>  
//             ]);  
//        var options = {  
//              //title: 'Jumlah pembeli mengikut negeri',  
//              //is3D:true,  
//              pieHole: 0.3  
//             };  
//        var chart = new google.visualization.PieChart(document.getElementById('supplierEachState'));  
//        chart.draw(data, options);  
//      }

     
//     -----------------------------------------------------------------------------------
     
      function stockDemand() {

          var data = google.visualization.arrayToDataTable([
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
                width: 1000,
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

          var chart = new google.charts.Bar(document.getElementById('stockDemand'));

          chart.draw(data, google.charts.Bar.convertOptions(options));
        }  

//     -----------------------------------------------------------------------------------

        function productSoldEachMonth() {
          var data = google.visualization.arrayToDataTable([
            ['Nama Buah', 'Kuantiti'],
                  <?php
                  global $connection;
              
                  $user_username = $_SESSION['user_username'];

                  $query  =  "SELECT SUM(payment_quantity) as quantity,payment_product FROM payment_product_history WHERE payment_status= 'Berjaya' AND payment_supplier_name = '$user_username' GROUP BY payment_product";    
                  $select_suppliers = mysqli_query($connection, $query);
                  $all_product_count = mysqli_num_rows($select_suppliers);

                  while ($row = mysqli_fetch_assoc($select_suppliers)){

                      $product_name = escape($row['payment_product']);
                      $product_quantity = escape($row['quantity']);

                      echo "['$product_name'" . "," . "$product_quantity],";
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
         
//     -----------------------------------------------------------------------------------




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
            

//     -----------------------------------------------------------------------------------



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
        
        
        
             <script>
           
            </script>   
        
        
        
        
        
        
        
        
        
        

    <div class="row">
      <div class="card-body">  
              <div class="col-xl-16">
                <div class="card shadow mb-5">               
                  
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pembelian Mengikut Negeri</h6>
                    </div><br>
                    <div id="supplierEachState" style="width: 100%; height: 350px;"></div><br>
                  
               </div>       
              </div>
        </div> 
    </div>

    <div class="row">
      <div class="card-body">  
              <div class="col-xl-16">
                <div class="card shadow mb-5">               
                  
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Jumlah Jualan Produk Setiap Bulan</h6>
                    </div><br>
                    <div class="card-body dashboard">
                        <div id="stockDemand" style="width: 100%; height: 100%;"></div><br>
                    </div>       
               </div>       
              </div>
        </div> 
    </div>

    <div class="row">
      <div class="card-body">  
              <div class="col-xl-16">
                <div class="card shadow mb-5">               
                  
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Pembelian Mengikut Kontan</h6>
                    </div><br>
                    <div class="card-body dashboard">
                        <div id="productSoldEachMonth" style="width: 100%; height: 500px;"></div><br>
                    </div>
                    
                 </div>       
              </div>
        </div> 
    </div>

  <div class="row">
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Jumlah Pembelian untuk Setiap Produk*</h6>
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