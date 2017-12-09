<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#EF4343; color:white;">
        <h4><b>Tìm kiếm</b></h4>
    </div>

  	<div class="panel-body">
  		<!-- item -->
		<?php
		
			$search = addslashes($_POST['txtKey']);
			
			if (empty($search)) {
				echo "Vui lòng nhập thông tin cần tìm kiếm!!";
			} 
			else
			{
				$timkiem = "SELECT * FROM nuochoa WHERE tenNuochoa LIKE '%$search%'";
				$result = mysqli_query($conn,$timkiem) or die(mysqli_error($conn));	
				$num = mysqli_num_rows($result);	
				if($num > 0){
					echo "Tìm thấy <b>$num</b> kết quả cho từ khóa <b>".$_POST['txtKey']."</b><hr/>";
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
		  <?php } 
              } else{ echo "Không tìm thấy kết quả cho từ khóa <b>".$_POST['txtKey']."</b> "; }
          	} 
           ?>
    	<!-- end item -->

    	</div>
    </div>
   
    <!-- /.row -->
</div>
