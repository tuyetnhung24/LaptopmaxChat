<?php
function load_all_dh()
{
    $sql = "SELECT * FROM don_hang ORDER BY ma_dh desc";
    return pdo_query($sql);
}