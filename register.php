<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <!-- Kết nối với Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #4070f4;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow-sm" style="height: auto; padding: 20px 15px;">
                    <div class="card-header text-center">
                        <h3>Đăng Ký Tài Khoản</h3>
                    </div>
                    <div class="card-body">
                        <form action="xuly_dangky.php" method="POST">
                            <!-- Tên người dùng -->
                            <div class="mb-3">
                                <input type="text" class="form-control" id="username" name="hoten" placeholder="Tên Người Dùng" required>
                            </div>
                            <!-- Email -->
                            <div class="mb-3">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                            </div>
                            <!-- Tên đăng nhập -->
                            <div class="mb-3">
                                <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Tên Đăng Nhập" required>
                            </div>
                            <!-- Số điện thoại -->
                            <div class="mb-3">
                                <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Số Điện Thoại" required>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control"  name="diachi" placeholder="Địa Chỉ" required>
                            </div>
                            
                            <!-- Mật khẩu và Xác nhận mật khẩu -->
                            <div class="row g-2 mb-3">
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mật Khẩu" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Xác Nhận Mật Khẩu" required>
                                </div>
                            </div>
                            <!-- Nút đăng ký -->
                            <button type="submit" class="btn btn-primary w-100" name="dangky">Đăng Ký</button>
                            <p class="text-center mt-3">
                                Đã có tài khoản? <a href="loginuser.php" class="text-decoration-none">Đăng nhập</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kết nối với JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <script>
        // Kiểm tra mật khẩu xác nhận khớp với mật khẩu
        const form = document.querySelector('form');
        form.addEventListener('submit', function(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;

            if (password !== confirmPassword) {
                event.preventDefault();  // Ngừng việc gửi form
                alert('Mật khẩu xác nhận không khớp!');
            }
        });
    </script>
</body>

</html>
