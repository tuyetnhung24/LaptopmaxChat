<?php
// include_once './pdo.php';
//hàm thêm sách vào giỏ
function add_to_cart($ma_sp, $ten_sp, $gia_sp, $so_luong, $hinh_sp, $mau, $id_mau)
{
    $splaptop = [
        'id_mau' => $id_mau,
        'ma_sp' => $ma_sp,
        'ten_sp' => $ten_sp,
        'gia_sp' => $gia_sp,
        'so_luong' => $so_luong,
        'hinh_sp' => $hinh_sp,
        'mau' => $mau,
        'thanh_tien' => $gia_sp * $so_luong
    ];
    //GIỏ hàng chưa có, thì thêm giỏ mới.
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'][$id_mau] = $splaptop;
    } else {
        //GIỏ hàng đã có
        //Kiểm tra xem hàng đã có trong giỏ chưa, nếu có thì chỉ cần tăng số lượng lên
        if (isset($_SESSION['cart'][$id_mau])) {
            $_SESSION['cart'][$id_mau]["so_luong"] += $so_luong;
            $_SESSION['cart'][$id_mau]["thanh_tien"] += $gia_sp * $so_luong;
        } else {
            $_SESSION['cart'][$id_mau] = $splaptop;
        }
    }
}

//Tính tổng của đơn hàng
function sum_cart()
{
    $carts = $_SESSION['cart'];
    $sum = 0;
    foreach ($carts as $cart) {
        $sum += $cart['gia_sp'] * $cart['so_luong'];
    }
    return $sum;
}
//tạo đơn hàng
function inser_donhang($ten_dh, $diachi_dh, $sodt_dh, $email_dh, $dh_pttt, $tong_tien, $ngay_dh)
{
    $ngay_dh = date('Y-m-d');
    $sql = "INSERT INTO don_hang(ten_dh, diachi_dh, sodt_dh, email_dh, dh_pttt, tong_tien, ngay_dh) VALUES ('$ten_dh', '$diachi_dh', '$sodt_dh', '$email_dh','$dh_pttt', '$tong_tien', '$ngay_dh')";
    return pdo_execute_return_lastInsertId($sql);
}
//thm vào giỏ hàng
function insert_ct_donhang($ma_kh, $ma_dh, $ma_sp, $hinh_ct, $so_luong, $don_gia, $thanh_tien, $mau)
{
    $sql = "INSERT INTO ct_dh(ma_kh, ma_dh, ma_sp, hinh_ct, so_luong, don_gia, thanh_tien, mau) VALUES ('$ma_kh', '$ma_dh', '$ma_sp', '$hinh_ct', '$so_luong', '$don_gia', '$thanh_tien','$mau')";
    return pdo_execute($sql);
}
