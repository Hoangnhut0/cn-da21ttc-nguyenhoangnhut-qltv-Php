<div class="container mt-5">
        <h3 class="mb-4">Thêm Sách Mới</h3>
        <form action="modules/qlsach/xuly.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tensach" class="form-label">Tên sách</label>
                <input type="text" class="form-control" id="tensach" name="tensach" required>
            </div>
            <div class="mb-3">
                <label for="hinhanh" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" required>
            </div>
            <div class="mb-3">
                <label for="mota" class="form-label">Mô tả</label>
                <textarea type="text" class="form-control" id="mota" name="mota" ></textarea>
            </div>
            <div class="mb-3">
                <label for="theloai" class="form-label">Thể loại</label>
                <select class="form-select" id="theloai" name="theloai" required>
                    <option value="">Chọn thể loại</option>
                    <?php
                        $sql_theloai = "SELECT * FROM the_loai";
                        $query_theloai = mysqli_query($conn, $sql_theloai);
                        while($row_theloai = mysqli_fetch_array($query_theloai)){ ?>
                            <option value="<?php echo $row_theloai['ma_the_loai']?>"><?php echo $row_theloai['ten_the_loai']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nam" class="form-label">Nam xuất bản</label>
                <input type="year" class="form-control" id="nam" name="nam" required>
            </div>
            <div class="mb-3">
                <label for="tacgia" class="form-label">Tác giả</label>
                <select class="form-select" id="tacgia" name="tacgia" required>
                    <option value="">Chọn tác giả</option>
                    <?php
                        $sql_tacgia = "SELECT * FROM tac_gia";
                        $query_tacgia = mysqli_query($conn, $sql_tacgia);
                        while($row_tacgia = mysqli_fetch_array($query_tacgia)){?>
                            <option value="<?php echo $row_tacgia['ma_tac_gia']?>"><?php echo $row_tacgia['ten_tac_gia']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="nhaxuatban" class="form-label">Nhà xuất bản</label>
                <select class="form-select" id="nhaxuatban" name="nhaxuatban" required>
                    <option value="">Chọn nhà xuất bản</option>
                    <?php
                        $sql_nhaxuatban  = "SELECT * FROM nha_xuat_ban";
                        $query_nhaxuatban = mysqli_query($conn, $sql_nhaxuatban);
                        while($row_nhaxuatban = mysqli_fetch_array($query_nhaxuatban)){?>
                            <option value="<?php echo $row_nhaxuatban['ma_nha_xuat_ban']?>"><?php echo $row_nhaxuatban['ten_nha_xuat_ban']?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="soluong" class="form-label">Số lượng</label>
                <input type="number" class="form-control" id="soluong" name="soluong" min="1" required>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" name="them">Lưu</button>
            </div>
        </form>
    </div>