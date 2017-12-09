<?php
ob_start();
session_start();
if ( !(isset($_SESSION["idUser"]) && $_SESSION["idGroup"]==1) ){
	header("index.php");
}
require "../../lib/dbCon.php" ;
require "../quantri.php" ;

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
                        <li><a href="quanLyNH.php">Nhãn hiệu</a></li>
        				<li><a href="quanLyNH.php">Sản phẩm nước hoa</a></li>
                        <li><a href="../QLgiohang.php">Giỏ hàng</a></li>
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
					<h2 class="regular white">THÊM NƯỚC HOA</h2>
			  	</div>
              <form action="" method="post" name="form1" id="form1" enctype="multipart/form-data">
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
                            ?>
                            <option value="<?php echo $r["idNhanhieu"] ?>"><?php echo $r["tenNhanhieu"] ; ?></option>
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
					  	<input class="form-control" placeholder="Tên nước hoa" type="text"  name="tenNuochoa" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Giá nước hoa</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" placeholder="Giá (VNĐ)" type="number"  name="giaNuochoa" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Dung tích</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" placeholder="Dung tích (ml)" type="text"  name="dungtich" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Năm sản xuất</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" placeholder="Năm sản xuất" type="text"  name="namsx" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Xuất xứ</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" placeholder="Xuất xứ" type="text"  name="xuatxu" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Thông tin</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-4 about-post ">
					  	<input class="form-control" placeholder="Thông tin nước hoa" type="text"   name="thongTinNuochoa" >
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-3 about-post title-insert ">
                        	<p>Hình ảnh</p>
                        </div>
                    	<div class="col-xs-12 col-sm-12 col-md-9  ">
					  	<input  type="file" name="hinhNH" id="hinhNH" value="Chọn hình" />
                    	</div>
                    </div>
                    <div class="row about-list-post">
                    	<div class="col-xs-12 col-sm-12 col-md-12 about-post ">
                        	<input class="btn btn-default" class="glyphicon glyphicon-plus" type="submit" name="buttonThem" id="btnThem" value="Thêm">
                        </div>
                    </div>
                    </form>
                    <?php
						if (isset($_POST["buttonThem"])) {
							print_r($_POST);
							if($_FILES['hinhNH']['name'] != NULL){ // Đã chọn file
							   // Tiến hành code upload file
							   if($_FILES['hinhNH']['type'] == "image/jpeg"
								|| $_FILES['hinhNH']['type'] == "image/png"
								|| $_FILES['hinhNH']['type'] == "image/gif"){
								  // là file ảnh
								  // Tiến hành code upload
								  if($_FILES['hinhNH']['size'] > 2048576){
									  echo "File không được lớn hơn 2mb";
								  }else{
									  // file hợp lệ, tiến hành upload
									  $path = "../../image/"; // ảnh upload sẽ được lưu vào thư mục image
									  $tmp_name = $_FILES['hinhNH']['tmp_name'];
									  $name = $_FILES['hinhNH']['name'];
									  $type = $_FILES['hinhNH']['type']; 
									  $size = $_FILES['hinhNH']['size']; 
									  // Upload file
									  move_uploaded_file($tmp_name,$path.$name);
									  
								  }
								}else{
								  // không phải file ảnh
								  echo "Kiểu file không hợp lệ";
								}
						  }
						  else{
							   echo "Vui lòng chọn file";
						  }
							$nhaHieu = $_POST["idNhanhieu"];
							$tenNuochoa = $_POST["tenNuochoa"];
							$giaNuochoa = $_POST["giaNuochoa"];
							$dungtich = $_POST["dungtich"];
							$namsx = $_POST["namsx"];
							$xuatxu = $_POST["xuatxu"];
							//$image = $_FILES['hinhNH']['tmp_name']; 
							//$image_name = $_FILES['hinhNH']['name'];
							$thonTinNuochoa = $_POST["thongTinNuochoa"];
							//$file = "upload/$image_name";
							//move_uploaded_file($image, $file);
							
							
							
							$sql = "INSERT INTO nuochoa  VALUES(NULL,'$tenNuochoa','$giaNuochoa','$dungtich','$namsx','$xuatxu','$name','$thonTinNuochoa','$nhaHieu') ";
							
							mysqli_query($conn,$sql);
							header("location:quanLyNH.php");
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
