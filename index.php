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

    case 'search':
        $title = "sản phẩm tìm kiếm";
        if (isset($_POST['kyw']) && (['kyw'] != "")) {
            $kyw = $_POST['kyw'];
        } else {
            $kyw = "";
        }
        if (isset($_GET['ma_loai']) && ($_GET['ma_loai'] > 0)) {
            $ma_loai = $_GET['ma_loai'];
        } else {
            $ma_loai = 0;
        }
        $listsanpham = loadall_sanpham("$kyw", $ma_loai); //lọc kyw
        $VIEW = './views/layout/searchsp.php';
        break;

    case 'sanpham':
        $title = "Sản phẩm mới";
        $sanpham = all_list_sanpham();
        $VIEW = 'views/layout/sanpham.php';
        break;

    case "cart":
        if (isset($_GET['ma_sp'])) {
            $ma_sp = $_GET['ma_sp'] ?? '';
            $sanpham =  list_one_sp($ma_sp);
            add_to_cart($sanpham['ma_sp'], $sanpham['ten_sp'], $sanpham['gia_sp'], $sanpham['so_luong'], $sanpham['hinh_sp']);
        }
        header("location: " . $_SERVER['HTTP_REFERER']);
        break;

    default:
        echo "./404.php";
        break;
}

include './views/layout/header.php';

include $VIEW;
include './views/layout/footer.php';
