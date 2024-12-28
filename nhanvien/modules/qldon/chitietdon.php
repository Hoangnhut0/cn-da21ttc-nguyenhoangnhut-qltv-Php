<?php
    $code = $_GET['code'];
    $sql_lietke = "SELECT * FROM dat_sach_chi_tiet, sach WHERE dat_sach_chi_tiet.ma_sach= sach.ma_sach AND dat_sach_chi_tiet.code_cart='".$code."' ORDER BY dat_sach_chi_tiet.ma_dat_sach_chi_tiet DESC";
    $query_lietke = mysqli_query($conn, $sql_lietke);

    $sql_ten = "SELECT * FROM dat_sach, user WHERE dat_sach.ma_user = user.ma_user ORDER BY dat_sach.ma_dat_sach";
    $query_ten = mysqli_query($conn, $sql_ten);
    $row_ten = mysqli_fetch_assoc($query_ten);
?> 
<div class="card mb-4">
    <div class="card-body">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Đơn hàng của: <?php echo $row_ten['hoten_user']; ?>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Mã đơn</th>
                        <th>Tên sách</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                        while($row = mysqli_fetch_array($query_lietke)){
                            $i++
                    ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $row['code_cart'];?></td>
                            <td><?php echo $row['ten_sach']; ?></td>
                            
                        </tr>
                    <?php }?>
                </tbody>
            </table>
            <div class="card-body">
            <!-- Nút quay lại -->
            <div class="mb-3">
                <a href="javascript:history.back()" class="btn btn-secondary">Quay lại</a>
            </div>
        </div>
    </div>
</div>