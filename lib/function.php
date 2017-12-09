<?php
	function loainuochoa(){
			$qr = "SELECT * FROM menu";
			return mysql_query($qr);
	}
	function nhanhieu($idMenu){
			$qr = "SELECT * FROM nhanhieu WHERE idMenu = $idMenu";
			return mysql_query($qr);
	}
	function nuochoa(){
			$qr = "SELECT * FROM nuochoa";
			return mysql_query($qr);
	}
	
	function chitiet_theo_id($idNuochoa){
		$qr = "SELECT * FROM nuochoa WHERE idNuochoa = $id";
		return mysql_query($qr);
	}
?>