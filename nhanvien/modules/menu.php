<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark shadow" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- Core Section -->
                <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Core</div>
                <a class="nav-link text-white" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt fa-lg"></i></div>
                    Dashboard
                </a>

                <!-- Interface Section -->
                <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Interface</div>
                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-reader fa-lg"></i></div>
                    Đơn Mượn Sách
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link text-white-50" href="index.php?action=quanlydacsach&query=xem">Xem</a>
                        <a class="nav-link text-white-50" href="index.php?action=phieumuon&query=xemphieu">Phiếu Mượn</a>
                    </nav>
                </div>

                <!-- Pages Section -->
                <a class="nav-link collapsed text-white" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt fa-lg"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <!-- Authentication Pages -->
                        <a class="nav-link collapsed text-white-50" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-white-50" href="login.html">Login</a>
                                <a class="nav-link text-white-50" href="register.html">Register</a>
                                <a class="nav-link text-white-50" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <!-- Error Pages -->
                        <a class="nav-link collapsed text-white-50" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link text-white-50" href="401.html">401 Page</a>
                                <a class="nav-link text-white-50" href="404.html">404 Page</a>
                                <a class="nav-link text-white-50" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>

                <!-- Addons Section -->
                <div class="sb-sidenav-menu-heading text-uppercase text-secondary fw-bold">Addons</div>
                <a class="nav-link text-white" href="charts.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area fa-lg"></i></div>
                    Charts
                </a>
                <a class="nav-link text-white" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table fa-lg"></i></div>
                    Tables
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="sb-sidenav-footer bg-secondary text-white">
            <div class="small">Logged in as:</div>
            Nhân Viên
        </div>
    </nav>
</div>
