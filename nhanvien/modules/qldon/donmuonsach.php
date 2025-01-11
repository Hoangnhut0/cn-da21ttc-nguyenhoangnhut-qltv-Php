<?php
    $sql = "SELECT * FROM dat_sach
            JOIN user ON dat_sach.ma_user = user.ma_user";
    $query = mysqli_query($conn, $sql);
?>

<div class="container mt-4">
    <!-- Card Wrapper -->
    <div class="card shadow-lg border-0">
        <!-- Header -->
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="fas fa-book-reader me-2"></i> Danh Sách Đơn Mượn Sách
            </h5>
        </div>
        <div class="card-body">
            <!-- Notification -->
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
                            <th>Mã Đơn</th>
                            <th>Tên Người Đặt</th>
                            <th>Địa Chỉ</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Trạng Thái</th>
                            <th>Chi Tiết Đơn</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td class="text-center"><?php echo htmlspecialchars($row['code_cart']); ?></td>
                            <td><?php echo htmlspecialchars($row['hoten_user']); ?></td>
                            <td><?php echo htmlspecialchars($row['dia_chi']); ?></td>
                            <td><?php echo htmlspecialchars($row['so_dien_thoai']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="text-center">
                                <?php 
                                switch ($row['trang_thai']) {
                                    case "da_duyet":
                                        echo '<span class="badge bg-success"><i class="fas fa-check-circle"></i> Đã Duyệt</span>';
                                        break;
                                    case "cho_duyet":
                                        echo '<span class="badge bg-warning text-dark"><i class="fas fa-clock"></i> Chờ Duyệt</span>';
                                        break;
                                    case "da_tra":
                                        echo '<span class="badge bg-info text-white"><i class="fas fa-undo"></i> Đã Trả</span>';
                                        break;
                                    default:
                                        echo '<span class="badge bg-danger"><i class="fas fa-exclamation-circle"></i> Đã Hủy</span>';
                                        break;
                                }
                                ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?action=don&query=xemdon&code=<?php echo htmlspecialchars($row['code_cart']); ?>" class="btn btn-primary btn-sm shadow-sm">
                                    <i class="fas fa-eye"></i> Xem Đơn
                                </a>
                            </td>
                            <td class="text-center">
                                <?php if ($row['trang_thai'] == "cho_duyet"): ?>
                                    <a href="modules/qldon/xuly_don.php?code_cart=<?php echo htmlspecialchars($row['code_cart']); ?>" class="btn btn-warning btn-sm shadow-sm">
                                        <i class="fas fa-check"></i> Duyệt
                                    </a>
                                    <a href="modules/qldon/xuly_don.php?huy=<?php echo htmlspecialchars($row['code_cart']); ?>" onclick="return confirm('Bạn chắc chắn muốn hủy đơn hàng này?')" class="btn btn-secondary btn-sm shadow-sm">
                                        <i class="fas fa-times"></i> Hủy
                                    </a>
                                <?php endif; ?>
                                <?php if ($row['trang_thai'] == "da_duyet"): ?>
                                    <a href="modules/qldon/xuly_don.php?tra=<?php echo htmlspecialchars($row['code_cart']); ?>" class="btn btn-success btn-sm shadow-sm">
                                        <i class="fas fa-undo"></i> Trả
                                    </a>
                                <?php endif; ?>
                                <a href="modules/qldon/xuly_don.php?xoa=<?php echo htmlspecialchars($row['code_cart']); ?>" onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?')" class="btn btn-danger btn-sm shadow-sm">
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
