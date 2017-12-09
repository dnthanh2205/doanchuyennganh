<div class="row carousel-holder">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Đăng nhập</b></div>
            <div class="panel-body">
                <form action="" method="post">
                    <div>
                        <label>Tài Khoản</label>
                        <input type="text" class="form-control" placeholder="Tài khoản" name="username">
                    </div>
                    <br>	
                    <div>
                        <label>Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <br>
                    <input type="submit" class="btn btn-success" name="btn_Submit" value="Đăng nhập" />
                </form>
            </div>
        </div>
    </div>
</div>
<?php
	if (isset($_POST["btn_Submit"])) {
		//Lấy thông tin
		$username = $_POST["username"];
		$password = $_POST["password"];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$username = strip_tags($username);
		$username = addslashes($username);
		$password = strip_tags($password);
		$password = addslashes($password);
		//Bắt đầu kiểm tra
		if ($username == "" || $password =="") {
			echo '<span style="color:red">Vui lòng điền đầy đủ thông tin!</span>';
		}else{
			$sql = "SELECT * FROM user WHERE Username = '$username' AND Password = '$password' ";
			$query = mysqli_query($conn,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo '<span style="color:red">Tên đăng nhập hoặc mật khẩu không đúng !</span>';
			}else{
				$_SESSION['username'] = $username;
				echo "Xin chào <b>".$username."</b>. Bạn đã đăng nhập thành công. <b><a href='admin_php/index.php'>Đến trang quản lý</a></b>";
				die();
			}
		}
	}
?>