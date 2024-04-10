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
                $error = "";
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    extract($_POST);
                    if(($_POST['gia_sp']>0)&&($_POST['so_luong'])>0){
                        $file = $_FILES['hinh_sp'];
                        $hinh_sp = $file['name'];
                        move_uploaded_file($file['tmp_name'], "../views/imgs/" . $hinh_sp);
                        add_sanpham($ten_sp, $gia_sp,$so_luong, $hinh_sp, $mo_ta, $ma_loai);
                        header("location: ?act=sanpham");
                        die;
                    }
                    else{
                        $error= "Phải lớn hơn 0";
                    }
                  
                }
               
                $loai = all_list_loai();
                $VIEW = "san-pham/add.php";
                break;
                case 'updatesp':
                    $title = "Update sản phẩm";
                    case 'updatesp':
                        $title = "Update sản phẩm";
                        if ($_SERVER['REQUEST_METHOD'] === "POST") {
                            extract($_POST);
                            // var_dump($_POST);die;
                            $file = $_FILES['hinh_sp'];
                            //Lấy tên ảnh
                            if ($file['size'] > 0) {
                                $hinh_sp = $file['name'];
                                //Upload ảnh
                                move_uploaded_file($file['tmp_name'], "../views/images/" . $hinh_sp);
                            } else {
                                $hinh_sp = $_POST['hinh_sp'];
                            }
                            update_sp($ma_sp, $ten_sp, $gia_sp, $hinh_sp, $mo_ta, $ma_loai);
                
                            $thongbao = "Cập nhập dữ liệu thành công";
                        }
                        if (isset($_GET['ma_sp'])) {
                            $ma_sp = $_GET['ma_sp'];
                            $sp = list_one_sp($ma_sp);
                            extract($sp);
                            $VIEW = "san-pham/update.php";
                        }
                        $loai = all_list_loai();
                        
                        break;
                    $loai = all_list_loai();
                    
                    break;
                  
    default:
        echo "../404.php";
}

include './layout/header.php';
include $VIEW;
include './layout/footer.php';
