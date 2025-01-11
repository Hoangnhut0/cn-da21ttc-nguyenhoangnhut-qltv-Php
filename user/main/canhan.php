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
    .profile-card {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s ease-in-out;
    }

    .profile-card:hover {
        transform: translateY(-10px);
    }

    .profile-header {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
        color: white;
        text-align: center;
        padding: 40px 20px;
        position: relative;
    }

    .profile-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 5px solid white;
        margin-top: -30px;
    }

    .profile-header h3 {
        margin-top: 15px;
    }

    .profile-body {
        padding: 20px 30px;
    }

    .profile-body h5 {
        color: #6a11cb;
        margin-bottom: 15px;
        font-weight: bold;
        border-bottom: 2px solid #ddd;
        padding-bottom: 5px;
    }

    .profile-body p {
        margin: 5px 0;
        color: #495057;
    }

    .social-links a {
        margin-right: 10px;
        color: #6c757d;
        font-size: 20px;
        transition: color 0.3s ease;
    }

    .social-links a:hover {
        color: #2575fc;
    }

    .edit-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: white;
        color: #2575fc;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
        transition: background 0.3s ease;
        text-decoration: none;
    }

    .edit-btn:hover {
        background: #2575fc;
        color: white;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-8">
            <div class="profile-card">
                <!-- Header -->
                <div class="profile-header">
                    <a href="index.php?quanly=suathongtin&mauser=<?php echo htmlspecialchars($user['ma_user']); ?>" class="edit-btn">
                        <i class="bi bi-pencil-square"></i> Chỉnh sửa
                    </a>
                    <img src="https://via.placeholder.com/120" alt="Avatar">
                    <h3><?php echo htmlspecialchars($user['hoten_user']); ?></h3>
                </div>

                <!-- Body -->
                <div class="profile-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <h5>Thông tin cá nhân</h5>
                            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                            <p><strong>Số điện thoại:</strong> <?php echo htmlspecialchars($user['so_dien_thoai']); ?></p>
                        </div>
                        <div class="col-md-6 mb-4">
                            <h5>Địa chỉ</h5>
                            <p><?php echo htmlspecialchars($user['dia_chi']); ?></p>
                        </div>
                        <div class="col-12">
                            <h5>Mạng xã hội</h5>
                            <div class="social-links">
                                <a href="#" class="bi bi-facebook" title="Facebook"></a>
                                <a href="#" class="bi bi-twitter" title="Twitter"></a>
                                <a href="#" class="bi bi-instagram" title="Instagram"></a>
                                <a href="#" class="bi bi-linkedin" title="LinkedIn"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.js"></script>
