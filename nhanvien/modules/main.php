<?php
    if(isset($_GET['action']) && $_GET['query']){
            $tam = $_GET['action'];
            $query = $_GET['query'];
        }else{
            $tam = '';
            $query = '';
        }
        if($tam == 'quanlydacsach' && $query = 'xem'){
            include('modules/qldon/donmuonsach.php');
        }elseif($tam == 'don' && $query = 'xemdon'){
            include('modules/qldon/chitietdon.php');
        }elseif($tam == 'phieumuon' && $query = 'xemphieu'){
            include('modules/qldon/phieumuon.php');
        }
        else{
            include('dashboard.php');
        }
?>