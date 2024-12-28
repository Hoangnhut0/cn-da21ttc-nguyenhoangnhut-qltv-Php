<?php
    include('../../../config/connect.php');

    $id = isset($_GET['idtheloai']) ? $_GET['idtheloai'] : NULL ;
    $tentheloai = isset($_POST['tentheloai']) ? $_POST['tentheloai'] : NULL;

    if(isset($_POST['them']) && $tentheloai){
        $sql_them = "INSERT INTO the_loai (ten_the_loai) VALUE ('".$tentheloai."')";
        mysqli_query($conn, $sql_them);
        header('location: ../../index.php?action=quanlytheloai&query=xem');
    }elseif(isset($_POST['sua'])&& $tentheloai){
        $sql_sua = "UPDATE the_loai SET ten_the_loai = '".$tentheloai."' WHERE ma_the_loai = '$id'";
        mysqli_query($conn, $sql_sua);
        header('location: ../../index.php?action=quanlytheloai&query=xem');
    }else{
        if($id){
            $sql_kiemtra = "SELECT * FROM sach WHERE ma_the_loai = '$id'";
            $query_kiemtra = mysqli_query($conn, $sql_kiemtra);
            if (mysqli_num_rows($query_kiemtra) > 0) {
                echo "<script>
                alert('Không thể xóa thể loại này vì vẫn còn sách liên kết!');
                window.location.href='../../index.php?action=quanlytheloai&query=xem';
                </script>";
        }else{
            $sql_xoa = "DELETE FROM the_loai WHERE ma_the_loai = $id";
            mysqli_query($conn, $sql_xoa);
            header('location: ../../index.php?action=quanlytheloai&query=xem');
            }
        }
    }
?>