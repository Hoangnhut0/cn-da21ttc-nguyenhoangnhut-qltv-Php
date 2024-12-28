<?php
    $sql = "SELECT * FROM nguoi_dung WHERE ma_nguoi_dung = '$_GET[idnguoidung]'";
    $query = mysqli_query($conn, $sql)
?>
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Sửa thông tin nhân viên</h3>
                            </div>
                            <div class="card-body">
                                <form action="modules/qlnguoidung/xuly.php?idnguoidung=<?php echo $_GET['idnguoidung']?>" enctype="multipart/form-data" method="POST" id="registerForm" onsubmit="return validatePasswords()">
                                    <?php 
                                        while($row = mysqli_fetch_array($query)){ ?>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputName" type="text" value="<?php echo $row['ho_ten']?>" name="hoten"  required />
                                            <label for="inputName">Họ Tên</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputEmail" type="email" value="<?php echo $row['email']?>" name="email" required />
                                            <label for="inputEmail">Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputPhone" type="tel" value="<?php echo $row['so_dien_thoai']?>" name="sodienthoai" pattern="[0-9]{10}" required />
                                            <label for="inputPhone">Số điện thoại</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="inputUsername" type="text" value="<?php echo $row['ten_dang_nhap']?>" name="tendangnhap" required />
                                            <label for="inputUsername">Tên Đăng nhập</label>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Tạo mật khẩu" required />
                                                    <label for="inputPassword">Mật khẩu</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputPasswordConfirm" type="password" name="password" placeholder="Xác nhận mật khẩu" required />
                                                    <label for="inputPasswordConfirm">Nhập lại mật khẩu</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button class="btn btn-primary btn-block" type="submit" name="sua">Xác nhận</button>
                                            </div>
                                        </div>
                                    <?php }?>
                                </form>
                                <div id="errorMessage" style="color: red; display: none;">
                                    Mật khẩu và Nhập lại mật khẩu không trùng khớp.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script>
    function validatePasswords() {
        const password = document.getElementById('inputPassword').value;
        const confirmPassword = document.getElementById('inputPasswordConfirm').value;
        const errorMessage = document.getElementById('errorMessage');

        if (password !== confirmPassword) {
            errorMessage.style.display = 'block';
            return false; // Ngăn không cho form submit
        } else {
            errorMessage.style.display = 'none';
            return true; // Cho phép form submit
        }
    }
</script>
