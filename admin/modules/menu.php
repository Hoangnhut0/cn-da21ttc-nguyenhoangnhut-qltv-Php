<nav class="sb-sidenav accordion sb-sidenav-dark bg-dark text-white" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <!-- Core -->
            <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Core</div>
            <a class="nav-link text-white" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-lg"></i></div>
                Dashboard
            </a>

            <!-- Interface -->
            <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Interface</div>

            <!-- Tác giả -->
            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAuthors" aria-expanded="false" aria-controls="collapseAuthors">
                <div class="sb-nav-link-icon"><i class="fas fa-users fa-lg"></i></div>
                Tác giả
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAuthors" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link text-white-50" href="index.php?action=quanlytacgia&query=xem">Danh sách</a>
                    <a class="nav-link text-white-50" href="?action=quanlytacgia&query=them">Thêm tác giả</a>
                </nav>
            </div>

            <!-- Nhà xuất bản -->
            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePublishers" aria-expanded="false" aria-controls="collapsePublishers">
                <div class="sb-nav-link-icon"><i class="fas fa-building fa-lg"></i></div>
                Nhà xuất bản
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePublishers" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link text-white-50" href="index.php?action=quanlynhaxuatban&query=xem">Danh sách</a>
                    <a class="nav-link text-white-50" href="?action=quanlynhaxuatban&query=them">Thêm nhà xuất bản</a>
                </nav>
            </div>

            <!-- Thể loại -->
            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                <div class="sb-nav-link-icon"><i class="fas fa-list fa-lg"></i></div>
                Thể loại
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCategories" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link text-white-50" href="index.php?action=quanlytheloai&query=xem">Danh sách</a>
                    <a class="nav-link text-white-50" href="?action=quanlytheloai&query=them">Thêm thể loại</a>
                </nav>
            </div>

            <!-- Sách -->
            <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBooks" aria-expanded="false" aria-controls="collapseBooks">
                <div class="sb-nav-link-icon"><i class="fas fa-book fa-lg"></i></div>
                Sách
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBooks" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link text-white-50" href="index.php?action=quanlysach&query=xem">Danh sách</a>
                    <a class="nav-link text-white-50" href="?action=quanlysach&query=them">Thêm sách</a>
                </nav>
            </div>

            <!-- Addons -->
            <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Addons</div>
            <a class="nav-link text-white" href="index.php?action=quanlynguoidung&query=xem">
                <div class="sb-nav-link-icon"><i class="fas fa-user-tie fa-lg"></i></div>
                Nhân viên
            </a>
            <a class="nav-link text-white" href="index.php?action=quanlynguoidung&query=xemuser">
                <div class="sb-nav-link-icon"><i class="fas fa-users fa-lg"></i></div>
                Người dùng
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer bg-secondary text-white">
        <div class="small">Đăng nhập với:</div>
        Admin
    </div>
</nav>
