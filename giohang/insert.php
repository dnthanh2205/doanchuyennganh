
<?php
	session_start();
	require('../lib/dbCon.php');
	
	$sql = "SELECT * FROM nuochoa";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[$row['idNuochoa']] = $row;
		}
	}
	
	$id = $_GET['id'];
	if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
		$data[$id]['quantity'] = 1;
		$_SESSION['cart'][$id] = $data[$id];
	}else{
		if(array_key_exists($id, $_SESSION['cart'])){
			$_SESSION['cart'][$id]['quantity']+=1;
		}else{
			$data[$id]['quantity'] = 1;
			$_SESSION['cart'][$id] = $data[$id];
		}
	}
	header('Location: ../index.php ');
	//header('Location:  '. $_SERVER['HTTP_REFERER']);
	exit;
?>
