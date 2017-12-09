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

$idNhanhieu = $_GET["TT"]; 
settype($idNhanhieu, "int");
$row = ChiTietNhanHieu($idNhanhieu);
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
                        <li><a href="quanLyNhanhieu.php">Nhãn hiệu</a></li>
        				<li><a href="../NuocHoa/quanLyNH.php">Sản phẩm nước hoa</a></li>
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
					<h2 class="regular white">SỬA NHÃN HIỆU NƯỚC HOA</h2>
			  	</div>
              <form action="" method="post" name="form1" id="form1">
			  <div class="row about-list-post">
              	 <?php
					$qr = "SELECT * FROM menu";
					$data = mysqli_query($conn, $qr);
				  ?>
                		<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert">
                        	<p>Loại nước hoa</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post "
						<p><select name="idMenu" id="idMenu" title="chọn">
							<?php
                            while($r = mysqli_fetch_array($data))
                            { 
                            ?>
                            <option <?php if($r['idMenu'] == $row['idMenu']) echo "selected = 'selected'" ?> value="<?php echo $r["idMenu"] ?>"><?php echo $r["TenMenu"] ; ?></option>
                                <?php
				  		
								}
								?>
                            </select></p>
                           </div>
				  </div>
					<div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Tên nhãn hiệu</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input  value="<?php echo $row["tenNhanhieu"]; ?>" class="form-control" placeholder="Tên nhãn hiệu" type="text"  name="tenNhanhieu" >
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
							$tenLoai = $_POST["idMenu"];
							$tenNhanhieu = $_POST["tenNhanhieu"];
							
							$sql = "UPDATE nhanhieu SET 
							tenNhanhieu = '$tenNhanhieu',
							idMenu = '$tenLoai'
							WHERE idNhanhieu = '$idNhanhieu'
							";
							
							mysqli_query($conn,$sql);
							header("location:quanLyNhanhieu.php");
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
