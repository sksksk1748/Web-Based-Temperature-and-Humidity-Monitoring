<?php
   $con=mysqli_connect("localhost","root","123456","raspberryDB");
	
   $result =mysqli_query($con,"SELECT * FROM temp");
   echo "<table border='1'>
   <tr>
   <th> Date Time </th>
   <th> Temperature </th>
   <th> Humidity  </th>
   </tr>";
   while($row = mysqli_fetch_array($result)){
   echo "<tr>";
   echo "<td>". $row['datetime'] ."</td>";
   echo "<td>". $row['temp'] ."</td>";
   echo "<td>". $row['hum'] ."</td>";
   echo "</tr>";
   }
   echo "</table>";
   mysqli_close($con);
?>
