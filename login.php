<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - SB Admin</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<?php
session_start();
include('./config/connect.php'); // Kết nối cơ sở dữ liệu

if (isset($_POST['dangnhap'])) {
    $taikhoan = $_POST['taikhoan'];
    $matkhau = md5($_POST['matkhau']);

    // Truy vấn để lấy thông tin người dùng
    $sql = "SELECT * FROM nguoi_dung WHERE ten_dang_nhap='$taikhoan' AND mat_khau='$matkhau' LIMIT 1";
    $row = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($row);

    if ($count > 0) {
        $user = mysqli_fetch_assoc($row); // Lấy thông tin người dùng
        $_SESSION['dangnhap'] = $taikhoan; // Lưu thông tin đăng nhập vào session
        $_SESSION['vai_tro'] = $user['vai_tro']; // Lưu vai trò người dùng vào session

        // Chuyển hướng theo vai trò
        switch ($user['vai_tro']) {
            case 'admin':
                header("Location: admin/index.php");
                break;
            case 'nhan_vien':
                header("Location: nhanvien/index.php");
                break;
            default:
                echo '<p style="text-align: center; color: red;"> Vai trò không hợp lệ! </p>';
        }
        exit();
    } else {
        echo '<p style="text-align: center; color: red;">Sai tài khoản hoặc mật khẩu!</p>';
    }
}
?>
<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="text" name="taikhoan" placeholder="Tài khoản" required />
                                            <label for="inputEmail">Tài khoản</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPassword" type="password" name="matkhau" placeholder="Mật khẩu" required />
                                            <label for="inputPassword">Mật khẩu</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" name="remember" />
                                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.html">Quên mật khẩu?</a>
                                            <button class="btn btn-primary" type="submit" name="dangnhap">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.php">Cần tài khoản? Đăng ký!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
