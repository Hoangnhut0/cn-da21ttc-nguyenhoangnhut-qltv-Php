<?php
    $sql = "SELECT * FROM user ";
    $query = mysqli_query($conn, $sql);
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh sách người dùng
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Địa chỉ</th>
                        <th>Tên Đang nhập</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query)){
                            $i++;?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['hoten_user']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['so_dien_thoai']?></td>
                                <td><?php echo $row['dia_chi']?></td>
                                <td><?php echo $row['taikhoan']?></td>
                                <td>
                                    <a class="btn btn-danger btn-sm" type="submit" href="modules/qlnguoidung/xuly.php?idnguoidung=<?php echo $row['ma_user']?>">Xóa</a>
                                </td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>