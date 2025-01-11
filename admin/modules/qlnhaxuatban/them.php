<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"><i class="fas fa-building"></i> Thêm Nhà Xuất Bản</h3>
        </div>
        <div class="card-body">
            <form action="modules/qlnhaxuatban/xuly.php" method="POST" enctype="multipart/form-data">
                <!-- Tên nhà xuất bản -->
                <div class="mb-3">
                    <label for="tennhaxuatban" class="form-label fw-bold">Tên nhà xuất bản</label>
                    <input type="text" class="form-control" id="tennhaxuatban" name="tennhaxuatban" placeholder="Nhập tên nhà xuất bản" required>
                </div>
                <!-- Địa chỉ -->
                <div class="mb-3">
                    <label for="diachi" class="form-label fw-bold">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" placeholder="Nhập địa chỉ">
                </div>
                <!-- Số điện thoại -->
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label fw-bold">Số điện thoại</label>
                    <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" placeholder="Nhập số điện thoại">
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2" name="them">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=nhaxuatban&query=danhsach" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
