<?php
    $sql_lietke = "SELECT * FROM tac_gia";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<div class="card mb-4 shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fas fa-table me-2"></i> Quản Lý Tác Giả
        </h5>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Tên Tác Giả</th>
                    <th>Tiểu Sử</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $i = 0;
                    while($row = mysqli_fetch_array($query_lietke)){
                        $i++;
                ?>
                <tr>
                    <td class="text-center"><?php echo $i; ?></td>
                    <td><?php echo $row['ten_tac_gia']; ?></td>
                    <td><?php echo $row['tieu_su']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning me-2" href="?action=quanlytacgia&query=sua&idtacgia=<?php echo $row['ma_tac_gia']; ?>">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-sm btn-danger" href="modules/qltacgia/xuly.php?idtacgia=<?php echo $row['ma_tac_gia']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa tác giả này?')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
