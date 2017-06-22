<?php
$connect=mysqli_connect("localhost","travel","tra1043342","travel");
mysqli_query($connect,'SET NAMES utf8');
$query="SELECT contact_type,count(*) as number FROM contact GROUP BY contact_type";
$result=mysqli_query($connect,$query);


$query2="SELECT member_id, COUNT( member_id ) as number
FROM member GROUP BY length(member_id) >=15";
$result2=mysqli_query($connect,$query2);

$query3="SELECT travel_traffic,count(*) as number FROM travel GROUP BY travel_traffic";
$result3=mysqli_query($connect,$query3);

?>

<!DOCTYPE html>
<html>
<head>
  <title>analysis</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/analysis.css">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load('current',{'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    google.charts.setOnLoadCallback(drawChart2);
    google.charts.setOnLoadCallback(drawChart3);
    function drawChart()
    {

         var data = google.visualization.arrayToDataTable([['contact_type','number'],
           <?php
            while($row = mysqli_fetch_array($result))
            {
                echo "['".$row["contact_type"]."',".$row["number"]."],";
            }
            ?>
          ]);
         var options = {
            title: '意見類別分析'
         };
         var chart =new google.visualization.PieChart(document.getElementById('piechart'));
         chart.draw(data,options);
    }
    function drawChart2()
    {

         var data = google.visualization.arrayToDataTable([['member_id','number'],
           <?php
            while($row = mysqli_fetch_array($result2))
            {
                echo "['".$row["member_id"]."',".$row["number"]."],";
            }
            ?>
          ]);
         var options = {
            title: '登入方式分析'
         };
         var chart =new google.visualization.PieChart(document.getElementById('piechart2'));
         chart.draw(data,options);
    }

    function drawChart3()
    {

         var data = google.visualization.arrayToDataTable([['travel_traffic','number'],
           <?php
            while($row = mysqli_fetch_array($result3))
            {
                echo "['".$row["travel_traffic"]."',".$row["number"]."],";
            }
            ?>
          ]);
         var options = {
            title: '行程交通工具分析'
         };
         var chart =new google.visualization.PieChart(document.getElementById('piechart3'));
         chart.draw(data,options);
    }



</script>

</head>
<body>

  <div style="width:900px;" class="analysis">
    <h3 align="center">圓餅圖1</h3>

      <div id="piechart" style="width: 900px; height: 500px;"></div>

      <div style="width:900px;">
    <h3 align="center">圓餅圖2</h3>

      <div id="piechart2" style="width: 900px; height: 500px;"></div>

      <h3 align="center">圓餅圖3</h3>

      <div id="piechart3" style="width: 900px; height: 500px;"></div>
</body>
</html>