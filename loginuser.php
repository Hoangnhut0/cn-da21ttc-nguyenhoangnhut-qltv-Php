<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./loginform/css/style.css">
  </head>
  <?php
		// Đoạn mã này nằm trong file đăng nhập (login.php)
session_start();
include('./config/connect.php'); // Kết nối cơ sở dữ liệu

if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['matkhau']);

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM user WHERE taikhoan=? AND password=? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $taikhoan, $matkhau);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['ma_user'] = $user['ma_user']; // Lưu ma_nguoi_dung vào session
        $_SESSION['dangnhap'] = $taikhoan; // Lưu tên đăng nhập vào session
        header("Location: index.php?quanly=gio");
        exit();
    } else {
        echo '<p style="text-align: center; color: red;">Sai tài khoản hoặc mật khẩu!</p>';
    }
}
  ?>
  <body class="img js-fullheight" style="background-image: url(./loginform/images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form method="POST" class="signin-form">
		      		<div class="form-group">
		      			<input type="text" class="form-control" placeholder="Username" name="taikhoan" required>
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="matkhau" placeholder="Password" required>
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3" name="dangnhap">Sign In</button>
	            </div>
	            <div class="form-group">
	            	<a href="register.php" class="form-control btn btn-secondary px-3" style="text-align: center; text-decoration: none; color: white;">Register</a>
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#" style="color: #fff">Forgot Password</a>
								</div>	
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
	          	<a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="./loginform/js/jquery.min.js"></script>
  <script src="./loginform/js/popper.js"></script>
  <script src="./loginform/js/bootstrap.min.js"></script>
  <script src="./loginform/js/main.js"></script>

  </body>
</html>
