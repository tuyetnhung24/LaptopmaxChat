<?php
// include_once './pdo.php';
//hàm thêm sách vào giỏ
function add_to_cart($ma_sp, $ten_sp, $gia_sp, $so_luong, $hinh_sp)
{
    $splaptop = [
        'ma_sp' => $ma_sp,
        'ten_sp' => $ten_sp,
        'gia_sp' => $gia_sp,
        'so_luong' => $so_luong,
        'hinh_sp' => $hinh_sp,
        'thanh_tien' => $gia_sp * $so_luong
    ];
    //GIỏ hàng chưa có, thì thêm giỏ mới.
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][$ma_sp] = $splaptop;
    } else {
        //GIỏ hàng đã có
        //Kiểm tra xem hàng đã có trong giỏ chưa, nếu có thì chỉ cần tăng số lượng lên
        if (isset($_SESSION['cart'][$ma_sp])) {
            $_SESSION['cart'][$ma_sp]["so_luong"] += 1;
        } else {
            $_SESSION['cart'][$ma_sp] = $splaptop;
        }
    }
}
