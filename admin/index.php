<?php
  session_start();
   ob_start();
//    Kết nối database
    include __DIR__ . '/../config/db_connect.php';
    

    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'thongke': 
                 include 'thongke.php';
                break;
            case 'ql_donhang': 
                //  include 'ql_donhang.php';
                break;
            case 'qp_sanpham': 
                //  include 'ql_sanpham.php';
                break;
            case 'ql_nhanvien': 
                //  include 'ql_nhanvien.php';
                break;
            case 'ql_banhang': 
                //  include 'ql_banhang.php';
                break;
            case 'quyentruycap': 
                //  include 'quyentruycap.php';
                break;
            case 'caidat': 
                //  include 'caidat.php';
                break;
            default: 
                include 'index.php';
                break;
        }
    }


    include 'view/header.php';

    ?>


   <?php include 'view/left_side.php' ?>
  
   <script src="../js/admin.js"></script>
   