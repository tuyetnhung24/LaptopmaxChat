<?php
session_start();
include "./model/pdo.php";
include "./model/san_pham.php";



$act = $_GET['act'] ?? "";
switch ($act) {
    case "":
        $title = "Trang chủ";
        $VIEW = "./views/layout/home.php";
        break;

    case 'sanpham':
        $title = "Sản phẩm mới";
        $sanpham = all_list_sanpham();
        $VIEW = 'views/layout/sanpham.php';
        break;


    default:
        echo "./404.php";
        break;
}

include './views/layout/header.php';

include $VIEW;
include './views/layout/footer.php';
