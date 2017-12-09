<form name="dangky" method="post" action="">
  <table width="400" border="0">
      <tr>
        <td colspan="2" align="center"><h2>THÔNG TIN KHÁCH HÀNG </h2></td>
    </tr>
      <tr>
        <td>Tên (*)</td>
        <td><label for="txtHoten"></label>
        <input type="text" class="form-control" name="txtHoten" id="txtHoten" /></td>
    </tr>
      <tr>
        <td>Số điện thoại (*) </td>
        <td><label for="txtSDT"></label>
        <input type="text" class="form-control" name="txtSDT" id="txtSDT" /></td>
    </tr>
      <tr>
        <td>Địa chỉ (*) </td>
        <td><label for="txtDiachi"></label>
        <input type="text" class="form-control" name="txtDiachi" id="txtDiachi" /></td> <br />
    </tr>
      <tr style="text-decoration:none">
        <td colspan="2" align="center"><br />
        <input type="submit" class="btn btn-success" name="btnSubmit" id="btnSubmit" value="Đặt Hàng" /> 
        </td>
     </tr>
  </table>
</form>
<?php 
	  if (isset($_POST["btnSubmit"])) {
		  //lấy thông tin từ các form bằng phương thức POST
		  $hoten = mysqli_real_escape_string($conn, $_POST["txtHoten"]);
		  $sdt = mysqli_real_escape_string($conn, $_POST["txtSDT"]);
		  $diachi = mysqli_real_escape_string($conn, $_POST["txtDiachi"]);
		  
		  if ($hoten == "" || $sdt == "" ||$diachi ==""){
			  echo "Bạn vui lòng nhập đầy đủ thông tin!";
		  }else{
			$sql="INSERT INTO giohang(
				tenKhach,
				diachi,
				sdt,
				tonggia) VALUES(
				'$hoten',
				'$diachi',
				'$sdt',
				'$total'
			)"; 
			mysqli_query($conn,$sql);
			$last_id = mysqli_insert_id($conn);
			foreach($_SESSION['cart'] as $key => $value){
				$idNuochoa=$value['idNuochoa'];
				$tenNuochoa=$value['tenNuochoa'];
				$gia=$value['gia'];
				$soluong=$value['quantity'];
				$thanhtien=$value['gia']*$value['quantity'];
				$sqlchitiet = "INSERT INTO chitietgiohang(
					  idHoadon,
					  idNuochoa,
					  tenNuochoa,
					  gia,
					  soluong,
					  thanhtien) VALUES(
					  '$last_id',
					  '$idNuochoa',
					  '$tenNuochoa',
					  '$gia',
					  '$soluong',
					  '$thanhtien'
				)";
				mysqli_query($conn,$sqlchitiet);
			}
		} echo("Đặt hàng thành công! Cảm ơn bạn đã tin tưởng NuocHoaHangHieu !!");

		session_destroy();
	 }
?>