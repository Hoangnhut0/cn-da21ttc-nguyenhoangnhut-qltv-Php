<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        
            <?php
                if(isset($_GET['quanly'])){
                    $tam = $_GET['quanly'];
                }else{
                    $tam = '';
                }
                if($tam == 'chitiet'){
                   include('main/chitiet.php');
                }elseif($tam == 'gio'){
                    include('main/gio.php');
                }elseif($tam == 'theloai'){
                    include('main/theloai.php');
                }elseif($tam == 'tacgia'){
                    include('main/tacgia.php');
                }elseif($tam == 'sachdamuon'){
                    include('main/sachdamuon.php');
                }elseif($tam == 'canhan'){
                    include('main/canhan.php');
                }elseif($tam == 'suathongtin'){
                    include('main/suathongtin.php');
                }else{
                    include('main/index.php');
                }
            ?>

    </div>
</section>