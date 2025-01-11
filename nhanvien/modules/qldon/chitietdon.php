<?php
    $code = $_GET['code'];
    $sql_lietke = "SELECT * FROM dat_sach_chi_tiet, sach WHERE dat_sach_chi_tiet.ma_sach= sach.ma_sach AND dat_sach_chi_tiet.code_cart='".$code."' ORDER BY dat_sach_chi_tiet.ma_dat_sach_chi_tiet DESC";
    $query_lietke = mysqli_query($conn, $sql_lietke);

    $sql_ten = "SELECT * FROM dat_sach, user WHERE dat_sach.ma_user = user.ma_user AND dat_sach.code_cart='".$code."'";
    $query_ten = mysqli_query($conn, $sql_ten);
    $row_ten = mysqli_fetch_assoc($query_ten);
?> 
<div class="container mt-4">
    <!-- Card Wrapper -->
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0 d-flex align-items-center">
                <i class="fas fa-book-reader me-2"></i>
                Đơn mượn sách của: <span class="ms-2 fw-bold"><?php echo $row_ten['hoten_user']; ?></span>
            </h5>
        </div>
        <div class="card-body">
            <!-- Bảng -->
            <div class="table-responsive">
                <table id="datatablesSimple" class="table table-striped table-hover table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>#</th>
                            <th>Mã Đơn</th>
                            <th>Tên Sách</th>
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
                            <td class="text-center"><?php echo $row['code_cart']; ?></td>
                            <td><?php echo $row['ten_sach']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- Nút Quay Lại -->
            <div class="d-flex justify-content-end mt-4">
                <a href="javascript:history.back()" class="btn btn-secondary btn-sm shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i> Quay lại
                </a>
            </div>
        </div>
    </div>
</div>
