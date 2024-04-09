<?php
function load_all_ctdh()
{
    $sql = "SELECT * FROM ct_dh  ORDER BY ma_ct desc";
    return pdo_query($sql);
}
