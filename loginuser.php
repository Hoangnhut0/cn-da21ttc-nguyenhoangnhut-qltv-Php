<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> login </title>
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="css/loginform.css">
  <!-- Boxicons CSS -->
  <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
		<body>
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
  <section class="container forms">
    <div class="form login">
      <div class="form-content">
        <header>Login</header>
        <form action="loginuser.php" method="POST">
          <div class="field input-field">
            <input  name="taikhoan" placeholder="User name" class="input">
          </div>
          <div class="field input-field">
            <input type="password" name="matkhau" placeholder="Password" class="password">
            <i class='bx bx-hide eye-icon'></i>
          </div>
          <div class="form-link">
            <a href="#" class="forgot-pass">Forgot password?</a>
          </div>
          <div class="field button-field">
            <button type="submit" name="dangnhap">Login</button>
          </div>
        </form>
        <div class="form-link">
          <span>Don't have an account? <a href="register.php" class="link signup-link">Signup</a></span>
        </div>
      </div>
      <div class="line"></div>
      <div class="media-options">
        <a href="#" class="field facebook">
          <i class='bx bxl-facebook facebook-icon'></i>
          <span>Login with Facebook</span>
        </a>
      </div>
      <div class="media-options">
        <a href="#" class="field google">
		<i class="fab fa-google"></i>


          <span>Login with Google</span>
        </a>
      </div>
    </div>
   
  </section>
  <!-- JavaScript -->
  <script src="js/script.js"></script>
</body>
</html>
