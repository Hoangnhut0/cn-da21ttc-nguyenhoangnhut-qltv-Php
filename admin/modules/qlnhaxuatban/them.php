<div class="container mt-5">
        <h3 class="mb-4">Thêm Nhà Xuất Bản</h3>
        <form action="modules/qlnhaxuatban/xuly.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tennhaxuatban" class="form-label">Nhà xuất bản</label>
                <input type="text" class="form-control" id="tennhaxuatban" name="tennhaxuatban" required>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ</label>
                <input type="text" class="form-control" id="diachi" name="diachi" >
            </div>
            <div class="mb-3">
                <label for="sodienthoai" class="form-label">số điện thoại</label>
                <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai">
            </div>  
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" name="them">Lưu</button>
            </div>
        </form>
</div>