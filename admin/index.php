<?php
require_once "../model/binhluan.php";


$act = $_GET['act'] ?? "";
switch ($act) {
    case '':
        $title = "Tổng Hợp";
        $VIEW = './layout/home.php';
        break;
    case 'binhluan':
        $title = "bình luận";

        $listbinhluan = list_binhluan();
        $VIEW = "binh-luan/list.php";
        break;
    default:
        echo "../404.php";
}

include './layout/header.php';
include $VIEW;
include './layout/footer.php';
