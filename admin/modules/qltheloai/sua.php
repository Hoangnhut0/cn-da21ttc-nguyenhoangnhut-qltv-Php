<?php
    $sql = "SELECT * FROM the_loai WHERE ma_the_loai = '$_GET[idtheloai]'";
    $query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
    <h3 class="mb-4">Sua Thể Loại Sách</h3>
    <form action="modules/qltheloai/xuly.php?idtheloai=<?php echo $_GET['idtheloai'];?>" method="POST" enctype="multipart/form-data">
        <?php
            while($row = mysqli_fetch_array($query)){
        ?>
            <div class="mb-3">
                <label for="bookName" class="form-label">Tên thể loại</label>
                <input type="text" class="form-control" id="bookName" name="tentheloai" value="<?php echo $row['ten_the_loai'] ?>" required>
            </div>
            <?php } ?>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary me-2" name="sua">Lưu</button>
            </div>
    </form>
</div>