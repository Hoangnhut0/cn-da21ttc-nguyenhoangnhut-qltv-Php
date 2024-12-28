<?php
    $sql = "SELECT * FROM nha_xuat_ban WHERE ma_nha_xuat_ban = '$_GET[idnhaxuatban]'";
    $query = mysqli_query($conn, $sql);
?>
<div class="container mt-5">
        <h3 class="mb-4">Sua Nhà Xuất Bản</h3>
        <form action="modules/qlnhaxuatban/xuly.php?idnhaxuatban=<?php echo $_GET['idnhaxuatban']?>" method="POST" enctype="multipart/form-data">
            <?php
                while($row = mysqli_fetch_array($query)){
            ?>
                <div class="mb-3">
                    <label for="tennhaxuatban" class="form-label">Nhà xuất bản</label>
                    <input type="text" class="form-control" id="tennhaxuatban" name="tennhaxuatban" value="<?php echo $row['ten_nha_xuat_ban']?>" required>
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi" value="<?php echo $row['dia_chi']?>" >
                </div>
                <div class="mb-3">
                    <label for="sodienthoai" class="form-label">số điện thoại</label>
                    <input type="tel" class="form-control" id="sodienthoai" name="sodienthoai" value="<?php echo $row['so_dien_thoai']?>" >
                </div>  
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" name="sua">Lưu</button>
                </div>
            <?php } ?>
        </form>
</div>