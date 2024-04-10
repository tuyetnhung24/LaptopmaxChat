<?php

require_once "pdo.php";
function all_list_loai()
{
    $sql = "SELECT * FROM loai_laptop ORDER BY ma_loai DESC";
    return pdo_query($sql);
}