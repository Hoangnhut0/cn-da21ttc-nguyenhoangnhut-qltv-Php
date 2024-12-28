<?php
session_start();  // Bắt đầu phiên làm việc
include('../../../config/connect.php');  // Kết nối tới cơ sở dữ liệu

if (isset($_GET['code_cart'])) {  // Kiểm tra nếu có mã đơn hàng
    $code_cart = $_GET['code_cart'];

    // Kiểm tra trạng thái của đơn hàng trước khi cập nhật, lấy ma_sach từ bảng 'dat_sach_chi_tiet'
    $sql = "SELECT dat_sach.*, dat_sach_chi_tiet.ma_sach FROM dat_sach
            JOIN dat_sach_chi_tiet ON dat_sach.code_cart = dat_sach_chi_tiet.code_cart
            WHERE dat_sach.code_cart = '$code_cart' AND dat_sach.trang_thai = 'cho_duyet'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        // Cập nhật trạng thái của đơn hàng thành "Đã duyệt"
        $sql_update = "UPDATE dat_sach SET trang_thai = 'da_duyet' WHERE code_cart = '$code_cart'";

        if (mysqli_query($conn, $sql_update)) {
            // Lấy thông tin người mượn và sách từ $row
            $ma_nguoi_dung = $row['ma_user'];  // Lấy ma_user từ bảng 'dat_sach'
            $ngay_muon = date('Y-m-d');  // Ngày mượn là ngày hiện tại
            $ngay_tra = date('Y-m-d', strtotime("+20 days"));  // Ngày trả là 20 ngày sau

            // Thêm thông tin vào bảng phieu_muon
            $sql_insert = "INSERT INTO phieu_muon (ma_user, code_cart, ngay_muon, ngay_tra) 
                           VALUES ('$ma_nguoi_dung', '$code_cart', '$ngay_muon', '$ngay_tra')";

            if (mysqli_query($conn, $sql_insert)) {
                $_SESSION['message'] = " 1 Đơn mượn sách đã được duyệt.";
                $_SESSION['message_type'] = "success"; // Thông báo thành công
            } else {
                $_SESSION['message'] = "Lỗi khi thêm thông tin vào bảng phieu_muon.";
                $_SESSION['message_type'] = "error"; // Thông báo lỗi
            }
        } else {
            $_SESSION['message'] = "Cập nhật trạng thái đơn hàng thất bại.";
            $_SESSION['message_type'] = "error"; // Thông báo lỗi
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy đơn hàng hoặc đơn hàng đã được duyệt.";
        $_SESSION['message_type'] = "error"; // Thông báo lỗi
    }
} else {
    $_SESSION['message'] = "Không có mã đơn hàng để xử lý.";
    $_SESSION['message_type'] = "error"; // Thông báo lỗi
}

header("Location: ../../index.php?action=quanlydacsach&query=xem");  // Chuyển hướng về trang danh sách
exit();
?>
