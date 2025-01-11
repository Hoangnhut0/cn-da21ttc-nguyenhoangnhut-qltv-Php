<?php
$sql = "SELECT phieu_muon.*, user.hoten_user, GROUP_CONCAT(sach.ten_sach SEPARATOR ', ') AS danh_sach_sach
        FROM phieu_muon
        JOIN user ON phieu_muon.ma_user = user.ma_user
        JOIN dat_sach_chi_tiet ON phieu_muon.code_cart = dat_sach_chi_tiet.code_cart
        JOIN sach ON dat_sach_chi_tiet.ma_sach = sach.ma_sach
        GROUP BY phieu_muon.code_cart"; 
$query = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <!-- Card Wrapper -->
    <div class="card shadow-lg border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="fas fa-file-alt me-2"></i> Danh Sách Phiếu Mượn
            </h5>
        </div>

        <!-- Notification -->
        <div class="card-body">
            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-<?php echo ($_SESSION['message_type'] == "success") ? "success" : "danger"; ?> alert-dismissible fade show" role="alert">
                    <strong><?php echo $_SESSION['message']; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
            <?php endif; ?>

            <!-- Table -->
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>Mã Phiếu</th>
                            <th>Tên Người Mượn</th>
                            <th>Danh Sách Sách</th>
                            <th>Ngày Mượn</th>
                            <th>Ngày Trả</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td class="text-center"><?php echo htmlspecialchars($row['code_cart']); ?></td>
                            <td><?php echo htmlspecialchars($row['hoten_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['danh_sach_sach']); ?></td>
                            <td class="text-center"><?php echo date("d/m/Y", strtotime($row['ngay_muon'])); ?></td>
                            <td class="text-center"><?php echo date("d/m/Y", strtotime($row['ngay_tra'])); ?></td>
                            <td class="text-center">
                                <a href="modules/qldon/xuly_don.php?xoaphieu=<?php echo htmlspecialchars($row['code_cart']); ?>" 
                                   onclick="return confirm('Bạn chắc chắn muốn xóa phiếu mượn này?')" 
                                   class="btn btn-danger btn-sm shadow-sm">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
