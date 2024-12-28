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
    <!-- Hiển thị thông báo nếu có -->
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info text-center" role="alert">
            <?php echo $_SESSION['message']; unset($_SESSION['message']); ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <?php while ($row = $query_chitiet->fetch_assoc()): ?>
            <!-- Hình ảnh sách -->
            <div class="col-md-6 d-flex justify-content-center align-items-center mb-4">
                <img class="img-fluid rounded" 
                     src="admin/modules/qlsach/img/<?php echo htmlspecialchars($row['hinh_anh']); ?>" 
                     alt="Book cover" style="max-width: 300px;">
            </div>

            <!-- Thông tin chi tiết sách -->
            <div class="col-md-6">
                <form action="user/main/xulygio.php?idsach=<?php echo $row['ma_sach'];?>" method="POST">
                    <div class="small text-muted mb-1">Thể loại: <?php echo htmlspecialchars($row['ten_the_loai']); ?></div>
                    <h1 class="display-5 fw-bold"><?php echo htmlspecialchars($row['ten_sach']); ?></h1>
                    <p class="fs-5 mb-2">Tác Giả: <span class="fw-semibold"><?php echo htmlspecialchars($row['ten_tac_gia']); ?></span></p>
                    
                    <!-- Mô tả sách -->
                    <div class="lead">
                        <div id="mota" style="max-height: 60px; overflow: hidden; transition: max-height 0.5s;">
                            <?php echo nl2br(htmlspecialchars($row['mo_ta'])); ?>
                        </div>
                        <button type="button" onclick="toggleMota()" id="xemThemBtn" 
                                class="btn btn-link p-0 mt-2" style="text-decoration: underline; color: blue;">
                            Xem thêm
                        </button>
                    </div>

                    <div class="d-flex mt-4">
                        <button class="btn btn-outline-dark " type="submit" name="themgio">
                            Thêm vào giỏ
                        </button>
                    </div>
                </form>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script>
    function toggleMota() {
        var mota = document.getElementById("mota");
        var btn = document.getElementById("xemThemBtn");

        if (mota.style.maxHeight === "60px") {
            mota.style.maxHeight = "none";  // Hiển thị toàn bộ mô tả
            btn.innerText = "Thu gọn";
        } else {
            mota.style.maxHeight = "60px";  // Giới hạn độ cao
            btn.innerText = "Xem thêm";
        }
    }
</script>
