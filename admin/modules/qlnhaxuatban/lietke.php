<?php
    $sql_lietke = "SELECT * FROM nha_xuat_ban";
    $query_lietke = mysqli_query($conn, $sql_lietke);
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Nhà Xuất Bản
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên nhà xuất bản</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
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
                            <td><?php echo $i ; ?></td>
                            <td><?php echo $row['ten_nha_xuat_ban']?></td>
                            <td><?php echo $row['dia_chi']?></td>
                            <td><?php echo $row['so_dien_thoai']?></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="index.php?action=quanlynhaxuatban&query=sua&idnhaxuatban=<?php echo $row['ma_nha_xuat_ban'];?>">Sửa</a>
                                <a class="btn btn-danger btn-sm" href="modules/qlnhaxuatban/xuly.php?idnhaxuatban=<?php echo $row['ma_nha_xuat_ban'];?>">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>               
                </tbody>
            </table>
        </div>
    </div>
</div>