<?php
require_once "../model/binhluan.php";


$act = $_GET['act'] ?? "";
switch ($act) {
    case '':
        $title = "Tổng Hợp";
        $VIEW = './layout/home.php';
        break;
        //KHACH HANG
    case "listkh":
        $title = 'Danh sách khách hàng';
        if (isset($_GET['ma_kh'])) {
            $ma_kh = $_GET['ma_kh'];
            delete_kh($ma_kh);
            $thongbao = "Xóa dữ liệu thành công!";
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ma_kh = $_POST['ma_kh'];
            delete_kh_item($ma_kh);
            $thongbao = 'xóa dữ liệu thành công!';
        }
        $khachhang = load_all_kh();
        $VIEW = "khach-hang/list.php";
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
        case "listdh":
            $title = "Đơn hàng";
            if (isset($_GET['ma_dh'])) {
                $ma_dh = $_GET['ma_dh'];
                delete_dh($ma_dh);
                $thongbao = "Xóa dữ liệu thành công!";
            }
    
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $ma_dh = $_POST['ma_dh'];
                delete_dh_item($ma_dh);
                $thongbao = 'xóa dữ liệu thành công!';
            }
            $listdh = load_all_dh();
            // var_dump($listdh);
            $VIEW = "don-hang/list.php";
            break;
            case "listdhct":
                $title = "chi tiết đơn hàng";
                if (isset($_GET['ma_ct'])) {
                    $ma_ct = $_GET['ma_ct'];
                    delete_ct($ma_ct);
                    $thongbao = "Xóa dữ liệu thành công!";
                }
        
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $ma_ct = $_POST['ma_ct'];
                    delete_ctdh_item($ma_ct);
                    $thongbao = 'xóa dữ liệu thành công!';
                }
                $listct = load_all_ctdh();
                // var_dump($listdh);
                $VIEW = "chitietdonhang/list.php";
            break;
            case 'addsp':
                $title = "thêm sản phẩm";
                
                $loai = all_list_loai();
                $VIEW = "san-pham/add.php";
                break;
               
        
    default:
        echo "../404.php";
}

include './layout/header.php';
include $VIEW;
include './layout/footer.php';
