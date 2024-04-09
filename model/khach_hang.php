<?php

// require_once "./pdo.php";

function load_all_kh()
{
    $sql = "SELECT * FROM khach_hang ORDER BY ma_kh desc";
    return pdo_query($sql);
}
function delete_kh($ma_kh)
{
    $sql = "DELETE FROM khach_hang WHERE ma_kh = $ma_kh";
    pdo_execute($sql);
}
function delete_kh_item($ma_kh)
{
    $mkh = "";
    foreach ($ma_kh as $item) {
        $mkh .= $item . ", ";
        $mkh = rtrim($mkh, ",");
        $sql = "DELETE FROM khach_hang WHERE ma_kh IN ($mkh)";
        pdo_execute($sql);
    }
}
