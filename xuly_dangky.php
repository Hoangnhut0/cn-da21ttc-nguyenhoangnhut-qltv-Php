<?php
    include("./config/connect.php");

    $hoten = $_POST['hoten'];
    $email = $_POST['email'];
    $tendangnhap = $_POST['tendangnhap'];
    $sdt = $_POST['sdt'];
    $password = md5($_POST['password']);
    $diachi = $_POST['diachi'];

    if(isset($_POST['dangky'])){
        $sql_dangky = "INSERT INTO user (hoten_user, so_dien_thoai, email, dia_chi, taikhoan, password) VALUE ('$hoten', '$sdt', '$email', '$diachi', '$tendangnhap', '$password')";
        mysqli_query($conn, $sql_dangky);
            echo '<p style="text-align: center; color: green;"> Bạn đã đăng ký thành công! </p>';
            header('Location: loginuser.php');  
    }
?>