<?php 
	$idsp = $_GET['idsp'];
	settype($idsp,"int");
	
?>

<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#EF4343; color:white;">
        <h4><b><?php 
					$nhanhieu = "SELECT * FROM nhanhieu WHERE idNhanhieu = '".$_GET['idsp']."'";
					$result = mysqli_query($conn, $nhanhieu);
					$row = mysqli_fetch_assoc($result);
					echo $row['tenNhanhieu']
				?>
        </b></h4>
    </div>

  	<div class="panel-body">
  		<!-- item -->
		<?php
		  if(isset($_GET['page'])){
		  $get_page = $_GET['page'];
		  }else{
			$get_page='';
		  }
		  $nuochoa = "SELECT * FROM nuochoa WHERE idNhanhieu = '".$_GET['idsp']."' LIMIT 0,5";
		  $result = mysqli_query($conn, $nuochoa);
		  $sosptheoloai = mysqli_num_rows($result);
		  $sotrang = ceil($sosptheoloai / $sosp);
		  if(mysqli_num_rows($result)>0){
			  $data = array();
		  while($row = mysqli_fetch_assoc($result)){
        ?>
      	<div class="row-item row" style="margin-top:10px;">
          <div class="col-md-8 border-right">
              <div class="col-md-5">
                      <img class="img-responsive" src="image/<?php echo $row['hinhanh'] ?>" alt=""> <!-- image -->
              </div>
      
              <div class="col-md-7">
                  <h3><?php echo $row['tenNuochoa'] ?></h3> <!-- ten nuoc hoa -->
                  <p><?php echo substr($row['thongtinnuochoa'],0,150)."..."; ?></p> <!-- thong tin -->
                  <p><b>Giá: </b><?php echo number_format($row['gia']);?> đ</p>
              </div>
      
          </div>
          <div class="col-md-3">
          		
          		<a class="btn btn-primary" href="page/detail.php?p=<?php echo $row['idNhanhieu'] ?>&id=<?php echo $row['idNuochoa'] ?>">Chi tiết <span class="glyphicon glyphicon-chevron-right"></span></a><hr />
                <a class="btn btn-primary" href="giohang/insert.php?id=<?php echo $row['idNuochoa'] ?>"><span class="glyphicon glyphicon-shopping-cart"></span> Chọn Mua</a><hr />
          </div>
              <div class="break"></div>
        </div>
        
        <?php $data[] = $row; } } ?>
    	<!-- end item -->
	 		<!-- Pagination -->
            <div class="row text-center">
              <div class="col-lg-12">
                  <ul class="pagination">
                      <li>
                          <a href="#">&laquo;</a>
                      </li>
                      <?php 
						for($i = 1; $i <= $sotrang; $i++){
						?>
                      <li >
                          <a href="?p=sptheoloai&idsp=<?php echo $row2['idNhanhieu'] ?>?pg=<?php echo "$i" ?>"><?php echo "$i" ?></a>
                      </li>
                      <?php } ?>
                      <li>
                          <a href="#">&raquo;</a>
                      </li>
                  </ul>
              </div>
    		</div>
    	</div>
    </div>
   
    <!-- /.row -->
</div>
