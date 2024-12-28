<div class="container mt-5">
    <h3 class="mb-4">Thêm Thể Loại Sách Mới</h3>
    <form action="modules/qltheloai/xuly.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="bookName" class="form-label">Tên thể loại</label>
            <input type="text" class="form-control" id="bookName" name="tentheloai" required>
        </div>
        <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary me-2" name="them">Lưu</button>
        </div>
    </form>
</div>