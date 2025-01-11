<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"><i class="fas fa-user-edit"></i> Thêm Tác Giả</h3>
        </div>
        <div class="card-body">
            <form action="modules/qltacgia/xuly.php" method="POST" enctype="multipart/form-data">
                <!-- Tên tác giả -->
                <div class="mb-3">
                    <label for="tentacgia" class="form-label fw-bold">Tên tác giả</label>
                    <input type="text" class="form-control" id="tentacgia" name="tentacgia" placeholder="Nhập tên tác giả" required>
                </div>
                <!-- Tiểu sử -->
                <div class="mb-3">
                    <label for="tieusu" class="form-label fw-bold">Tiểu sử</label>
                    <textarea class="form-control" id="tieusu" name="tieusu" rows="4" placeholder="Nhập tiểu sử tác giả"></textarea>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2" name="them">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=tacgia&query=danhsach" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
