<?php
    $sql = "SELECT * FROM nguoi_dung WHERE vai_tro = 'nhan_vien'";
    $query = mysqli_query($conn, $sql);
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Danh sách nhân viên
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
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
                                <td><?php echo $row['ho_ten']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['so_dien_thoai']?></td>
                                <td><?php echo $row['ten_dang_nhap']?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="index.php?action=quanlynguoidung&query=sua&idnguoidung=<?php echo $row['ma_nguoi_dung']?>">Sửa</a>
                                    <a class="btn btn-danger btn-sm" type="submit" href="modules/qlnguoidung/xuly.php?idnguoidung=<?php echo $row['ma_nguoi_dung']?>">Xóa</a>
                                </td>
                            </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>