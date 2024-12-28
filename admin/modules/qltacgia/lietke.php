<?php
    $sql_lietke = "SELECT * FROM tac_gia";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>
<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Tác giả
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên tác giả</th>
                        <th>Tiểu su</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query_lietke)){
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['ten_tac_gia'];?></td>
                                <td><?php echo $row['tieu_su'];?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="?action=quanlytacgia&query=sua&idtacgia=<?php echo $row['ma_tac_gia'];?>">Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="modules/qltacgia/xuly.php?idtacgia=<?php echo $row['ma_tac_gia'];?>">Xóa</a>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
