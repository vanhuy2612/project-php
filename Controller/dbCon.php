<?php 
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$database = 'shophuyka';
	$con = mysqli_connect($host,$user,$pass,$database);
	mysqli_set_charset($con,"utf8");
	if($con->connect_error) {
		die('Kết nối thất bại : '.$con->connect_error);
	}
 ?>