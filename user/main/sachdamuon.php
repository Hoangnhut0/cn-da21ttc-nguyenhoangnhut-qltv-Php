<?php
$ma_nguoi_dung = $_SESSION['ma_user']; // Lấy mã người dùng từ session

// Truy vấn danh sách sách đã đặt
$sql_select = "SELECT dat_sach.*, sach.ten_sach, sach.hinh_anh, dat_sach_chi_tiet.code_cart, dat_sach.ngay_dat, phieu_muon.ngay_tra
    FROM dat_sach
    JOIN dat_sach_chi_tiet ON dat_sach.code_cart = dat_sach_chi_tiet.code_cart
    JOIN sach ON dat_sach_chi_tiet.ma_sach = sach.ma_sach
    LEFT JOIN phieu_muon ON phieu_muon.code_cart = dat_sach.code_cart AND phieu_muon.ma_user = dat_sach.ma_user
    WHERE dat_sach.ma_user = $ma_nguoi_dung"; 
$query = mysqli_query($conn, $sql_select);
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Danh Sách Đăng Ký Mượn</h2>
    <div class="row gy-4">
        <?php
        if ($query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                // Lấy ngày trả và kiểm tra trạng thái
                $ngay_tra = ($row['trang_thai'] == 'da_duyet' && !empty($row['ngay_tra'])) ? date("d/m/Y", strtotime($row['ngay_tra'])) : 'Chưa duyệt';

                // Kiểm tra nếu đã quá hạn trả
                $is_qua_han = false;
                if ($row['trang_thai'] == 'da_duyet' && !empty($row['ngay_tra'])) {
                    $current_date = new DateTime();
                    $return_date = new DateTime($row['ngay_tra']);
                    if ($current_date > $return_date) {
                        $is_qua_han = true;
                    }
                }
        ?>
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 h-100">
                <img src="admin/modules/qlsach/img/<?php echo htmlspecialchars($row['hinh_anh']); ?>" class="card-img-top rounded-top" alt="Book Image" style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-truncate" title="<?php echo htmlspecialchars($row['ten_sach']); ?>">
                        <?php echo htmlspecialchars($row['ten_sach']); ?>
                    </h5>
                    <p class="card-text">
                        <strong>Ngày đặt:</strong> <?php echo date("d/m/Y", strtotime($row['ngay_dat'])); ?><br>
                        <strong>Ngày trả:</strong> <?php echo $ngay_tra; ?>
                        <?php if ($is_qua_han) {
                            echo '<br><span class="text-danger">Quá hạn trả</span>';
                        } ?>
                    </p>
                    <div class="mt-auto">
                        <span class="badge px-3 py-2 fs-6 
                            <?php 
                                if ($row['trang_thai'] == 'da_duyet') {
                                    echo 'bg-success';
                                } elseif ($row['trang_thai'] == 'cho_duyet') {
                                    echo 'bg-warning text-dark';
                                } else {
                                    echo 'bg-danger';
                                }
                            ?>">
                            <?php 
                                if ($row['trang_thai'] == 'da_duyet') {
                                    echo 'Đã duyệt';
                                } elseif ($row['trang_thai'] == 'cho_duyet') {
                                    echo 'Chưa duyệt';
                                } else {
                                    echo 'Đã bị hủy';
                                }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            }
        } else {
            echo '<div class="col-12 text-center"><p class="text-muted">Bạn chưa mượn sách nào.</p></div>';
        }
        ?>
    </div>
</div>
