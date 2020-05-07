<?php
	$con=mysqli_connect("localhost","root","123456","raspberryDB");
	echo "23";
	if(!$con){
		echo "Failed to connect to MySQL: " .mysql_error();
	}
	$now1=date('Ymdhis');
	$temp = $_GET['temp'];
	$hum = $_GET['hum'];
	mysqli_query($con,"INSERT INTO temp(datetime,temp,hum) VALUES($now1,$temp,$hum)") or die("add error");
	mysqli_close($con);
		echo "date time=".$now1.", temp=".$temp.", hum=".$hum;
?>

