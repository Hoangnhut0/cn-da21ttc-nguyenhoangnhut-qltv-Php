<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>

            <!-- Tác giả -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAuthors" aria-expanded="false" aria-controls="collapseAuthors">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Tác giả
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseAuthors" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="index.php?action=quanlytacgia&query=xem">Danh sách</a>
                    <a class="nav-link" href="?action=quanlytacgia&query=them">Thêm tác giả</a>
                </nav>
            </div>

            <!-- Nhà xuất bản -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePublishers" aria-expanded="false" aria-controls="collapsePublishers">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Nhà xuất bản
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePublishers" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="index.php?action=quanlynhaxuatban&query=xem">Danh sách</a>
                    <a class="nav-link" href="?action=quanlynhaxuatban&query=them">Thêm nhà xuất bản</a>
                </nav>
            </div>

            <!-- Thể loại -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategories" aria-expanded="false" aria-controls="collapseCategories">
                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                Thể loại
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseCategories" aria-labelledby="headingThree" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="index.php?action=quanlytheloai&query=xem">Danh sách</a>
                    <a class="nav-link" href="?action=quanlytheloai&query=them">Thêm thể loại</a>
                </nav>
            </div>

            <!-- Sách -->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseBooks" aria-expanded="false" aria-controls="collapseBooks">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Sách
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseBooks" aria-labelledby="headingFour" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="index.php?action=quanlysach&query=xem">Danh sách</a>
                    <a class="nav-link" href="?action=quanlysach&query=them">Thêm sách</a>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="index.php?action=quanlynguoidung&query=xem">
                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                Nhân viên
            </a>
            <a class="nav-link" href="index.php?action=quanlynguoidung&query=xemuser">
                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                Nguoi dùng 
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
