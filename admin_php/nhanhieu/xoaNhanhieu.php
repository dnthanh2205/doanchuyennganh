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
	$idNhanhieu = $_GET["idNhanhieu"]; 
	settype($idNhanhieu, "int");
	$qr = "DELETE FROM nhanhieu 
			WHERE idNhanhieu = '$idNhanhieu'";
	mysqli_query($conn,$qr);
	header("location:quanLyNhanhieu.php");
?>