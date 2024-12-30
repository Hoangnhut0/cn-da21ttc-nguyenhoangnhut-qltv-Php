<?php

if (!isset($_SESSION['ma_user'])) {
    header('Location: login.php');
    exit();
}

$ma_user = $_SESSION['ma_user'];

// Xử lý khi form được submit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoten_user = $_POST['hoten_user'];
    $email = $_POST['email'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $dia_chi = $_POST['dia_chi'];

    $update_sql = "UPDATE user SET hoten_user = ?, email = ?, so_dien_thoai = ?, dia_chi = ? WHERE ma_user = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssss", $hoten_user, $email, $so_dien_thoai, $dia_chi, $ma_user);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success text-center">Cập nhật thông tin thành công!</div>';
        // Cập nhật lại thông tin để hiển thị
        $sql = "SELECT * FROM user WHERE ma_user = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $ma_user);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    } else {
        echo '<div class="alert alert-danger text-center">Đã xảy ra lỗi. Vui lòng thử lại.</div>';
    }
}

// Lấy thông tin người dùng hiện tại
$sql = "SELECT * FROM user WHERE ma_user = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma_user);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header text-center" style="background-color: #f8f9fa; color: #343a40;">
                    <h4>Chỉnh sửa thông tin cá nhân</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <!-- Họ tên -->
                        <div class="mb-3">
                            <label for="hoten_user" class="form-label">Họ và tên</label>
                            <input type="text" class="form-control" id="hoten_user" name="hoten_user" value="<?php echo htmlspecialchars($user['hoten_user']); ?>" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                        </div>

                        <!-- Số điện thoại -->
                        <div class="mb-3">
                            <label for="so_dien_thoai" class="form-label">Số điện thoại</label>
                            <input type="text" class="form-control" id="so_dien_thoai" name="so_dien_thoai" value="<?php echo htmlspecialchars($user['so_dien_thoai']); ?>" required>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="mb-3">
                            <label for="dia_chi" class="form-label">Địa chỉ</label>
                            <textarea class="form-control" id="dia_chi" name="dia_chi" rows="3" required><?php echo htmlspecialchars($user['dia_chi']); ?></textarea>
                        </div>

                        <!-- Nút lưu thông tin -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark">Lưu thông tin</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center" style="background-color: #f8f9fa;">
                    <a href="javascript:history.back()" class="btn btn-light">Quay lại</a>  
                </div>
            </div>
        </div>
    </div>
</div>
