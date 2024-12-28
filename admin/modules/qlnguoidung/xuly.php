<?php
    include('../../../config/connect.php');

    $id = isset($_GET['idnguoidung']) ? $_GET['idnguoidung']: NULL;
    $hoten = isset($_POST['hoten']) ? $_POST['hoten']: NULL;
    $email = isset($_POST['email']) ? $_POST['email']: NULL;
    $sdt = isset($_POST['sodienthoai']) ? $_POST['sodienthoai']: NULL;
    $tendangnhap = isset($_POST['tendangnhap']) ? $_POST['tendangnhap']: NULL;
    $password = isset($_POST['password']) ? $_POST['password']: NULL;
    $vaitro = isset($_POST['vaitro']) ? $_POST['vaitro']: NULL;
    $password = md5($password);

    if(isset($_POST['sbm']) && $hoten && $email && $sdt && $tendangnhap && $password){
        $sql_them = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, email, so_dien_thoai, vai_tro) 
        VALUE ('".$tendangnhap."', '".$password."', '".$hoten."', '".$email."', '".$sdt."', '".$vaitro."')";
        mysqli_query($conn, $sql_them);
        header('location: ../../index.php?action=quanlynguoidung&query=xem');
    }elseif(isset($_POST['sua'])&& $hoten && $email && $sdt && $tendangnhap && $password){
        $sql_sua = "UPDATE nguoi_dung SET  ten_dang_nhap = '".$tendangnhap."', mat_khau = '".$password."', ho_ten = '".$hoten."', email = '".$email."', so_dien_thoai = '".$sdt."' WHERE ma_nguoi_dung = '$id'";
        mysqli_query($conn, $sql_sua);
        echo $sql_sua;
        header('location: ../../index.php?action=quanlynguoidung&query=xem');
    }
    else{   
        $sql_vaitro = "SELECT vai_tro FROM nguoi_dung WHERE ma_nguoi_dung = '$id'";
        $result = mysqli_query($conn, $sql_vaitro);
        $row = mysqli_fetch_assoc($result);
        if ($row['vai_tro'] === 'nhan_vien') {
            $sql_xoa = "DELETE FROM nguoi_dung WHERE ma_nguoi_dung = '$id'";
            mysqli_query($conn, $sql_xoa);
            header('location: ../../index.php?action=quanlynguoidung&query=xem');
        } elseif ($row['vai_tro'] === 'user') {
            $sql_xoa = "DELETE FROM nguoi_dung WHERE ma_nguoi_dung = '$id'";
            mysqli_query($conn, $sql_xoa);
            header('location: ../../index.php?action=quanlynguoidung&query=xemuser');
        }
    }
?>