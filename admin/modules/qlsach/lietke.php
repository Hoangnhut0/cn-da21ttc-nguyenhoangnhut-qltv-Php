<?php
    $sql = "SELECT * FROM sach 
                JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                JOIN nha_xuat_ban ON sach.ma_nha_xuat_ban = nha_xuat_ban.ma_nha_xuat_ban";
    $query = mysqli_query($conn, $sql);
?>
<div class="card mb-4 shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fas fa-table me-2"></i> Quản Lý Sách
        </h5>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Tên Sách</th>
                    <th>Hình Ảnh</th>
                    <th>Thể Loại</th>
                    <th>Tác Giả</th>
                    <th>Nhà Xuất Bản</th>
                    <th>Số Lượng</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query)) {
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['ten_sach']; ?></td>
                    <td class="text-center">
                        <img src="modules/qlsach/img/<?php echo $row['hinh_anh']; ?>" alt="Hình ảnh sách" class="img-thumbnail" width="70" height="90">
                    </td>
                    <td><?php echo $row['ten_the_loai']; ?></td>
                    <td><?php echo $row['ten_tac_gia']; ?></td>
                    <td><?php echo $row['ten_nha_xuat_ban']; ?></td>
                    <td class="text-center"><?php echo $row['so_luong']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning me-2" href="?action=quanlysach&query=sua&idsach=<?php echo $row['ma_sach']; ?>">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-sm btn-danger" href="modules/qlsach/xuly.php?idsach=<?php echo $row['ma_sach']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sách này?')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
