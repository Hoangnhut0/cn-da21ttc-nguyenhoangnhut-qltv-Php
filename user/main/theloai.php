<?php
    $sql = "SELECT * FROM sach 
                    JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                    JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                    WHERE sach.ma_the_loai = '$_GET[idtheloai]'";
    $query = mysqli_query($conn, $sql);
?>

<div class="container mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
        <?php while($row = mysqli_fetch_assoc($query)) { ?>
            <div class="col mb-3" 
                onmouseover="this.style.transform='scale(1.05)';" 
                onmouseout="this.style.transform='scale(1)';" 
                style="transition: transform 0.2s;">
                
                <a href="index.php?quanly=chitiet&id=<?php echo $row['ma_sach']; ?>" style="text-decoration: none; color: black;">
                    <div class="card h-100" style="padding: 10px;">
                        <div style="width: 100%; height: 200px; overflow: hidden;">
                            <img src="admin/modules/qlsach/img/<?php echo $row['hinh_anh']; ?>" alt="Book cover" 
                                 style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div style="padding: 10px; text-align: center;">
                            <h5 style="font-size: 16px; font-weight: bold;"><?php echo $row['ten_sach']; ?></h5>
                            <p style="margin-bottom: 5px; font-size: 14px; color: gray;"><?php echo $row['ten_tac_gia']; ?></p>
                            <p style="font-size: 14px;">Thể loại: <?php echo $row['ten_the_loai']; ?></p>
                        </div>
                        <div style="text-align: center; padding: 10px;">
                            <a href="#" style="padding: 5px 10px; border: 1px solid #000; border-radius: 5px;">
                                <i class="bi bi-plus"></i>
                            </a>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>

