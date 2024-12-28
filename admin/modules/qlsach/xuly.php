<?php
    include('../../../config/connect.php');

    $id = $_GET['idsach'];

    $tensach = $_POST['tensach'];
    $theloai = $_POST['theloai'];
    $namxuatban = $_POST['nam'];
    $tacgia =  $_POST['tacgia'];
    $nhaxuatban = $_POST['nhaxuatban'];
    $soluong = $_POST['soluong'];
    $mota = $_POST['mota'];

    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    
    if(isset($_POST['them'])){
        $sql_them = "INSERT INTO sach (ten_sach, hinh_anh, mo_ta, ma_tac_gia, ma_nha_xuat_ban, nam_xuat_ban, ma_the_loai, so_luong)
VALUES ('".$tensach."', '".$hinhanh."', '".$mota."', '".$tacgia."', '".$nhaxuatban."', '".$namxuatban."', '".$theloai."', '".$soluong."')";

        mysqli_query($conn, $sql_them);
        move_uploaded_file($hinhanh_tmp, 'img/' .$hinhanh);
        header('location: ../../index.php?action=quanlysach&query=xem');
        echo $sql_them;
    }elseif(isset($_POST['sua'])){
        if($hinhanh!=''){
            move_uploaded_file($hinhanh_tmp,'img/'.$hinhanh);
            $sql_sua = "UPDATE sach SET ten_sach = '".$tensach."', hinh_anh = '".$hinhanh."', ma_tac_gia = '".$tacgia."', ma_nha_xuat_ban = '".$nhaxuatban."', nam_xuat_ban = '".$namxuatban."', ma_the_loai = '".$theloai."', so_luong = '".$soluong."' WHERE ma_sach = '$id'";
            $sql = "SELECT * FROM sach WHERE ma_sach = '$id'";
            $query = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('img/'.$row['hinh_anh']);
            }
        }else{
            $sql_sua = "UPDATE sach SET ten_sach = '".$tensach."', ma_tac_gia = '".$tacgia."', ma_nha_xuat_ban = '".$nhaxuatban."', nam_xuat_ban = '".$namxuatban."', ma_the_loai = '".$theloai."', so_luong = '".$soluong."' WHERE ma_sach = '$id'";
        }
        mysqli_query($conn, $sql_sua);
        //echo $sql_sua;
        header('location: ../../index.php?action=quanlysach&query=xem');
    }else{
        $sql = "SELECT * FROM sach WHERE ma_sach = '$id' LIMIT 1";
        $query = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($query)){
            unlink('img/'.$row['hinh_anh']);
        }
        $sql_xoa = "DELETE FROM  sach WHERE ma_sach = $id";
        mysqli_query($conn, $sql_xoa);
        header('location: ../../index.php?action=quanlysach&query=xem');
    }
?>