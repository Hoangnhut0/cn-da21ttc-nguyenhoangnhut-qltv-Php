<?php
    $sql_sach = "SELECT * FROM sach WHERE ma_sach = '$_GET[idsach]'";
    $query_sach = mysqli_query($conn, $sql_sach);
?>
<div class="container mt-5">
        <h3 class="mb-4">Sua Sách</h3>
        <form action="modules/qlsach/xuly.php?idsach=<?php echo $_GET['idsach']?>" method="POST" enctype="multipart/form-data">
            <?php
                while($row = mysqli_fetch_array($query_sach)){ ?>      
                
                <div class="mb-3">
                    <label for="tensach" class="form-label">Tên sách</label>
                    <input type="text" class="form-control" id="tensach" name="tensach" value="<?php echo $row['ten_sach']?>" required>
                </div>
                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh" accept="image/*" >
                    <img src="modules/qlsach/img/<?php echo $row['hinh_anh'] ?>" style="width: 150px;">
                </div>
                <div class="mb-3">
                    <label for="theloai" class="form-label">Thể loại</label>
                    <select class="form-select" id="theloai" name="theloai" required>
                        <?php
                            $sql_theloai = "SELECT * FROM the_loai";
                            $query_theloai = mysqli_query($conn, $sql_theloai);
                            while($row_theloai = mysqli_fetch_array($query_theloai)){ 
                                if($row_theloai['ma_the_loai'] == $row['ma_the_loai']){?>
                                    <option selected value="<?php echo $row_theloai['ma_the_loai']?>"><?php echo $row_theloai['ten_the_loai']?></option>
                                <?php 
                            }else{ ?>
                                    <option value="<?php echo $row_theloai['ma_the_loai']?>"><?php echo $row_theloai['ten_the_loai']?></option>
                           <?php } } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nam" class="form-label">Nam xuất bản</label>
                    <input type="year" class="form-control" id="nam" name="nam" value="<?php echo $row['nam_xuat_ban'];?>" required>
                </div>
                <div class="mb-3">
                    <label for="tacgia" class="form-label">Tác giả</label>
                    <select class="form-select" id="tacgia" name="tacgia" required>
                        <?php
                            $sql_tacgia = "SELECT * FROM tac_gia";
                            $query_tacgia = mysqli_query($conn, $sql_tacgia);
                            while($row_tacgia = mysqli_fetch_array($query_tacgia)){
                                if($row_tacgia['ma_tac_gia'] == $row['ma_tac_gia']){?>
                                    <option selected value="<?php echo $row_tacgia['ma_tac_gia']?>"><?php echo $row_tacgia['ten_tac_gia']?></option>
                            <?php 
                                }else{ ?>
                                    <option value="<?php echo $row_tacgia['ma_tac_gia']?>"><?php echo $row_tacgia['ten_tac_gia']?></option>
                       <?php } } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="nhaxuatban" class="form-label">Nhà xuất bản</label>
                    <select class="form-select" id="nhaxuatban" name="nhaxuatban" required>
                        <?php
                            $sql_nhaxuatban  = "SELECT * FROM nha_xuat_ban";
                            $query_nhaxuatban = mysqli_query($conn, $sql_nhaxuatban);
                            while($row_nhaxuatban = mysqli_fetch_array($query_nhaxuatban)){ 
                                if($row_nhaxuatban['ma_nha_xuat_ban'] == $row['ma_nha_xuat_ban']){?>
                                    <option selected value="<?php echo $row_nhaxuatban['ma_nha_xuat_ban']?>"><?php echo $row_nhaxuatban['ten_nha_xuat_ban']?></option>
                                <?php 
                                }else{ ?>
                                    <option value="<?php echo $row_nhaxuatban['ma_nha_xuat_ban']?>"><?php echo $row_nhaxuatban['ten_nha_xuat_ban']?></option>
                       <?php } } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="soluong" class="form-label">Số lượng</label>
                    <input type="number" class="form-control" id="soluong" name="soluong" min="1" value="<?php echo $row['so_luong']?>" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" name="sua">Lưu</button>
                </div>
            <?php } ?>    
        </form>
    </div>