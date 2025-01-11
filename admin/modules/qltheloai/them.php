<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3 class="mb-0"><i class="fas fa-book"></i> Thêm Thể Loại Sách Mới</h3>
        </div>
        <div class="card-body">
            <form action="modules/qltheloai/xuly.php" method="POST" enctype="multipart/form-data">
                <!-- Tên thể loại -->
                <div class="mb-3">
                    <label for="bookName" class="form-label fw-bold">Tên Thể Loại</label>
                    <input type="text" class="form-control" id="bookName" name="tentheloai" placeholder="Nhập tên thể loại" required>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary me-2" name="them">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=theloai&query=danhsach" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
