<?php
    $sql = "SELECT * FROM sach 
                    JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                    JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                    WHERE sach.ma_the_loai = '$_GET[idtheloai]'";
    $query = mysqli_query($conn, $sql);
?>

<div class="container-fluid mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <div class="col mb-4">
                <div class="card h-100 shadow rounded" 
                     onmouseover="this.style.transform='scale(1.05)';" 
                     onmouseout="this.style.transform='scale(1)';" 
                     style="transition: transform 0.3s;">
                    <a href="index.php?quanly=chitiet&id=<?php echo $row['ma_sach']; ?>" style="text-decoration: none; color: black;">
                        <div class="card-img-top overflow-hidden" style="height: 200px;">
                            <img src="admin/modules/qlsach/img/<?php echo $row['hinh_anh']; ?>" alt="Book cover" 
                                 class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 16px; font-weight: bold;"><?php echo $row['ten_sach']; ?></h5>
                            <p class="card-text text-muted mb-2" style="font-size: 14px;"><?php echo $row['ten_tac_gia']; ?></p>
                            <p class="card-text text-secondary" style="font-size: 14px;">Thể loại: <?php echo $row['ten_the_loai']; ?></p>
                        </div>
                    </a>
                    <div class="card-footer text-center bg-white">
                        <form action="user/main/xulygio.php?idsach=<?php echo $row['ma_sach'];?>" method="POST">
                            <button type="submit" name="themgio" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

