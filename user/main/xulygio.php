<?php
session_start();
include('../../config/connect.php');

if (isset($_POST['themgio']) && isset($_GET['idsach'])) {
    $id = mysqli_real_escape_string($conn, $_GET['idsach']);
    $soluong = 1;

    // Kiểm tra sách có tồn tại
    $sql = "SELECT * FROM sach WHERE ma_sach = '$id' LIMIT 1";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        $new_sach = array(
            'ten_sach' => $row['ten_sach'],
            'id' => $id,
            'so_luong' => $soluong,
            'hinh_anh' => $row['hinh_anh'],
            'ma_sach' => $row['ma_sach']
        );

        // Kiểm tra giỏ hàng và thêm hoặc cập nhật sách
        if (isset($_SESSION['gio'])) {
            $found = false;
            // Kiểm tra xem sách đã có trong giỏ hay chưa
            foreach ($_SESSION['gio'] as &$cart_item) { 
                if ($cart_item['id'] == $id) {
                    $found = true;  // Sách đã có trong giỏ
                    break;
                }
            }

            // Nếu sách đã có trong giỏ, lưu thông báo và chuyển hướng về trang chi tiết sách
            if ($found) {
                $_SESSION['message'] = "Sách đã có trong giỏ, không thể mượn thêm!";
                header("Location: ../../index.php?quanly=chitiet&id=$id");
                exit();  // Dừng việc xử lý và không thêm sách
            } else {
                $_SESSION['gio'][] = $new_sach;  // Dùng cú pháp [] để thêm sách vào giỏ
            }
        } else {
            $_SESSION['gio'] = array($new_sach);  // Tạo giỏ hàng mới nếu chưa có
        }
    } else {
        echo "Lỗi: Sách không tồn tại.";
    }

    // Chuyển hướng về trang giỏ hàng
    header('Location: ../../index.php?quanly=gio');
    exit();
} else {
    echo "Lỗi: Không có ID sản phẩm.";
}

if (isset($_GET['xoa'])) {
    $key = $_GET['xoa'];  // Lấy chỉ mục (index) của sản phẩm cần xóa từ URL

    // Kiểm tra xem chỉ mục có tồn tại trong giỏ hàng hay không
    if (isset($_SESSION['gio'][$key])) {
        unset($_SESSION['gio'][$key]);  // Xóa sản phẩm khỏi giỏ hàng
        $_SESSION['gio'] = array_values($_SESSION['gio']);  // Đặt lại chỉ mục của mảng giỏ hàng để tránh bị gián đoạn
    }

    // Chuyển hướng lại trang giỏ hàng để hiển thị giỏ hàng đã cập nhật
    header("Location: ../../index.php?quanly=gio");
    exit();
} else {
    echo "Lỗi: Không có sản phẩm để xóa.";
}



?>
