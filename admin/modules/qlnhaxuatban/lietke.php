<?php
    $sql_lietke = "SELECT * FROM nha_xuat_ban";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>

<div class="card mb-4 shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fas fa-table me-2"></i> Quản Lý Nhà Xuất Bản
        </h5>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Tên Nhà Xuất Bản</th>
                    <th>Địa Chỉ</th>
                    <th>Số Điện Thoại</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    while ($row = mysqli_fetch_array($query_lietke)) {
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['ten_nha_xuat_ban']; ?></td>
                    <td><?php echo $row['dia_chi']; ?></td>
                    <td><?php echo $row['so_dien_thoai']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning me-2" href="index.php?action=quanlynhaxuatban&query=sua&idnhaxuatban=<?php echo $row['ma_nha_xuat_ban']; ?>">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-sm btn-danger" href="modules/qlnhaxuatban/xuly.php?idnhaxuatban=<?php echo $row['ma_nha_xuat_ban']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà xuất bản này?')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
