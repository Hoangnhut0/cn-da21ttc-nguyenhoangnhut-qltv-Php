<?php

if (!isset($_SESSION['dangnhap'])) {
    header('Location: login.php');
    exit();
}

$ma_user = $_SESSION['ma_user'];
$sql = "SELECT * FROM user WHERE ma_user = ? LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ma_user);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>
    <style>
        body {
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .profile-card {
            margin-left: 300px;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            height: 300px;
        }
        .profile-card .profile-info {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
            color: white;
            padding: 20px;
            flex: 1;
            text-align: center;
        }
        .profile-card .profile-info img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .profile-card .profile-info h3 {
            margin-bottom: 5px;
        }
        .profile-card .profile-details {
            background-color: #343a40;
            color: #dee2e6;
            padding: 20px;
            flex: 1;
        }
        .profile-card .profile-details h5 {
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 5px;
        }
        .profile-card .profile-details a {
            color: #dee2e6;
            text-decoration: none;
            margin-right: 10px;
        }
        .profile-card .profile-details a:hover {
            color: #ffc107;
        }
    </style>

    <div class="profile-card">
        <div class="profile-info">
            <img src="https://via.placeholder.com/80" alt="Avatar">
            <h3><?php echo htmlspecialchars($user['hoten_user']); ?></h3>
            <!-- Nút thay đổi thông tin cá nhân -->
        <a href="index.php?quanly=suathongtin&mauser=<?php echo htmlspecialchars ($user['ma_user']);?>" class="btn btn-light btn-sm mt-3" title="Chỉnh sửa thông tin">
            <i class="bi bi-pencil-square"></i></a>
        </div>
        <div class="profile-details">
            <h5>Thông tin cá nhân</h5>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
            <p>Số điện thoại: <?php echo htmlspecialchars($user['so_dien_thoai']); ?></p>
            <h5>Địa chỉ</h5>
            <p><?php echo htmlspecialchars($user['dia_chi']); ?></p>
            <div>
                <a href="#" class="bi bi-facebook"></a>
                <a href="#" class="bi bi-twitter"></a>
                <a href="#" class="bi bi-instagram"></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.js"></script>

