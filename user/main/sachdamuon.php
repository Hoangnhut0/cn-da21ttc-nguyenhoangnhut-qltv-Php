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
    <h2 class="text-center mb-4">Danh Sách Sách Đã Đặt</h2>
    <table class="table table-striped table-hover table-bordered">
        <thead class="table-dark">
            <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">Duyệt</th>
            </tr>
        </thead>
        <tbody>
        <?php
            if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    // Kiểm tra trạng thái để hiển thị ngày trả
                    $ngay_tra = $row['trang_thai'] == 'da_duyet' ? date("d/m/Y", strtotime($row['ngay_tra'])) : 'Chưa duyệt';
            ?>
                <tr>
                    <td>
                        <img src="admin/modules/qlsach/img/<?php echo htmlspecialchars($row['hinh_anh']); ?>" alt="Book Image" class="img-fluid" style="width: 80px; height: auto;">
                    </td>
                    <td><?php echo htmlspecialchars($row['ten_sach']); ?></td>
                    <td><?php echo date("d/m/Y", strtotime($row['ngay_dat'])); ?></td>
                    <td><?php echo $ngay_tra; ?></td>
                    <td>
                        <?php 
                            // Kiểm tra trạng thái của đơn hàng
                            if ($row['trang_thai'] == "da_duyet") {
                                echo '<span class="badge bg-success">Đã duyệt</span>';
                            } elseif ($row['trang_thai'] == "cho_duyet") {
                                echo '<span class="badge bg-warning text-dark">Chưa duyệt</span>';
                            } else {
                                echo '<span class="badge bg-danger">Đã bị hủy</span>';
                            }
                        ?>
                    </td>
                </tr>
            <?php 
                }
            } else {
                echo '<tr><td colspan="4" class="text-center">Bạn chưa mượn sách nào.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
