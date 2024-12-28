<div class="container my-5">
<?php

    // Kiểm tra nếu có thông báo trong session và hiển thị thông báo
    if (isset($_SESSION['message'])) {
        echo '<div class="alert alert-info" role="alert">' . $_SESSION['message'] . '</div>';
        unset($_SESSION['message']); // Sau khi hiển thị, xóa thông báo
    }
?>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Kiểm tra xem giỏ hàng có sản phẩm và không rỗng
            if (isset($_SESSION['gio']) && count($_SESSION['gio']) > 0) {
                foreach ($_SESSION['gio'] as $key => $cart_item) {  // $key là chỉ mục của phần tử trong mảng
            ?>
                <tr>
                    <td>
                        <img src="admin/modules/qlsach/img/<?php echo $cart_item['hinh_anh']; ?>" alt="Product Image" class="img-fluid" style="width: 80px; height: auto;">
                    </td>
                    <td><?php echo $cart_item['ten_sach']; ?></td>
                    <td>
                        <!-- Link xóa sản phẩm với tham số xoa=khoa (index) của sản phẩm trong giỏ -->
                        <a class="btn btn-danger btn-sm" href="user/main/xulygio.php?xoa=<?php echo $key; ?>">Xóa</a>
                    </td>
                </tr>
            <?php 
                }
            } else {
            ?>
                <tr>
                    <td colspan="3" class="text-center">Giỏ của bạn đang trống</td>
                </tr>
            <?php 
            }
            ?>
        </tbody>
    </table>
        
    <?php
        // Kiểm tra xem giỏ hàng có sản phẩm và người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['gio']) && count($_SESSION['gio']) > 0) {
            if (isset($_SESSION['dangnhap'])) {  // Nếu người dùng đã đăng nhập
    ?>
            <div class="d-flex justify-content-between align-items-center">
                <a href="user/main/muonsach.php" class="btn btn-primary">Đăng ký mượn</a>
            </div>
    <?php 
            } else {  // Nếu chưa đăng nhập
    ?>
            <div class="d-flex justify-content-between align-items-center">
                <a href="loginuser.php" class="btn btn-primary">Đăng nhập</a>
            </div>
    <?php 
            }
        }
    ?>
</div>
