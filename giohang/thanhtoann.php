
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
/* Full-width input fields */
input[type=text], {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>




<div class="col-xs-12 col-md-12" align="right">

	<button class="btn" onclick="document.getElementById('id01').style.display='block'" style="width:auto; color:#FFF" style="border-radius:5px">Thanh toán</button>

    <div id="id01" class="modal" align="center">
      <div class="col-xs-12 col-md-12">
          <form class="modal-content animate" action="" method="post" style="height:60%;width:60%">
            
                <div class="container" style="width:90%" align="left">
                  <h3 align="center">THÔNG TIN KHÁCH HÀNG</h3>
                    <b>Tên (*)</b>
                    <input class="form-control" type="text" placeholder="Họ Tên" name="txtHoten" required>
                    <label><b>SĐT (*)</b></label>
                    <input class="form-control" type="text" placeholder="Số điện thoại" name="txtSDT" required>
                    <label><b>Địa chỉ (*)</b></label>
                    <input class="form-control" type="text" placeholder="Địa chỉ nhận hàng" name="txtDiachi" required><br />
                  <div style="width:15%; margin:auto"> 
                    <button class="btn btn-success" type="submit" name="btnSubmit" value="login">Đặt hàng</button>
                  </div>
                </div>
                <div style="width:15%; margin:auto">
                  <button  type="button" onclick="document.getElementById('id01').style.display='none'" class="btn cancelbtn">Cancel</button>
                </div>
          </form>
        </div>
    </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

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
		} echo("Đặt hàng thành công!");

		session_destroy();
	 }
?>

</body>
</html>