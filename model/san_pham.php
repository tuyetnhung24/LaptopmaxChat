<?php
require_once "pdo.php";

function all_list_sanpham()
{
    $sql = "SELECT sp_laptop.*, ten_loai, nhu_cau, mau_sac, kich_thuoc, ram FROM sp_laptop JOIN loai_laptop ON sp_laptop.ma_loai = loai_laptop.ma_loai ORDER BY ma_sp DESC";
    return  pdo_query($sql);
}
