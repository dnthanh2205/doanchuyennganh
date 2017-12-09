<div class="panel panel-default">
    <div class="panel-heading" style="background-color:#EF4343; color:white;">
        <h4><b>Nước Hoa Mới</b></h4>
    </div>

  	<div class="panel-body">
  		<!-- item -->
		<?php
		  if(isset($_GET['page'])){
		  $get_page = $_GET['page'];
		  }else{
			$get_page='';
			}
		  $from = ($pg - 1) * $sosp ;
		  $nuochoa = "SELECT * FROM nuochoa ORDER BY idNuochoa DESC LIMIT $from, $sosp";
		  $result = mysqli_query($conn, $nuochoa);
		  $sospmoi = mysqli_num_rows($result);
		  if($sospmoi > 0){
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
                          <a href="
                          <?php
                          	if(!isset($_GET['pg']))
								echo 'index.php?p=nuochoamoi?pg=1';
							else if($_GET['pg']==1)
								echo 'index.php?p=nuochoamoi?pg=1';
							else echo "index.php?p=nuochoamoi?pg=".$_GET['pg']-=1;
						  ?>
                          ">&laquo;</a>
                      </li>
                      <?php
					  	$qr="SELECT * FROM nuochoa ORDER BY idNuochoa DESC";
						$result2 = mysqli_query($conn, $qr);
					  	$sospmoi = mysqli_num_rows($result2);
		  				$sotrang = ceil($sospmoi / $sosp);
						for($i = 1; $i <= $sotrang; $i++){
						?>
                      <li >
                          <a href="index.php?p=nuochoamoi?pg=<?php echo "$i" ?>"><?php echo "$i" ?></a>
                      </li>
                      <?php } ?>
                      <li>
                          <a href="
                           <?php 
						  if(!isset($_GET['pg']))
						  	echo 'index.php?p=nuochoamoi?pg=2';
						  else 
						  	echo "index.php?p=nuochoamoi?pg=".$_GET['pg']+=1; 
						  ?>
                          ">&raquo;</a>
                      </li>
                  </ul>
              </div>
    		</div><!-- End Pagination -->
    	</div>
    </div>
   
    <!-- /.row -->
</div>
