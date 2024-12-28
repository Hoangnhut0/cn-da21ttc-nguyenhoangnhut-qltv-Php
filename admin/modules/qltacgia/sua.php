<?php
    $sql = "SELECT * FROM tac_gia WHERE ma_tac_gia = '$_GET[idtacgia]' LIMIT 1";
    $query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
        <h3 class="mb-4">Sua Tác Giả</h3>
        <form action="modules/qltacgia/xuly.php?idtacgia=<?php echo $_GET['idtacgia']?>" method="POST" enctype="multipart/form-data">
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
                <div class="mb-3">
                    <label for="tentacgia" class="form-label">Tên tác giả</label>
                    <input type="text" class="form-control" id="tentacgia" name="tentacgia" value="<?php echo $row['ten_tac_gia'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="tieusu" class="form-label">Tiểu su</label>
                    <textarea type="text" class="form-control" id="tieusu" name="tieusu"  ><?php echo $row['tieu_su']?> </textarea>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" name="sua">Lưu</button>
                </div>
            <?php } ?>
        </form>
    </div>