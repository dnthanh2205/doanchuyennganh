<?php
	session_start();
	require "lib/dbCon.php";
	if(isset($_GET["p"]))
		$p = $_GET["p"];
	else
		$p = "";
	$sosp = 5;
	if(!isset($_GET['pg'])){
		$pg = 1;
	}else $pg = $_GET['pg'];
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
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">

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
                <a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span> TRANG CHỦ</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?p=gioithieu">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="?p=lienhe">Liên hệ</a>
                    </li>
                </ul>
				<form class="navbar-form navbar-left" role="search" action="index.php?p=timkiem" method="post">
			        <div class="form-group">
			          <input type="text" class="form-control" placeholder="Nhập thông tin cần tìm" name="txtKey" value="<?php if(isset($_POST['txtKey']) && $_POST['txtKey'] != NULL){ echo $_POST['txtKey']; } ?>">
			        </div>
			        <input type="submit" class="btn btn-default" value="Search" name"search" />
			    </form>
                
			    <ul class="nav navbar-nav pull-right">
                    <li>
                        <a href="giohang/giohang.php"><span class="glyphicon glyphicon-shopping-cart"></span> Giỏ Hàng 
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
		<!-- slider -->
    	<?php require "page/slider.php"; ?>
		<!-- end slide -->
        
        <div class="space20"></div>

		
        <div class="row main-left">
        
        	<!--Menu-->
            <div class="col-md-3 ">
                <ul class="list-group" id="menu">
                    <li href="#" class="list-group-item menu1 active">
                    	<span class="glyphicon glyphicon-align-left"></span> MENU
                    </li>
					<?php
						$loainuochoa = "SELECT * FROM menu";
						$result = mysqli_query($conn, $loainuochoa);
						while($row = mysqli_fetch_assoc($result))
						{
							$idMenu = $row['idMenu'];
					?>
                    <li href="#" class="list-group-item menu1">
                    	<?php echo $row['TenMenu'] ?>
                    </li>
                    <ul>
                    	<?php
							$nhanhieu = "SELECT * FROM nhanhieu WHERE idMenu = ".$idMenu."";
							$result2 = mysqli_query($conn, $nhanhieu);
							while($row2 = mysqli_fetch_assoc($result2))
							{
								?>
								<li class="list-group-item">
									<a href="?p=sptheoloai&idsp=<?php echo $row2['idNhanhieu'] ?>"><?php echo $row2['tenNhanhieu'] ?></a>
								</li>
								<?php 
							} ?>
                    </ul>
                    <?php } ?>
                    <li class="list-group-item menu1"><a href="?p=nuochoamini">NƯỚC HOA MINI</a></li>
                    <li class="list-group-item menu1"><a href="?p=nuochoamoi">NƯỚC HOA MỚI</a></li>
                </ul>
            </div>
			<!--End Menu-->
            
            <div class="col-md-9"> <!-- content -->
	            <?php
					switch ($p){
						case "lienhe" : require "blocks/contact.html"; break;
						case "gioithieu" : require "blocks/about.html"; break;
						case "giohang" : require "#"; break;
						case "sptheoloai"  : require "page/sanpham.php"; break;	
						case "nuochoamoi"  : require "page/sanphammoi.php"; break;	
						case "timkiem"  : require "page/timkiem.php"; break;
						case "admin" : require "page/dangnhapadmin.php"; break;
						default : require "page/tatcasp.php";
					}
				?>
        	</div> <!-- End content -->
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->

    <!-- Footer -->
    <hr>
    <footer>
        <div class="row">
            <div class="col-md-12">
            	<marquee direction="left"><p>Đồ Án Chuyên Ngành | Đinh Nho Thành</p></marquee>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
</body>

</html>
