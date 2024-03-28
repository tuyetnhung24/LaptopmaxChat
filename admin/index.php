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
        if (isset($_GET['ma_bl'])) {
            $ma_bl = $_GET['ma_bl'];
            delete_bl($ma_bl);
            $thongbao = "Xóa dữ liệu thành công!";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_bl = $_POST['ma_bl'];
            delete_bl_item($ma_bl);
            $thongbao = 'xóa dữ liệu thành công!';
        }
        $listbinhluan = list_binhluan();
        $VIEW = "binh-luan/list.php";
        break;
    default:
        echo "../404.php";
}

include './layout/header.php';
include $VIEW;
include './layout/footer.php';
