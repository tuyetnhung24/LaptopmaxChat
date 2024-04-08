<?php
require_once "pdo.php";

function all_list_sanpham()
{
    $sql = "SELECT sp_laptop.*, ten_loai, nhu_cau, mau_sac, kich_thuoc, ram FROM sp_laptop JOIN loai_laptop ON sp_laptop.ma_loai = loai_laptop.ma_loai ORDER BY ma_sp DESC";
    return  pdo_query($sql);
}

function loadall_sanpham($kyw = "", $ma_loai = 0)
{
    $sql = "SELECT * FROM sp_laptop WHERE 1";
    if ($kyw != "") {
        $sql .= " AND ten_sp like '%" . $kyw . "%'";
    }
    if ($ma_loai > 0) {
        $sql .= " AND ma_loai = $ma_loai";
    }
    $sql .= " ORDER BY ma_sp DESC";
    return  pdo_query($sql);
}

function list_one_sp($ma_sp)
{
    $sql = "SELECT * from sp_laptop WHERE ma_sp = $ma_sp";
    // echo $sql; die; 
    return pdo_query_one($sql);
}
