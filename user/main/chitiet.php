<?php
// Câu lệnh SQL lấy chi tiết sách
$sql_chitiet = "SELECT * FROM sach 
                JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                JOIN nha_xuat_ban ON sach.ma_nha_xuat_ban = nha_xuat_ban.ma_nha_xuat_ban
                WHERE ma_sach = ?";
$stmt = $conn->prepare($sql_chitiet);
$stmt->bind_param('i', $_GET['id']); // Sử dụng prepared statements để bảo mật
$stmt->execute();
$query_chitiet = $stmt->get_result();
?>

<div class="container my-5">
    <!-- Hiển thị thông báo -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success text-center" role="alert">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <div class="card shadow-lg border-0">
        <div class="row g-0">
            <?php while ($row = $query_chitiet->fetch_assoc()): ?>
                <!-- Hình ảnh sách -->
                <div class="col-md-5 d-flex justify-content-center align-items-center bg-light">
                    <img class="img-fluid rounded shadow" 
                         src="admin/modules/qlsach/img/<?php echo htmlspecialchars($row['hinh_anh']); ?>" 
                         alt="Book cover" style="max-height: 400px; object-fit: contain;">
                </div>

                <!-- Thông tin sách -->
                <div class="col-md-7">
                    <div class="card-body">
                        <p class="small text-muted mb-2">Thể loại: <span class="fw-bold"><?php echo htmlspecialchars($row['ten_the_loai']); ?></span></p>
                        <h1 class="display-6 fw-bold  mb-3"><?php echo htmlspecialchars($row['ten_sach']); ?></h1>
                        <p class="fs-5 mb-3">
                            <span class="text-muted">Tác Giả:</span> 
                            <span class="fw-semibold text-dark"><?php echo htmlspecialchars($row['ten_tac_gia']); ?></span>
                        </p>
                        <p class="fs-5 mb-3">
                            <span class="text-muted">Nhà Xuất Bản:</span> 
                            <span class="text-dark"><?php echo htmlspecialchars($row['ten_nha_xuat_ban']); ?></span>
                        </p>

                        <!-- Mô tả sách -->
                        <div class="mb-3">
                            <p id="mota" class="lead text-muted" style="max-height: 80px; overflow: hidden; transition: max-height 0.5s;">
                                <?php echo nl2br(htmlspecialchars($row['mo_ta'])); ?>
                            </p>
                            <button type="button" onclick="toggleMota()" id="xemThemBtn" 
                                    class="btn btn-link text-primary p-0" style="text-decoration: none;">
                                Xem thêm
                            </button>
                        </div>

                        <!-- Nút Thêm vào giỏ -->
                        <form action="user/main/xulygio.php?idsach=<?php echo $row['ma_sach']; ?>" method="POST">
                            <button class="btn btn-primary btn-lg px-4" type="submit" name="themgio">
                                <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                            </button>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>

<!-- Script cho Xem thêm -->
<script>
    function toggleMota() {
        var mota = document.getElementById("mota");
        var btn = document.getElementById("xemThemBtn");

        if (mota.style.maxHeight === "80px") {
            mota.style.maxHeight = "none";
            btn.innerText = "Thu gọn";
        } else {
            mota.style.maxHeight = "80px";
            btn.innerText = "Xem thêm";
        }
    }
</script>
