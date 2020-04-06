//  google.charts.load('current', {'packages':['corechart']});  
//google.charts.setOnLoadCallback(drawChart);  
//function drawChart()  
//{  
//    var data = google.visualization.arrayToDataTable([  
//              ['Gender', 'Number'],  
//              <?php  
//              while($row = mysqli_fetch_array($result))  
//              {  
//                   echo "['".$row["buyer_state"]."', ".$row["number"]."],";  
//              }  
//              ?>  
//         ]);  
//    var options = {  
//          //title: 'Jumlah pembeli mengikut negeri',  
//          //is3D:true,  
//          pieHole: 0.4  
//         };  
//    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
//    chart.draw(data, options);  
//}  
//
//


// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
      labels: ["Direct", "Referral", "Social"],
      datasets: [{
      data: [55, 30, 15],
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});
