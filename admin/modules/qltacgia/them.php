<div class="container mt-5">
        <h3 class="mb-4">Thêm Tác Giả</h3>
        <form action="modules/qltacgia/xuly.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="tentacgia" class="form-label">Tên tác giả</label>
                <input type="text" class="form-control" id="tentacgia" name="tentacgia" required>
            </div>
            <div class="mb-3">
                <label for="tieusu" class="form-label">Tiểu su</label>
                <textarea type="text" class="form-control" id="tieusu" name="tieusu" ></textarea>
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" name="them">Lưu</button>
            </div>
        </form>
    </div>