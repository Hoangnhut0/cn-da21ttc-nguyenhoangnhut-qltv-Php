<?php
    $sql_sach = "SELECT * FROM sach WHERE ma_sach = '$_GET[idsach]'";
    $query_sach = mysqli_query($conn, $sql_sach);
?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"><i class="fas fa-edit"></i> Sửa Sách</h3>
        </div>
        <div class="card-body">
            <form action="modules/qlsach/xuly.php?idsach=<?php echo $_GET['idsach']?>" method="POST" enctype="multipart/form-data">
                <?php while($row = mysqli_fetch_array($query_sach)) { ?>
                <div class="row">
                    <!-- Tên sách -->
                    <div class="col-md-6 mb-3">
                        <label for="tensach" class="form-label fw-bold">Tên sách</label>
                        <input type="text" class="form-control" id="tensach" name="tensach" value="<?php echo $row['ten_sach']?>" required>
                    </div>
                    <!-- Hình ảnh -->
                    <div class="col-md-6 mb-3">
                        <label for="hinhanh" class="form-label fw-bold">Hình ảnh</label>
                        <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*">
                        <img src="modules/qlsach/img/<?php echo $row['hinh_anh']; ?>" class="img-thumbnail mt-2" style="width: 150px;">
                    </div>
                </div>
                <div class="row">
                    <!-- Thể loại -->
                    <div class="col-md-4 mb-3">
                        <label for="theloai" class="form-label fw-bold">Thể loại</label>
                        <select class="form-select" id="theloai" name="theloai" required>
                            <?php
                                $sql_theloai = "SELECT * FROM the_loai";
                                $query_theloai = mysqli_query($conn, $sql_theloai);
                                while($row_theloai = mysqli_fetch_array($query_theloai)) {
                                    $selected = $row_theloai['ma_the_loai'] == $row['ma_the_loai'] ? 'selected' : '';
                                    echo "<option $selected value='{$row_theloai['ma_the_loai']}'>{$row_theloai['ten_the_loai']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Năm xuất bản -->
                    <div class="col-md-4 mb-3">
                        <label for="nam" class="form-label fw-bold">Năm xuất bản</label>
                        <input type="number" class="form-control" id="nam" name="nam" value="<?php echo $row['nam_xuat_ban']; ?>" min="1000" max="<?php echo date('Y'); ?>" required>
                    </div>
                    <!-- Số lượng -->
                    <div class="col-md-4 mb-3">
                        <label for="soluong" class="form-label fw-bold">Số lượng</label>
                        <input type="number" class="form-control" id="soluong" name="soluong" value="<?php echo $row['so_luong']; ?>" min="1" required>
                    </div>
                </div>
                <div class="row">
                    <!-- Tác giả -->
                    <div class="col-md-6 mb-3">
                        <label for="tacgia" class="form-label fw-bold">Tác giả</label>
                        <select class="form-select" id="tacgia" name="tacgia" required>
                            <?php
                                $sql_tacgia = "SELECT * FROM tac_gia";
                                $query_tacgia = mysqli_query($conn, $sql_tacgia);
                                while($row_tacgia = mysqli_fetch_array($query_tacgia)) {
                                    $selected = $row_tacgia['ma_tac_gia'] == $row['ma_tac_gia'] ? 'selected' : '';
                                    echo "<option $selected value='{$row_tacgia['ma_tac_gia']}'>{$row_tacgia['ten_tac_gia']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <!-- Nhà xuất bản -->
                    <div class="col-md-6 mb-3">
                        <label for="nhaxuatban" class="form-label fw-bold">Nhà xuất bản</label>
                        <select class="form-select" id="nhaxuatban" name="nhaxuatban" required>
                            <?php
                                $sql_nhaxuatban = "SELECT * FROM nha_xuat_ban";
                                $query_nhaxuatban = mysqli_query($conn, $sql_nhaxuatban);
                                while($row_nhaxuatban = mysqli_fetch_array($query_nhaxuatban)) {
                                    $selected = $row_nhaxuatban['ma_nha_xuat_ban'] == $row['ma_nha_xuat_ban'] ? 'selected' : '';
                                    echo "<option $selected value='{$row_nhaxuatban['ma_nha_xuat_ban']}'>{$row_nhaxuatban['ten_nha_xuat_ban']}</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2" name="sua">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=sach&query=danhsach" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
