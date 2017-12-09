<?php
	session_start();
	require "../lib/dbCon.php";
	require "../lib/function.php";
	/*if(isset($_GET["idNuochoa"])){
		$idNuochoa = $_GET["idNuochoa"];
		settype($idNuochoa,"int");
	}
	else $idNuochoa = "1";
	*/

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>NHHH</title>

    <!-- Bootstrap Core CSS -->
    
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="../css/shop-homepage.css">
	<link rel="stylesheet" type="text/css" href="../css/my.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php"><span class="glyphicon glyphicon-home"></span> TRANG CHỦ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?p=gioithieu">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="?p=gioithieu">Liên hệ</a>
                    </li>
                </ul>
				<form class="navbar-form navbar-left" role="search" action="index.php">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Nhập thông tin cần tìm">
			        </div>
			        <button type="submit" class="btn btn-default" name="submit"><a href="?p=timkiem">Search</a></button>
			    </form>
			    <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="../giohang/giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ Hàng 
                        <?php 
							if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
								echo "";
							}else{
								$total = 0;
								foreach($_SESSION['cart'] as $value){
									$total += $value['quantity']; 	
								}
								echo "($total)";
							} 
						?>
                        </a>
                    </li> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
			<?php
				$nuochoa = "SELECT * FROM nuochoa WHERE idNuochoa = ".$_GET["id"]."";
				$result = mysqli_query($conn, $nuochoa);
			    $row = mysqli_fetch_assoc($result)
        	?>
            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $row['tenNuochoa'] ?></h1> <hr>

                <!-- Preview Image -->
             
                <div style="width:30%; float:left;">
                	<img class="img-responsive" src="../image/<?php echo $row['hinhanh'] ?>" alt="">
                </div>
                
                	<b>Dung tích:</b> <?php echo $row['dungtich'] ?>ml <br><br>
                    <b>Giá:</b> <?php echo number_format($row['gia']); ?> đ <br><br>
                    <b>Năm sản xuất:</b> <?php echo $row['namsx'] ?> <br><br>
                	<b>Xuất sứ:</b> <?php echo $row['xuatsu'] ?> <br><br>
					<a class="btn btn-primary" href="../giohang/insert.php?id=<?php echo $row['idNuochoa'] ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Chọn Mua</a>
                <hr>

                <!-- Post Content -->
                
                	<span><?php echo $row['thongtinnuochoa'] ?></span>
               
                <hr>       
            </div>

            <!--Sản phẩm liên quan -->
            <div class="col-md-3">
				
                <div class="panel panel-default">
                    <div class="panel-heading"><b>Sản phẩm liên quan</b></div>
                        <div class="panel-body">
    						<?php
							  if(isset($_GET['p'])){
							  $get_page = $_GET['p'];
							  }else{
								$get_page='';
								}
							  $nuochoa = "SELECT * FROM nuochoa WHERE idNhanhieu = '".$_GET['p']."' LIMIT 0,5";
							  $result = mysqli_query($conn, $nuochoa);
							  while($row = mysqli_fetch_assoc($result)){
							?>
                            <!-- item -->
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="../page/detail.php?p=<?php echo $row['idNhanhieu'] ?>&id=<?php echo $row['idNuochoa'] ?>">
                                        <img class="img-responsive" src="../image/<?php echo $row['hinhanh'] ?>" alt="">
                                    </a>
                                </div>
                                <div >
                                    <a href="../page/detail.php?p=<?php echo $row['idNhanhieu'] ?>&id=<?php echo $row['idNuochoa'] ?>"><b><?php echo $row['tenNuochoa'] ?></b></a> 
                                </div>
                                <p><b>Giá:</b> <?php echo number_format($row['gia']); ?> đ</p>
                                <div class="break"></div>
                            </div>
                            <!-- end item -->
                            <?php } ?>
                             
                        </div>
                	</div>
                    
            	</div>
			<!--END Sản phẩm liên quan -->
            
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
            	<marquee direction="left"><p>Đồ Án Chuyên Ngành</p></marquee>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/my.js"></script>

</body>

</html>
