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
        // if (isset($_GET['ma_sp'])) {
        //     $ma_sp = $_GET['ma_sp'] ?? '';
        //     $sanpham =  list_one_sp($ma_sp);
        //     add_to_cart($sanpham['ma_sp'], $sanpham['ten_sp'], $sanpham['gia_sp'], $sanpham['so_luong'], $sanpham['hinh_sp']);
        // }
        // header("location: " . $_SERVER['HTTP_REFERER']);
        break;
    case "viewdonhang":
        $title = "Đơn hàng";
        if (isset($_SESSION['cart'])) {
            $carts = $_SESSION['cart'];
            $sums = sum_cart();
        }

        // var_dump($carts);
        // die;

        $VIEW = "views/layout/cart/viewdonhang.php";

        break;
    case 'xoacart':
        if (isset($_GET['ma_sp'])) {
            $xoacart = $_GET['ma_sp'];
            if (isset($_SESSION['cart'][$xoacart])) {
                unset($_SESSION['cart'][$xoacart]);
            }
            header('location: ?act=viewdonhang');

            break;
        }
    case 'donhang':
        if (isset($_SESSION['ten_kh'])) {
            $title = 'Thông tin thanh toán';
            $carts = $_SESSION['cart'];
            $sum = sum_cart();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $ten_dh = $_POST['ten_kh'];
                $email_dh = $_POST['email'];
                $diachi_dh = $_POST["dia_chi"];
                $sodt_dh = $_POST['dien_thoai'];
                $dh_pttt = isset($_POST['dh_pttt']) ? ($_POST['dh_pttt'] === 'one' ? "Thanh toán trực tiếp" : ($_POST['dh_pttt'] === 'two' ? "Thanh toán chuyển khoản" : "không có lựa chọn")) : "";
                $tong_tien = sum_cart();
                $ngay_dh = date('d/m/Y h:i:sa');
                $ma_dh = inser_donhang($ten_dh, $diachi_dh, $sodt_dh, $email_dh, $dh_pttt, $tong_tien, $ngay_dh);
                // Lưu thông tin chi tiết đơn hàng vào CSDL
                foreach ($_SESSION['cart'] as $cart) {
                    // Đảm bảo hàm insert_ct_donhang() đã được định nghĩa đúng.
                    insert_ct_donhang($_SESSION['ten_kh']['ma_kh'], $ma_dh, $cart['ma_sp'], $cart['hinh_sp'], $cart['so_luong'], $cart['gia_sp'], $cart['thanh_tien'], $cart['mau']);
                }

                //Xóa giỏ hàng sau khi xử lý đơn hàng
                $carts = $_SESSION['cart'];
                $_SESSION['cart'] = [];
                header('location: ?act=donhangconfirm&ma_dh=' . $ma_dh);
            }
            $VIEW = './views/layout/cart/donhang.php';
        } else {
            echo "<script>
                alert('Đăng nhập để mua hàng!')
                </script>";
            echo "<script>
                document.location = 'index.php?act=login'
                </script>";
            // header('location: ?act=login');
        }

        break;


    default:
        echo "./404.php";
        break;
}

include './views/layout/header.php';

include $VIEW;
include './views/layout/footer.php';
