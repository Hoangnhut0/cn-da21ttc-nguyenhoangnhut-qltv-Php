<?php
    $sql = "SELECT * FROM the_loai";
    $query = mysqli_query($conn, $sql);
?>

<div class="card mb-4 shadow-lg">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">
            <i class="fas fa-table me-2"></i> Quản Lý Thể Loại Sách
        </h5>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Thể Loại</th>
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
                    <td><?php echo $row['ten_the_loai']; ?></td>
                    <td class="text-center">
                        <a class="btn btn-sm btn-warning me-2" href="?action=quanlytheloai&query=sua&idtheloai=<?php echo $row['ma_the_loai']; ?>">
                            <i class="fas fa-edit"></i> Sửa
                        </a>
                        <a class="btn btn-sm btn-danger" href="modules/qltheloai/xuly.php?idtheloai=<?php echo $row['ma_the_loai']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa thể loại này?')">
                            <i class="fas fa-trash-alt"></i> Xóa
                        </a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
