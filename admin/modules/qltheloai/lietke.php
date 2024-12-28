<?php
    $sql = "SELECT * FROM the_loai";
    $query = mysqli_query($conn, $sql);
?>

<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            thể loại sách
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>thể loại</th>
                        <th>Thao tác</th>
                    </tr>                                
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query)){
                            $i++;
                        ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row['ten_the_loai'];?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="?action=quanlytheloai&query=sua&idtheloai=<?php echo $row['ma_the_loai'] ?>">Sửa</a>
                                    <a class="btn btn-danger btn-sm" href="modules/qltheloai/xuly.php?idtheloai=<?php echo $row['ma_the_loai'] ?>">Xóa</a>
                                </td>
                            </tr>  
                    <?php } ?>                 
                </tbody>
            </table>
        </div>
    </div>
</div>