<!doctype html>
<html>
	<head>
		<title>Bar Chart</title>
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
	</head>
	<body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
<?php
$con=mysqli_connect("localhost","root","123456","raspberryDB");
if(!$con){
	echo "Fail to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM temp");
   echo "<table border='1'>
   <tr>
   <th> Date Time </th>
   <th> Temperature </th>
   <th> Humidity  </th>
   </tr>";
   $chart_data = '';
   while($row = mysqli_fetch_array($result)){
   echo "<tr>";
   echo "<td>". $row['datetime'] ."</td>";
   echo "<td>". $row['temp'] ."</td>";
   echo "<td>". $row['hum'] ."</td>";
   echo "</tr>";
   $chart_data .="{ datetime:'".$row["datetime"]."', temp:".$row["temp"].", hum:".$row["hum"]."}, ";
   }
   $chart_data = substr($chart_data, 0, -2);
   echo "</table>";
   mysqli_close($con);
?>   
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'datetime',
 ykeys:['temp', 'hum'],
 labels:['temp', 'hum'],
 hideHover:'auto',
 stacked:true
});
</script>
	</body>
</html>

