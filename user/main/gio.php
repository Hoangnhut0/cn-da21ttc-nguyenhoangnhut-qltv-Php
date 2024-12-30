<div class="container my-5">
    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-info" role="alert">
            <?= $_SESSION['message']; ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>

    <?php if (!empty($_SESSION['gio'])): ?>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            <?php foreach ($_SESSION['gio'] as $key => $cart_item): ?>
                <div class="col">
                    <div class="card h-100">
                        <img 
                            src="admin/modules/qlsach/img/<?= $cart_item['hinh_anh']; ?>" 
                            class="card-img-top img-fluid" 
                            alt="<?= $cart_item['ten_sach']; ?>"
                            style="max-height: 150px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title text-primary text-truncate" title="<?= $cart_item['ten_sach']; ?>">
                                <?= $cart_item['ten_sach']; ?>
                            </h6>
                        </div>
                        <div class="card-footer d-flex justify-content-center">
                            <a href="user/main/xulygio.php?xoa=<?= $key; ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-4 text-end">
            <?php if (isset($_SESSION['dangnhap'])): ?>
                <a href="user/main/muonsach.php" class="btn btn-primary">Đăng ký mượn</a>
            <?php else: ?>
                <a href="loginuser.php" class="btn btn-primary">Đăng nhập</a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center" role="alert">
            Giỏ của bạn đang trống
        </div>
    <?php endif; ?>
</div>
