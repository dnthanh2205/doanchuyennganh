<?php
	$servername = "localhost";
 
	$username = "root";
 
	$password = "";
 
	$dbname = "nuochoahanghieu";
 
	$conn = mysqli_connect($servername,$username,$password,$dbname);
	
	
	/*$servername = "localhost";
 
	$username = "id3102421_db_nuochoahanghieu";
 
	$password = "dnthanh123";
 
	$dbname = "id3102421_db_nuochoahanghieu";
 
	$conn = mysqli_connect($servername,$username,$password,$dbname);*/
	
	mysqli_set_charset($conn,"utf8");
  
?>