<?php
$sql = "SELECT * FROM the_loai WHERE ma_the_loai = '$_GET[idtheloai]'";
$query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-info text-white text-center">
            <h3 class="mb-0"><i class="fas fa-edit"></i> Sửa Thể Loại Sách</h3>
        </div>
        <div class="card-body">
            <form action="modules/qltheloai/xuly.php?idtheloai=<?php echo $_GET['idtheloai']; ?>" method="POST" enctype="multipart/form-data">
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <!-- Tên thể loại -->
                    <div class="mb-3">
                        <label for="tentheloai" class="form-label fw-bold">Tên Thể Loại</label>
                        <input type="text" class="form-control" id="tentheloai" name="tentheloai" value="<?php echo htmlspecialchars($row['ten_the_loai']); ?>" placeholder="Nhập tên thể loại" required>
                    </div>
                <?php } ?>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success me-2" name="sua">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                    <a href="index.php?action=theloai&query=danhsach" class="btn btn-danger">
                        <i class="fas fa-times"></i> Hủy
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
