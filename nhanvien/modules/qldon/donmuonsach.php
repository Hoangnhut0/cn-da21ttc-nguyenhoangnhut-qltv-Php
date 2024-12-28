<?php
    $sql = "SELECT * FROM dat_sach
            JOIN user ON dat_sach.ma_user = user.ma_user";
    $query = mysqli_query($conn, $sql);

?>

<!-- Tiếp tục phần còn lại của mã HTML và PHP như bình thường -->
<div class="card mb-4">
    <?php
        if (isset($_SESSION['message'])) {
            $message = $_SESSION['message'];
            $message_type = $_SESSION['message_type'];
            
            // Xử lý hiển thị thông báo theo loại (thành công, lỗi)
            if ($message_type == "success") {
                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
            } elseif ($message_type == "error") {
                echo '<div class="alert alert-danger" role="alert">' . $message . '</div>';
            }
            
            // Sau khi hiển thị thông báo, xóa thông báo khỏi session
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
    ?>
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Đơn mượn sách
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Tên người đặt</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết đơn</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query)){
                            $i++
                    ?>
                        <tr>
                            <td><?php echo $row['code_cart'];?></td>
                            <td><?php echo $row['hoten_user']; ?></td>
                            <td><?php echo $row['dia_chi'];?></td>
                            <td><?php echo $row['so_dien_thoai'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td>
                                <?php 
                                // Kiểm tra trạng thái của đơn hàng
                                    if ($row['trang_thai'] == "da_duyet") {
                                        echo '<span class="badge bg-success">Đã duyệt</span>';
                                    } elseif ($row['trang_thai'] == "cho_duyet") {
                                        echo '<a href="modules/qldon/xuly_don.php?code_cart=' . $row['code_cart'] . '" class="badge bg-warning text-dark">Chưa duyệt</a>';
                                    } else {
                                        echo '<span class="badge bg-danger">Đã bị hủy</span>';
                                    }
                                ?>
                            </td>

                            <td>
                                <a href="index.php?action=don&query=xemdon&code=<?php echo $row['code_cart']; ?>">Xem đơn</a>
                                <a href="modules/qldon/xuly_don.php?tra=<?php echo $row['code_cart']; ?>">Trả</a>
                            </td>
                            <td><a href="modules/qldon/xuly_don.php?xoa=<?php echo $row['code_cart']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa đơn hàng này?')">Xóa</a></td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
