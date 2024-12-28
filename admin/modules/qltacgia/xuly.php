<?php
    include('../../../config/connect.php');
    $id = isset($_GET['idtacgia']) ? ($_GET['idtacgia']) : NULL ;
    $tentacgia = isset($_POST['tentacgia']) ?($_POST['tentacgia']) : NULL;
    $tieusu = isset($_POST['tieusu']) ? ($_POST['tieusu']): NULL;

    if(isset($_POST['them'])){
        $sql_them = "INSERT INTO tac_gia (ten_tac_gia, tieu_su) VALUE ('$tentacgia','$tieusu')";
        mysqli_query($conn, $sql_them);
        //echo $sql_them;
        header('location: ../../index.php?action=quanlytacgia&query=xem');
    }elseif(isset($_POST['sua'])){
        $sql_sua = "UPDATE tac_gia SET ten_tac_gia='".$tentacgia."', tieu_su='".$tieusu."' WHERE ma_tac_gia = '$id'";
        mysqli_query($conn, $sql_sua);
        header('location: ../../index.php?action=quanlytacgia&query=xem');
    }else{
        if($id){
            $sql_kiemtra = "SELECT * FROM sach WHERE ma_tac_gia = $id";
            $query_kiemtra = mysqli_query($conn, $sql_kiemtra);
            if (mysqli_num_rows($query_kiemtra) > 0) {
                echo "<script>
                alert('Không thể xóa tác giả này vì vẫn còn sách liên kết!');
                window.location.href='../../index.php?action=quanlytacgia&query=xem';
                </script>";
            }else{
                $sql_xoa = "DELETE FROM tac_gia WHERE ma_tac_gia = $id";
                mysqli_query($conn, $sql_xoa);
                echo $sql_xoa;
                header('location: ../../index.php?action=quanlytacgia&query=xem');
            }
        }
    }
?>