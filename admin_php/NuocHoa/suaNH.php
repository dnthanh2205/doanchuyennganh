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

$idNuochoa = $_GET["TT"]; 
settype($idNuochoa, "int");
$row = ChiTietNuocHoa($idNuochoa);
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../style.css">
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
</head>

<body>

	<div class="container container-max">
 		<header>
 		<!-- nội dung phần header-->
        	<div class="row header-top">
                <div class="col-xs-4 col-sm-4 col-md-3 logo">
                    <h1><a href="#"><img src="file:///C|/xampp/htdocs/img/pro.png"/></a></h1>
                </div>
                <nav class="col-xs-8 col-sm-8 col-md-9 navbar navbar-default header-menu" role="navigation">
                
                <div class="collapse navbar-collapse collapse-li" id="collapse">
                    <ul>
        				<li><a href="../loainuochoa/testquanLyLoai.php">Loại nước hoa</a></li>
                        <li><a href="../nhanhieu/quanLyNhanhieu.php">Nhãn hiệu</a></li>
        				<li><a href="quanLyNH.php">Sản phẩm nước hoa</a></li>
                        <li><a href="../giohang/giohang.php">Giỏ hàng</a></li>
                        <li><a href="../index.php">Đăng xuất</a></li>
    				</ul> 
               </div>
                </nav>
            </div>
            
            <div class="row header-title">
            	<div class="col-xs-12 title">
        			<span class="light white">NƯỚC HOA HÀNG HIỆU</span>
       				<p class="regular white">www.nuochoahanghieu.tk</p>
    			</div>
            
            
            </div>
 		</header>
 		<section>
 		<!-- nội dung phần main-->
        	<div id = "about-us">
				<div class="row about-title">
					<h2 class="regular white">SỬA NƯỚC HOA</h2>
			  	</div>
              <form action="" method="post" name="form1" id="form1">
			  <div class="row about-list-post">
						<?php
                            $qr = "SELECT * FROM nhanhieu";
                            $data = mysqli_query($conn, $qr);
                         ?>
                		<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert">
                        	<p>Nhãn hiệu</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post editText"
						<p><select name="idNhanhieu" id="idNhanhieu" title="chọn">
							<?php
                            while($r = mysqli_fetch_array($data))
                            { 
							print_r($r);
                            ?>
                            <option <?php if($r['idNhanhieu'] == $row['idNhanhieu']) echo "selected = 'selected'" ?> value="<?php echo $r["idNhanhieu"] ?>"><?php echo $r["tenNhanhieu"] ; ?></option>
                                <?php
				  		
								}
								?>
                            </select></p>
                           </div>
				</div>
					<div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Tên nước hoa</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" value="<?php echo $row["tenNuochoa"] ; ?>" placeholder="Tên nước hoa" type="text"  name="tenNuochoa" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Giá nước hoa</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" value="<?php echo $row["gia"] ;?>" placeholder="Giá (VNĐ)" type="number"  name="giaNuochoa" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Dung tích</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" value="<?php echo $row["dungtich"] ; ?>" placeholder="Dung tích (ml)" type="text"  name="dungtich" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Năm sản xuất</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" value="<?php echo $row["namsx"] ; ?>" placeholder="Năm sản xuất" type="text"  name="namsx" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Xuất xứ</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" value="<?php echo $row["xuatsu"]; ?>" placeholder="Xuất xứ" type="text"  name="xuatxu" >
                    	</div>
                    </div>
                    
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-12 about-post ">
                        	<input class="btn btn-default" type="submit" name="buttonSua" id="btnThem" value="Sửa">
                        </div>
                    </div>
                    
                    <?php
						if (isset($_POST["buttonSua"])) {
							print_r($_POST);
							/*$path = "upload/"; // ảnh upload sẽ được lưu vào thư mục data
						 	$tmp_name = $_FILES["hinhNH"]["tmp_name"];
							$name = $_FILES["hinhNH"]["name"];*/
							$nhanHieu = $_POST["idNhanhieu"];
							$tenNuochoa = $_POST["tenNuochoa"];
							$giaNuochoa = $_POST["giaNuochoa"];
							$dungtich = $_POST["dungtich"];
							$namsx = $_POST["namsx"];
							$xuatxu = $_POST["xuatxu"];
							/*move_uploaded_file($tmp_name,$path.$name);*/
							$sql = "UPDATE nuochoa SET
							idNhanhieu = '$nhanHieu',
							tenNuochoa = '$tenNuochoa',
							gia = '$giaNuochoa',
							dungtich = '$dungtich',
							namsx = '$namsx' ,
							xuatsu = '$xuatxu'
							WHERE idNuochoa = '$idNuochoa'" ;
							mysqli_query($conn,$sql);
							header("location:quanLyNH.php");
						}
						
					?>
                
			  
                </form>
		  </div><!-- end about us -->
 		</section>
        
        
 		<footer>
 		<!-- nội dung phần footer-->
        
        	<div class="row footer">
            	<div class="col-xs-6 col-sm-7 footer-left">
        			<p class="regular">Profile Designed by Bootstrap  |  Tong Minh Nhut</p>
            	</div>
                <div class="col-xs-2 col-sm-3">
        			  
            	</div>
                 <div class="col-xs-2 col-sm-1">
        			 
            	</div>
                 <div class="col-xs-2 col-sm-1 ">
        			
            	</div>
            </div>
 		</footer>
 	</div>
	
    
</body>
</html>
