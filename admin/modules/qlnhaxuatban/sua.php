<?php
$sql = "SELECT * FROM nha_xuat_ban WHERE ma_nha_xuat_ban = '$_GET[idnhaxuatban]'";
$query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white text-center">
            <h3 class="mb-0"><i class="fas fa-edit"></i> Sửa Thông Tin Nhà Xuất Bản</h3>
        </div>
        <div class="card-body">
            <form action="modules/qlnhaxuatban/xuly.php?idnhaxuatban=<?php echo $_GET['idnhaxuatban'] ?>" method="POST" enctype="multipart/form-data">
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <!-- Tên nhà xuất bản -->
                    <div class="mb-3">
                        <label for="tennhaxuatban" class="form-label fw-bold">Tên Nhà Xuất Bản</label>
                        <input type="text" class="form-control" id="tennhaxuatban" name="tennhaxuatban" value="<?php echo htmlspecialchars($row['ten_nha_xuat_ban']); ?>" placeholder="Nhập tên nhà xuất bản" required>
                    </div>
                    <!-- Địa chỉ -->
                    <div class="mb-3">
                        <label for="diachi" class="form-label fw-bold">Địa Chỉ</label>
                        <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo htmlspecialchars($row['dia_chi']); ?>" placeholder="Nhập địa chỉ nhà xuất bản">
                    </div>
                    <!-- Số điện thoại -->
                    <div class="mb-3">
                        <label for="sodienthoai" class="form-label fw-bold">Số Điện Thoại</label>
                        <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" value="<?php echo htmlspecialchars($row['so_dien_thoai']); ?>" placeholder="Nhập số điện thoại">
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-success me-2" name="sua">
                            <i class="fas fa-save"></i> Cập Nhật
                        </button>
                        <a href="index.php?action=nhaxuatban&query=danhsach" class="btn btn-danger">
                            <i class="fas fa-times"></i> Hủy
                        </a>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
