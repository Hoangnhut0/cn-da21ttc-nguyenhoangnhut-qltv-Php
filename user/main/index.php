<?php
// Lấy từ khóa tìm kiếm từ URL
$search_keyword = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : "";

// Lấy trang hiện tại từ URL, mặc định là 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page < 1 ? 1 : $page;

// Số lượng sách mỗi trang
$books_per_page = 8;

// Tính toán OFFSET
$offset = ($page - 1) * $books_per_page;

// Tạo câu truy vấn SQL
$sql = "SELECT * FROM sach 
        JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
        JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
        WHERE sach.ten_sach LIKE '%$search_keyword%' 
           OR tac_gia.ten_tac_gia LIKE '%$search_keyword%' 
           OR the_loai.ten_the_loai LIKE '%$search_keyword%'
        LIMIT $books_per_page OFFSET $offset";

$query = mysqli_query($conn, $sql);

// Tính tổng số sách để tạo phân trang
$total_books_sql = "SELECT COUNT(*) as total FROM sach 
                    JOIN tac_gia ON sach.ma_tac_gia = tac_gia.ma_tac_gia
                    JOIN the_loai ON sach.ma_the_loai = the_loai.ma_the_loai
                    WHERE sach.ten_sach LIKE '%$search_keyword%' 
                       OR tac_gia.ten_tac_gia LIKE '%$search_keyword%' 
                       OR the_loai.ten_the_loai LIKE '%$search_keyword%'";
$total_books_result = mysqli_query($conn, $total_books_sql);
$total_books_row = mysqli_fetch_assoc($total_books_result);
$total_books = $total_books_row['total'];

// Tính tổng số trang
$total_pages = ceil($total_books / $books_per_page);
?>

<div class="container-fluid mt-5">
    <div class="row gx-4 gx-lg-5 row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center">
        <?php while ($row = mysqli_fetch_assoc($query)) { ?>
            <div class="col mb-4">
                <div class="card h-100 shadow rounded" 
                     onmouseover="this.style.transform='scale(1.05)';" 
                     onmouseout="this.style.transform='scale(1)';" 
                     style="transition: transform 0.3s;">
                    <a href="index.php?quanly=chitiet&id=<?php echo $row['ma_sach']; ?>" style="text-decoration: none; color: black;">
                        <div class="card-img-top overflow-hidden" style="height: 200px;">
                            <img src="admin/modules/qlsach/img/<?php echo $row['hinh_anh']; ?>" alt="Book cover" 
                                 class="img-fluid" style="width: 100%; height: 100%; object-fit: contain;">
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title" style="font-size: 16px; font-weight: bold;"><?php echo $row['ten_sach']; ?></h5>
                            <p class="card-text text-muted mb-2" style="font-size: 14px;"><?php echo $row['ten_tac_gia']; ?></p>
                            <p class="card-text text-secondary" style="font-size: 14px;">Thể loại: <?php echo $row['ten_the_loai']; ?></p>
                        </div>
                    </a>
                    <div class="card-footer text-center bg-white">
                        <form action="user/main/xulygio.php?idsach=<?php echo $row['ma_sach'];?>" method="POST">
                            <button type="submit" name="themgio" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Phân trang -->
<nav aria-label="Page navigation example" class="mt-4">
    <ul class="pagination justify-content-center">
        <?php if ($page > 1) { ?>
            <li class="page-item">
                <a class="page-link" href="?search=<?php echo $search_keyword; ?>&page=<?php echo $page - 1; ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php } ?>
        <?php for ($i = 1; $i <= $total_pages; $i++) { ?>
            <li class="page-item <?php echo $i == $page ? 'active' : ''; ?>">
                <a class="page-link" href="?search=<?php echo $search_keyword; ?>&page=<?php echo $i; ?>">
                    <?php echo $i; ?>
                </a>
            </li>
        <?php } ?>
        <?php if ($page < $total_pages) { ?>
            <li class="page-item">
                <a class="page-link" href="?search=<?php echo $search_keyword; ?>&page=<?php echo $page + 1; ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>