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
	$idMenu = $_GET["idLoai"]; 
	settype($idMenu, "int");
	$qr = "DELETE FROM menu 
			WHERE idMenu = '$idMenu'";
	mysqli_query($o,$qr);
	header("location:testquanLyLoai.php");
?>