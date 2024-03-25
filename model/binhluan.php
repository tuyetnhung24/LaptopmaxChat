<?php
function insert_binhluan($noi_dung, $ma_kh, $ma_sp, $ngay_bl)
{
    $sql = "INSERT INTO binh_luan(noi_dung, ma_kh, ma_sp, ngay_bl) VALUES ('$noi_dung', '$ma_kh', '$ma_sp', '$ngay_bl')";
    // var_dump($sql);
    // die;
    pdo_execute($sql);
}
function loadall_binhluan($ma_sp)
{
    $sql = "SELECT * FROM binh_luan where 1";
    if ($ma_sp > 0)
        $sql .= " AND ma_sp ='" . $ma_sp . "'";

    $sql .= " order by ma_bl desc";
    $listbl = pdo_query($sql);
    return  $listbl;
}

function list_binhluan()
{
    $sql = "SELECT * FROM binh_luan";
    return pdo_query($sql);
}
