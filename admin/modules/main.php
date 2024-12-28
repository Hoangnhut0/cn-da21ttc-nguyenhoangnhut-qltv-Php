<div id="layoutSidenav_content">
    <div class="card mb-4">
        <div class="card-body">
            <main>
                <?php
                    if(isset($_GET['action']) && $_GET['query']){
                            $tam = $_GET['action'];
                            $query = $_GET['query'];
                        }else{
                            $tam = '';
                            $query = '';
                        }
                        if($tam == 'quanlysach' && $query == 'xem'){
                            include('modules/qlsach/lietke.php');
                        }elseif($tam == 'quanlysach' && $query == 'them'){
                            include('modules/qlsach/them.php');
                        }elseif($tam == 'quanlysach' && $query == 'sua'){
                            include('modules/qlsach/sua.php');
                        }elseif($tam == 'quanlytheloai' && $query == 'xem'){
                            include('modules/qltheloai/lietke.php');
                        }elseif($tam == 'quanlytheloai' && $query == 'them'){
                            include('modules/qltheloai/them.php');
                        }elseif($tam == 'quanlytheloai' && $query == 'sua'){
                            include('modules/qltheloai/sua.php');
                        }elseif($tam == 'quanlytacgia' && $query == 'xem'){
                            include('modules/qltacgia/lietke.php');
                        }elseif($tam == 'quanlytacgia' && $query == 'them'){
                            include('modules/qltacgia/them.php');
                        }elseif($tam == 'quanlytacgia' && $query == 'sua'){
                            include('modules/qltacgia/sua.php');
                        }elseif($tam == 'quanlynhaxuatban' && $query == 'xem'){
                            include('modules/qlnhaxuatban/lietke.php');
                        }elseif($tam == 'quanlynhaxuatban' && $query == 'them'){
                            include('modules/qlnhaxuatban/them.php');
                        }elseif($tam == 'quanlynhaxuatban' && $query == 'sua'){
                            include('modules/qlnhaxuatban/sua.php');
                        }elseif($tam == 'quanlynguoidung' && $query == 'xem'){
                            include('modules/qlnguoidung/taonhanvien.php');
                            include('modules/qlnguoidung/danhsachnhanvien.php');
                        }elseif($tam == 'quanlynguoidung' && $query == 'sua'){
                            include('modules/qlnguoidung/sua.php');
                        }elseif($tam == 'quanlynguoidung' && $query == 'xemuser'){
                            include('modules/qlnguoidung/danhsachuser.php');
                        }
                        else{
                            include('dashboard.php');
                        }
                ?>
            </main>
        </div>
    </div>
</div>