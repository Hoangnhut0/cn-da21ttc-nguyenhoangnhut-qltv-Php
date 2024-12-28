<?php
    $sql = "SELECT * FROM sach 
                JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                JOIN nha_xuat_ban ON sach.ma_nha_xuat_ban = nha_xuat_ban.ma_nha_xuat_ban";
    $query = mysqli_query($conn, $sql);
?>
<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tất cả sách
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên sách</th>
                        <th>Hình ảnh</th>
                        <th>Thể loại</th>
                        <th>Tác giả</th>
                        <th>Nhà xuất bản</th>
                        <th>số luong</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query)){
                            $i++;?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $row['ten_sach']?></td>
                                <td>
                                    <img src="modules/qlsach/img/<?php echo $row['hinh_anh']?>" alt="Hình ảnh sách" width="70" height="90">
                                </td>
                                <td><?php echo $row['ten_the_loai']?></td>
                                <td><?php echo $row['ten_tac_gia']?></td>
                                <td><?php echo $row['ten_nha_xuat_ban']?></td>
                                <td><?php echo $row['so_luong']?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="?action=quanlysach&query=sua&idsach=<?php echo $row['ma_sach']?>">Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="modules/qlsach/xuly.php?idsach=<?php echo $row['ma_sach']?>">Xóa</a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>