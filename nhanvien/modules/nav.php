<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark shadow">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3 fw-bold text-uppercase" href="index.php">
        <i class="fas fa-tools me-2"></i> Admin Dashboard
    </a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control border-0 shadow-sm" type="text" placeholder="Search..." aria-label="Search" aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <!-- User Dropdown -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="navbarDropdown">
                <li>
                    <a class="dropdown-item" href="#!">
                        <i class="fas fa-cogs me-2"></i>Settings
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="#!">
                        <i class="fas fa-list me-2"></i>Activity Log
                    </a>
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                    <a class="dropdown-item text-danger" href="#!">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
