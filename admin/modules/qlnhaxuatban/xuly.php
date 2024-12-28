<?php
    include('../../../config/connect.php');

    $id = isset($_GET['idnhaxuatban']) ? $_GET['idnhaxuatban'] : null;
    $tennhaxuatban = isset($_POST['tennhaxuatban']) ? $_POST['tennhaxuatban'] : null;
    $diachi = isset($_POST['diachi']) ? $_POST['diachi'] : null;
    $sodienthoai = isset($_POST['sodienthoai']) ? $_POST['sodienthoai'] : null;

    if (isset($_POST['them'])) {
        $sql_them = "INSERT INTO nha_xuat_ban (ten_nha_xuat_ban, dia_chi ,so_dien_thoai) VALUES ('$tennhaxuatban', '$diachi', '$sodienthoai')";
        mysqli_query($conn, $sql_them);
        header('Location: ../../index.php?action=quanlynhaxuatban&query=xem');
    } elseif (isset($_POST['sua']))  {
        $sql_sua = "UPDATE nha_xuat_ban SET ten_nha_xuat_ban='$tennhaxuatban', dia_chi='$diachi', so_dien_thoai='$sodienthoai' WHERE ma_nha_xuat_ban = $id";
        mysqli_query($conn, $sql_sua);
        header('Location: ../../index.php?action=quanlynhaxuatban&query=xem');
    } else {
        if ($id) {
            // Kiểm tra xem nhà xuất bản có sách nào hay không
            $sql_kiemtra = "SELECT * FROM sach WHERE ma_nha_xuat_ban = $id";
            $query_kiemtra = mysqli_query($conn, $sql_kiemtra);
            if (mysqli_num_rows($query_kiemtra) > 0) {
                // Nếu có sách tồn tại, hiển thị thông báo
                echo "<script>
                        alert('Không thể xóa nhà xuất bản này vì vẫn còn sách liên kết!');
                        window.location.href='../../index.php?action=quanlynhaxuatban&query=xem';
                    </script>";
            } else {
                // Nếu không có sách, thực hiện xóa nhà xuất bản
                $sql_xoa = "DELETE FROM nha_xuat_ban WHERE ma_nha_xuat_ban = $id";
                mysqli_query($conn, $sql_xoa);
                header('Location: ../../index.php?action=quanlynhaxuatban&query=xem');
            }
        }
    }
?>
