<?php
ob_start();
session_start();
if ( !(isset($_SESSION["idUser"]) && $_SESSION["idGroup"]==1) ){
	header("index.php");
}
require "../../lib/dbCon.php" ;
require "../quantri.php" ;

?>

<?php
	$idNuochoa = $_GET["idNuochoa"]; 
	settype($idMenu, "int");
	$qr = "DELETE FROM nuochoa WHERE idNuochoa = '$idNuochoa'";
	mysqli_query($conn,$qr);
	header("location:quanLyNH.php");
?>