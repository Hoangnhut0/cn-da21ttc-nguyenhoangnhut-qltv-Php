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
            font-family: Arial, sans-serif;
        }
        .profile-card {
            margin-left: 250px;
            display: flex;
            flex-wrap: wrap;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            background-color: white;
            transition: transform 0.3s;
        }
        .profile-card:hover {
            transform: translateY(-10px);
        }
        .profile-card .profile-info {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            flex: 1;
            text-align: center;
            padding: 30px 20px;
        }
        .profile-card .profile-info img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            border: 3px solid white;
        }
        .profile-card .profile-info h3 {
            margin-bottom: 10px;
        }
        .profile-card .profile-details {
            padding: 30px;
            flex: 2;
            background-color: #f8f9fa;
            color: #495057;
        }
        .profile-card .profile-details h5 {
            margin-bottom: 15px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .profile-card .profile-details p {
            margin: 5px 0;
            font-size: 14px;
        }
        .profile-card .profile-details .social-links {
            margin-top: 20px;
        }
        .profile-card .profile-details .social-links a {
            font-size: 20px;
            margin-right: 10px;
            color: #6c757d;
            transition: color 0.3s;
        }
        .profile-card .profile-details .social-links a:hover {
            color: #007bff;
        }
        .profile-card .edit-btn {
            display: inline-block;
            margin-top: 15px;
            color: #fff;
            background-color: #007bff;
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s;
        }
        .profile-card .edit-btn:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="profile-card">
        <div class="profile-info">
            <img src="https://via.placeholder.com/100" alt="Avatar">
            <h3><?php echo htmlspecialchars($user['hoten_user']); ?></h3>
            <a href="index.php?quanly=suathongtin&mauser=<?php echo htmlspecialchars ($user['ma_user']);?>" class="edit-btn" title="Chỉnh sửa thông tin">
                <i class="bi bi-pencil-square"></i> Chỉnh sửa thông tin
            </a>
        </div>
        <div class="profile-details">
            <h5>Thông tin cá nhân</h5>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($user['so_dien_thoai']); ?></p>
            <h5>Địa chỉ</h5>
            <p><?php echo htmlspecialchars($user['dia_chi']); ?></p>
            <div class="social-links">
                <a href="#" class="bi bi-facebook" title="Facebook"></a>
                <a href="#" class="bi bi-twitter" title="Twitter"></a>
                <a href="#" class="bi bi-instagram" title="Instagram"></a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.js"></script>
