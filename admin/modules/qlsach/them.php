<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"><i class="fas fa-book"></i> Thêm Sách Mới</h3>
        </div>
        <div class="card-body">
            <form action="modules/qlsach/xuly.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <!-- Tên sách -->
                    <div class="col-md-6 mb-3">
                        <label for="tensach" class="form-label fw-bold">Tên sách</label>
                        <input type="text" class="form-control" id="tensach" name="tensach" placeholder="Nhập tên sách" required>
                    </div>
                    <!-- Hình ảnh -->
                    <div class="col-md-6 mb-3">
                        <label for="hinhanh" class="form-label fw-bold">Hình ảnh</label>
                        <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" required>
                    </div>
                </div>
                <div class="row">
                    <!-- Mô tả -->
                    <div class="col-md-12 mb-3">
                        <label for="mota" class="form-label fw-bold">Mô tả</label>
                        <textarea class="form-control" id="mota" name="mota" rows="3" placeholder="Nhập mô tả về sách"></textarea>
                    </div>
                </div>
                <div class="row">
                    <!-- Thể loại -->
                    <div class="col-md-4 mb-3">
                        <label for="theloai" class="form-label fw-bold">Thể loại</label>
                        <select class="form-select" id="theloai" name="theloai" required>
                            <option value="">Chọn thể loại</option>
                            <?php
                                $sql_theloai = "SELECT * FROM the_loai";
                                $query_theloai = mysqli_query($conn, $sql_theloai);
                                while ($row_theloai = mysqli_fetch_array($query_theloai)) { ?>
                                    <option value="<?php echo $row_theloai['ma_the_loai']; ?>">
                                        <?php echo $row_theloai['ten_the_loai']; ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Năm xuất bản -->
                    <div class="col-md-4 mb-3">
                        <label for="nam" class="form-label fw-bold">Năm xuất bản</label>
                        <input type="number" class="form-control" id="nam" name="nam" min="1000" max="<?php echo date('Y'); ?>" placeholder="Nhập năm xuất bản" required>
                    </div>
                    <!-- Số lượng -->
                    <div class="col-md-4 mb-3">
                        <label for="soluong" class="form-label fw-bold">Số lượng</label>
                        <input type="number" class="form-control" id="soluong" name="soluong" min="1" placeholder="Nhập số lượng" required>
                    </div>
                </div>
                <div class="row">
                    <!-- Tác giả -->
                    <div class="col-md-6 mb-3">
                        <label for="tacgia" class="form-label fw-bold">Tác giả</label>
                        <select class="form-select" id="tacgia" name="tacgia" required>
                            <option value="">Chọn tác giả</option>
                            <?php
                                $sql_tacgia = "SELECT * FROM tac_gia";
                                $query_tacgia = mysqli_query($conn, $sql_tacgia);
                                while ($row_tacgia = mysqli_fetch_array($query_tacgia)) { ?>
                                    <option value="<?php echo $row_tacgia['ma_tac_gia']; ?>">
                                        <?php echo $row_tacgia['ten_tac_gia']; ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- Nhà xuất bản -->
                    <div class="col-md-6 mb-3">
                        <label for="nhaxuatban" class="form-label fw-bold">Nhà xuất bản</label>
                        <select class="form-select" id="nhaxuatban" name="nhaxuatban" required>
                            <option value="">Chọn nhà xuất bản</option>
                            <?php
                                $sql_nhaxuatban = "SELECT * FROM nha_xuat_ban";
                                $query_nhaxuatban = mysqli_query($conn, $sql_nhaxuatban);
                                while ($row_nhaxuatban = mysqli_fetch_array($query_nhaxuatban)) { ?>
                                    <option value="<?php echo $row_nhaxuatban['ma_nha_xuat_ban']; ?>">
                                        <?php echo $row_nhaxuatban['ten_nha_xuat_ban']; ?>
                                    </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2" name="them">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=sach&query=danhsach" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>