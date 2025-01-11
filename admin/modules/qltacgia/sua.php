<?php
$sql = "SELECT * FROM tac_gia WHERE ma_tac_gia = '$_GET[idtacgia]' LIMIT 1";
$query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-success text-white text-center">
            <h3 class="mb-0"><i class="fas fa-user-edit"></i> Cập Nhật Thông Tin Tác Giả</h3>
        </div>
        <div class="card-body">
            <form action="modules/qltacgia/xuly.php?idtacgia=<?php echo $_GET['idtacgia'] ?>" method="POST" enctype="multipart/form-data">
                <?php while ($row = mysqli_fetch_array($query)) { ?>
                    <!-- Tên tác giả -->
                    <div class="mb-3">
                        <label for="tentacgia" class="form-label fw-bold">Tên Tác Giả</label>
                        <input type="text" class="form-control" id="tentacgia" name="tentacgia" value="<?php echo htmlspecialchars($row['ten_tac_gia']); ?>" required>
                    </div>
                    <!-- Tiểu sử -->
                    <div class="mb-3">
                        <label for="tieusu" class="form-label fw-bold">Tiểu Sử</label>
                        <textarea class="form-control" id="tieusu" name="tieusu" rows="4"><?php echo htmlspecialchars($row['tieu_su']); ?></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success me-2" name="sua">
                            <i class="fas fa-save"></i> Cập Nhật
                        </button>
                        <a href="index.php?action=tacgia&query=danhsach" class="btn btn-danger">
                            <i class="fas fa-times"></i> Hủy
                        </a>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
</div>
