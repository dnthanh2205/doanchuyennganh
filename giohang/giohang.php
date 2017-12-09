<?php 
	require("../lib/dbCon.php");
?>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="cssgiohang.css">
<h2 class="text-center">Giỏ Hàng</h2><hr>
<div class="container"> 
 <table id="cart" class="table table-hover table-condensed"> 
  <thead> 
   <tr > 
    <th style="width:50%">Tên sản phẩm</th> 
    <th style="width:10%">Giá</th> 
    <th style="width:8%">Số lượng</th> 
    <th style="width:22%" class="text-center">Thành tiền</th> 
    <th style="width:10%"> </th> 
   </tr> 
  </thead> 
  <tbody>
  <?php
  	session_start();
	/*echo "<pre>";
	print_r($_SESSION['cart']);
	echo "</pre>";*/
	$total = 0;
	if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $value){
  ?>
  <tr>
  
   <td data-th="Product"> 
    <div class="row"> 
     <div class="col-sm-2 hidden-xs"><img src="../image/<?php echo "$value[hinhanh]"; ?>" alt="Sản phẩm 1" class="img-responsive" width="100">
     </div> 
     <div class="col-sm-10"> 
      <h4 class="nomargin"><b><?php echo "$value[tenNuochoa]"; ?></b></h4> 
      <p><?php echo substr($value['thongtinnuochoa'],0,125)."..."; ?></p> 
     </div> 
    </div> 
    </td> 
    <td data-th="Price"><?php echo number_format($value['gia']); ?> đ</td> 
    <td data-th="Quantity" style="text-align:center"><?php echo "$value[quantity]"; ?></td> 
    <td data-th="Subtotal" class="text-center"><?php echo number_format($value['gia']*$value['quantity']); ?> đ</td> 
    <td data-th="Subtotal" class="text-center"><a href="delete.php?id=<?php echo "$value[idNuochoa]" ?>">Delete</a></td>
  </tr> 
  <?php 
	  
  	$total += $value['gia']*$value['quantity'] ?>
  <?php } } ?>
  </tbody><tfoot> 
   
   <tr> 
    <td><a href="../index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a>
    </td> 
    <td colspan="2" class="hidden-xs"> </td> 
    <td class="hidden-xs text-center">
        <strong>
        	<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
				
			?>
            <b>Tổng cộng: </b><?php echo number_format($total); ?> đ
            <?php }else{
				echo "";	
			}?>  
        </strong>
    </td> 
    <td>
	  <?php
       
        if(!isset($_SESSION['cart']) or empty($_SESSION['cart'])){
            echo("<b>Your Cart is empty !!!<b/>");
        }else{
          require("thanhtoann.php");
        }
      
      ?>
    </td> 
   </tr> 
  </tfoot> 
 </table>
</div><hr />
<div class="container"> 

</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>