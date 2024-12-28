<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <!-- Kết nối với Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Đăng Ký Tài Khoản</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="xuly_dangky.php" method="POST">
                    <!-- Tên người dùng -->
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên Người Dùng</label>
                        <input type="text" class="form-control" id="username" name="hoten" required>
                    </div>
                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="tendangnhap" class="form-label">Tên Đăng Nhập</label>
                        <input type="tendangnhap" class="form-control" id="tendangnhap" name="tendangnhap" required>
                    </div>
                    <div class="mb-3">
                        <label for="sdt" class="form-label">Số Điện Thoại</label>
                        <input type="sdt" class="form-control" id="sdt" name="sdt" required>
                    </div>
                    <!-- Mật khẩu -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật Khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <!-- Xác nhận mật khẩu -->
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Xác Nhận Mật Khẩu</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <!-- Nút đăng ký -->
                    <button type="submit" class="btn btn-primary w-100" name="dangky">Đăng Ký</button>
                    <p class="text-center mt-3">
                        Đã có tài khoản? <a href="login.php">Đăng nhập</a>
                    </p>
                </form>
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
