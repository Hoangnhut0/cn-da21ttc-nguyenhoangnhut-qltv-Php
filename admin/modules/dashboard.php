<?php


// Truy vấn số lượng người dùng
$sql_user_count = "SELECT COUNT(*) AS total_users FROM nguoi_dung";
$result_user_count = mysqli_query($conn, $sql_user_count);
$total_users = mysqli_fetch_assoc($result_user_count)['total_users'];

// Truy vấn số lượng sách
$sql_book_count = "SELECT COUNT(*) AS total_books FROM sach";
$result_book_count = mysqli_query($conn, $sql_book_count);
$total_books = mysqli_fetch_assoc($result_book_count)['total_books'];

// Truy vấn số lượng nhân viên (dựa trên vai_tro)
$sql_staff_count = "SELECT COUNT(*) AS total_staff FROM nguoi_dung WHERE vai_tro = 'nhan_vien'";
$result_staff_count = mysqli_query($conn, $sql_staff_count);
$total_staff = mysqli_fetch_assoc($result_staff_count)['total_staff'];

// Truy vấn số lượng nhà xuất bản
$sql_publisher_count = "SELECT COUNT(*) AS total_publishers FROM nha_xuat_ban";
$result_publisher_count = mysqli_query($conn, $sql_publisher_count);
$total_publishers = mysqli_fetch_assoc($result_publisher_count)['total_publishers'];

?>

<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="row">
        <!-- Số lượng người dùng -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">Số lượng người dùng</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="fs-5"><?php echo $total_users; ?> người dùng</span>
                    <div class="small text-white"><i class="fas fa-users"></i></div>
                </div>
            </div>
        </div>
        <!-- Số lượng nhân viên -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">Số lượng nhân viên</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="fs-5"><?php echo $total_staff; ?> nhân viên</span>
                    <div class="small text-white"><i class="fas fa-user-tie"></i></div>
                </div>
            </div>
        </div>
        <!-- Số lượng nhà xuất bản -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">Số lượng nhà xuất bản</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="fs-5"><?php echo $total_publishers; ?> nhà xuất bản</span>
                    <div class="small text-white"><i class="fas fa-building"></i></div>
                </div>
            </div>
        </div>
        <!-- Số lượng sách -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">Số lượng sách</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="fs-5"><?php echo $total_books; ?> sách</span>
                    <div class="small text-white"><i class="fas fa-book"></i></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Biểu đồ khu vực -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Area Chart Example
                </div>
                <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
        <!-- Biểu đồ cột -->
        <div class="col-xl-6">
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-1"></i>
                    Bar Chart Example
                </div>
                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
            </div>
        </div>
    </div>                    
</div>
