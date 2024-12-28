<?php
session_start();
include('../../config/connect.php');

// Kiểm tra xem người dùng đã đăng nhập và giỏ hàng không rỗng
if (isset($_SESSION['ma_user']) && isset($_SESSION['gio']) && count($_SESSION['gio']) > 0) {
    $ma_nguoi_dung = $_SESSION['ma_user'];
    $code_oder = rand(0, 9999);
    $ngay_dat = date("Y-m-d");

    // Thêm đơn hàng vào bảng dat_sach
    $insert_cart = "INSERT INTO dat_sach(ma_user, code_cart, ngay_dat) VALUES (?, ?, ?)";
    $cart_stmt = $conn->prepare($insert_cart);
    $cart_stmt->bind_param("sss", $ma_nguoi_dung, $code_oder, $ngay_dat);
    if ($cart_stmt->execute()) {
        // Thêm chi tiết giỏ hàng vào bảng dat_sach_chi_tiet
        foreach ($_SESSION['gio'] as $cart_item) {
            $ma_sach = $cart_item['ma_sach'];
            $insert_details = "INSERT INTO dat_sach_chi_tiet(ma_sach, code_cart) VALUES (?, ?)";
            $details_stmt = $conn->prepare($insert_details);
            $details_stmt->bind_param("ss", $ma_sach, $code_oder);
            $details_stmt->execute();
        }

        // Sau khi thêm giỏ hàng và chi tiết, xoá giỏ hàng trong session
        unset($_SESSION['gio']);
        
        // Lưu thông báo thành công vào session
        $_SESSION['message'] = "Đăng ký mượn thành công!";
        
        // Chuyển hướng đến trang xác nhận đơn hàng
        header('Location: ../../index.php?quanly=gio'); 
        exit();
    } else {
        // Nếu không thể thêm vào bảng dat_sach
        $_SESSION['message'] = "Có lỗi khi xử lý mượn. Vui lòng thử lại.";
        header('Location: ../../index.php?quanly=gio');
        exit();
    }
} else {
    // Nếu người dùng chưa đăng nhập hoặc giỏ hàng trống
    $_SESSION['message'] = "Vui lòng đăng nhập hoặc kiểm tra giỏ hàng của bạn.";
    header('Location: ../../loginuser.php');
    exit();
}
?>
