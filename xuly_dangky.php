<?php
    include("./config/connect.php");

    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $tendangnhap = $_POST['tendangnhap'];
    $sdt = $_POST['sdt'];
    $password = md5($_POST['password']);

    if(isset($_POST['dangky'])){
        $sql_dangky = "INSERT INTO nguoi_dung (ten_dang_nhap, mat_khau, ho_ten, email, so_dien_thoai) VALUE ('$tendangnhap', '$password', '$hoten', '$email', '$sdt')";
        mysqli_query($conn, $sql_dangky);
            echo '<p style="text-align: center; color: green;"> Bạn đã đăng ký thành công! </p>';  
    }
?>