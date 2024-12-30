<?php
    $sqltheloai = "SELECT * FROM the_loai";
    $query_theloai = mysqli_query($conn, $sqltheloai);

    $sqltacgia = "SELECT * FROM tac_gia";
    $query_tacgia = mysqli_query($conn, $sqltacgia);
// Tính tổng số lượng sản phẩm trong giỏ
    $total_quantity = 0;
    if (isset($_SESSION['gio'])) {
        foreach ($_SESSION['gio'] as $item) {
            $total_quantity += $item['so_luong'];  // Giả sử mỗi sản phẩm có một trường 'quantity' lưu trữ số lượng
        }
    }
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand fw-bold text-primary" href="/cn-da21ttc-nguyenhoangnhut-qltv-Php/">LIBRARY</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/cn-da21ttc-nguyenhoangnhut-qltv-Php/">Trang Chủ</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Thể Loại</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php while($row_theloai = mysqli_fetch_assoc($query_theloai)){ ?>
                            <li><a class="dropdown-item" href="index.php?quanly=theloai&idtheloai=<?php echo $row_theloai['ma_the_loai']?>"><?php echo $row_theloai['ten_the_loai']?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Tác Giả</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php while($row_tacgia = mysqli_fetch_assoc($query_tacgia)){ ?>
                            <li><a class="dropdown-item" href="index.php?quanly=tacgia&idtacgia=<?php echo $row_tacgia['ma_tac_gia']?>"><?php echo $row_tacgia['ten_tac_gia']?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                
                <!-- Kiểm tra người dùng đã đăng nhập hay chưa để hiển thị nút "Sách đã mượn" -->
                <?php if (isset($_SESSION['ma_user'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=sachdamuon">Sách đã mượn</a></li>
                <?php } ?>
                
                <?php if (isset($_SESSION['ma_user'])) { ?>
                    <li class="nav-item"><a class="nav-link" href="index.php?quanly=canhan">Cá nhân</a></li>
                <?php } ?>
            </ul>
            <!-- Thanh tìm kiếm -->
            <form class="d-flex" method="GET" action="index.php">
                <input class="form-control me-2" type="text" name="search" placeholder="Tìm kiếm sách..." aria-label="Search">
                <a type="submit"></a>
            </form>
            <form class="d-flex">
                
                <div class="btn-group" role="group">
                    <a class="btn btn-outline-dark" href="index.php?quanly=gio">
                        <i class="bi-cart-fill me-1"></i>
                        <span class="badge bg-dark text-white ms-1 rounded-pill"><?php echo $total_quantity; ?></span>
                    </a>
                    <?php if (isset($_SESSION['dangnhap'])) { ?>
                        <!-- Nếu người dùng đã đăng nhập, hiển thị Logout -->
                        <a class="btn btn-outline-dark" href="logout.php">
                            <i class="bi bi-box-arrow-left"></i>
                            Logout
                        </a>
                    <?php } else { ?>
                        <!-- Nếu chưa đăng nhập, hiển thị Login -->
                        <a class="btn btn-outline-dark" href="loginuser.php">
                            <i class="bi bi-box-arrow-in-right"></i>
                            Login
                        </a>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</nav>
<header class="bg-dark py-5" style="margin-top: 56px;">
    <div class="container px-4 px-lg-5 my-5">
        <div class="text-center text-white">
            <h1 class="display-4 fw-bolder">Thư Viện Sách</h1>
            <p class="lead fw-normal text-white-50 mb-0">Khám phá và quản lý kho sách của bạn</p>
        </div>
    </div>
</header>
