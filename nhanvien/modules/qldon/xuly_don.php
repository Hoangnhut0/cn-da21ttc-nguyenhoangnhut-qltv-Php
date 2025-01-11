<?php
session_start();
include('../../../config/connect.php');  


if (isset($_GET['code_cart'])) {
    $code_cart = $_GET['code_cart'];

    $sql = "SELECT dat_sach.*, dat_sach_chi_tiet.ma_sach FROM dat_sach
            JOIN dat_sach_chi_tiet ON dat_sach.code_cart = dat_sach_chi_tiet.code_cart
            WHERE dat_sach.code_cart = '$code_cart' AND dat_sach.trang_thai = 'cho_duyet'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row) {
  
        $sql_update = "UPDATE dat_sach SET trang_thai = 'da_duyet' WHERE code_cart = '$code_cart'";

        if (mysqli_query($conn, $sql_update)) {
            
            $ma_nguoi_dung = $row['ma_user'];  
            $ngay_muon = date('Y-m-d');  
            $ngay_tra = date('Y-m-d', strtotime("+20 days")); 

            // Thêm thông tin vào bảng phieu_muon
            $sql_insert = "INSERT INTO phieu_muon (ma_user, code_cart, ngay_muon, ngay_tra) 
                           VALUES ('$ma_nguoi_dung', '$code_cart', '$ngay_muon', '$ngay_tra')";

            if (mysqli_query($conn, $sql_insert)) {
                $_SESSION['message'] = "1 Đơn mượn sách đã được duyệt.";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Lỗi khi thêm thông tin vào bảng phieu_muon.";
                $_SESSION['message_type'] = "error"; 
            }
        } else {
            $_SESSION['message'] = "Cập nhật trạng thái đơn hàng thất bại.";
            $_SESSION['message_type'] = "error"; 
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy đơn hoặc đơn đã được duyệt.";
        $_SESSION['message_type'] = "error"; 
    }
}


if (isset($_GET['tra'])) {
    $code_cart = $_GET['tra'];

  
    $sql = "SELECT * FROM dat_sach WHERE code_cart = '$code_cart' AND trang_thai = 'da_duyet'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);

    if ($row) {
        
        $ngay_tra = date('Y-m-d');
        
        $sql_update = "UPDATE dat_sach SET trang_thai = 'da_tra' WHERE code_cart = '$code_cart'";
        $sql_update_phieu_muon = "UPDATE phieu_muon SET ngay_tra = '$ngay_tra' WHERE code_cart = '$code_cart'";

       
        if (mysqli_query($conn, $sql_update) && mysqli_query($conn, $sql_update_phieu_muon)) {
            $_SESSION['message'] = "Đơn hàng đã được trả thành công.";
            $_SESSION['message_type'] = "success"; 
        } else {
            $_SESSION['message'] = "Lỗi khi cập nhật trạng thái trả sách.";
            $_SESSION['message_type'] = "error"; 
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy đơn hoặc trạng thái không hợp lệ.";
        $_SESSION['message_type'] = "error"; 
    }
}



if (isset($_GET['huy'])) {
    $code_cart = $_GET['huy'];

    $sql_check = "SELECT * FROM dat_sach WHERE code_cart = '$code_cart' AND trang_thai = 'cho_duyet'";
    $query_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {
        // Cập nhật trạng thái thành 'huy'
        $sql_update = "UPDATE dat_sach SET trang_thai = 'huy' WHERE code_cart = '$code_cart'";
        if (mysqli_query($conn, $sql_update)) {
            $_SESSION['message'] = "Đơn mượn sách đã được hủy thành công.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Lỗi khi hủy đơn.";
            $_SESSION['message_type'] = "error"; 
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy đơn hoặc trạng thái không hợp lệ.";
        $_SESSION['message_type'] = "error"; 
    }
}

if (isset($_GET['xoa'])) {
    $code_cart = $_GET['xoa'];


    $sql_check = "SELECT * FROM dat_sach WHERE code_cart = '$code_cart'";
    $query_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {

        $sql_delete_details = "DELETE FROM dat_sach_chi_tiet WHERE code_cart = '$code_cart'";
        mysqli_query($conn, $sql_delete_details);

  
        $sql_delete = "DELETE FROM dat_sach WHERE code_cart = '$code_cart'";
        if (mysqli_query($conn, $sql_delete)) {
            $_SESSION['message'] = "Xóa đơn thành công.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Lỗi khi xóa đơn.";
            $_SESSION['message_type'] = "error"; 
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy đơn.";
        $_SESSION['message_type'] = "error";
    }
}

if (isset($_GET['xoaphieu'])) {
    $code_cart = $_GET['xoaphieu'];

    $sql_check = "SELECT * FROM phieu_muon WHERE code_cart = '$code_cart'";
    $query_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($query_check) > 0) {
        $sql_delete_details = "DELETE FROM dat_sach_chi_tiet WHERE code_cart = '$code_cart'";
        mysqli_query($conn, $sql_delete_details);

        $sql_delete = "DELETE FROM phieu_muon WHERE code_cart = '$code_cart'";
        if (mysqli_query($conn, $sql_delete)) {
            $_SESSION['message'] = "Xóa phiếu mượn thành công.";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Lỗi khi xóa phiếu mượn.";
            $_SESSION['message_type'] = "error";
        }
    } else {
        $_SESSION['message'] = "Không tìm thấy phiếu mượn.";
        $_SESSION['message_type'] = "error";
    }


    header("Location: ../../index.php?action=phieumuon&query=xemphieu");
    exit();
}


header("Location: ../../index.php?action=quanlydacsach&query=xem");
exit();
