<?php

	require "../../lib/dbCon.php" ;
	require "../quantri.php" ;
	
	$qery = "SELECT * FROM chitietgiohang
	WHERE idHoadon = ".$_GET['Ma']."		
			ORDER BY idHoadon DESC
		";
	
	
	$data = mysqli_query($conn, $qery);
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


<body>

	<div class="container container-max">
 		<header>
 		<!-- nội dung phần header-->
        	<div class="row header-top">
                <div class="col-xs-4 col-sm-4 col-md-3 logo">
                    <h1><a href="#"><img src="../img/pro.png"/></a></h1>
                </div>
                <nav class="col-xs-8 col-sm-8 col-md-9 navbar navbar-default header-menu" role="navigation">
                
                <div class="collapse navbar-collapse collapse-li" id="collapse">
                    <ul>
        				<li><a href="../loainuochoa/testquanLyLoai.php">Loại nước hoa</a></li>
                        <li><a href="../nhanhieu/quanLyNhanhieu.php">Nhãn hiệu</a></li>
        				<li><a href="../NuocHoa/quanLyNH.php">Sản phẩm nước hoa</a></li>
                        <li><a href="giohang.php">Giỏ hàng</a></li>
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
					<h2 class="regular white">DANH SÁCH KHÁCH MUA HÀNG</h2>
				</div>
                
                <div class="row ">
                	<div class="col-xs-12 col-sm-3 col-md-2 about-post title-p">
						<p>Mã CT</p>
					</div>
                	<div class="col-xs-12 col-sm-3 col-md-3 about-post title-p">
						<p>Tên nước hoa</p>
					</div>
                	<div class="col-xs-12 col-sm-3 col-md-2 about-post title-p">
						<p>Giá nước hoa</p>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 about-post title-p">
						<p>Số lượng</p>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-3 about-post title-p">
                    	<p>Tổng giá</p>
					</div>
                </div>
                <?php
				while($r = mysqli_fetch_assoc($data))
				{ 
					ob_start();
				?>
				<div class="row ">
                	<div class="col-xs-12 col-sm-3 col-md-2 about-post">
                        <P>{idHoadon}</P>
					</div>
                	<div class="col-xs-12 col-sm-3 col-md-3 about-post">
                        <P>{tenNuochoa}</P>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 about-post">
                        <P>{gia}</P>
					</div>
					<div class="col-xs-12 col-sm-3 col-md-2 about-post">
                        <p>{soluong}</p>
					</div>
                    <div class="col-xs-12 col-sm-3 col-md-3 about-post">
                        <p>{thanhtien}</p>
					</div>
                  </div>
                    <?php
				  		$s=ob_get_clean();
						$s = str_replace("{idHoadon}", $r["idHoadon"], $s);
						$s = str_replace("{tenNuochoa}", $r["tenNuochoa"], $s);
						$s = str_replace("{gia}", $r["gia"], $s);
						$s = str_replace("{soluong}", $r["soluong"], $s);
						$s = str_replace("{thanhtien}", $r["thanhtien"], $s);
						echo $s ;
					}
				  ?>
                  
				
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
