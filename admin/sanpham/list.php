<section class="loai-laptop">
    <legend>Danh sách loại LapTop</legend>
    <!-- BAILỌC TÊN SẢN PHẨM -->
    <div>

    </div>
    <form action="" method="POST">

        <table class="table table-bordered border-primary" style="text-align: center">
            <tr>
                <th>Chọn</th>
                <th>Ma_sp</th>
                <th>Ten_sp</th>
                <th>Gia_sp</th>
                <th>So_luong</th>
                <th>Hinh_sp</th>
                <th>Ten_loai</th>
                <th>Nhu_cau</th>
                <th>Mau_sac</th>
                <th>Kich_thuoc</th>
                <th>Ram</th>
                <th>Mo_ta</th>
            </tr>
            <?php foreach ($sanpham as $sp) : ?>
                <?php extract($sp) ?>
                <tr>
                    <th><input type="checkbox" name="ma_loai[]" value=<?= $ma_loai ?> class="checkbox"></th>
                    <td><?= $ma_sp ?></td>
                    <td><?= $ten_sp ?></td>
                    <td><?= $gia_sp ?></td>
                    <td><?= $so_luong ?></td>
                    <td><img src="../views/imgs/<?= $hinh_sp ?>" alt="" width="90"></td>
                    <td><?= $ten_loai ?></td>
                    <td><?= $nhu_cau ?></td>
                    <td><?= $mau_sac ?></td>
                    <td><?= $kich_thuoc ?></td>
                    <td><?= $ram ?>GB</td>
                    <td><?= $mo_ta ?></td>
                    <td>
                      
                        <a href="?act=updatesp&ma_sp=<?= $ma_sp ?>">sửa</a> <br>
                        <a href="?actchitietsp=<?$ma_sp?>">xem chi tiết</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <a href="?act=addsp"><button type="button" class="btn btn-outline-primary">Thêm mới</button></a>
            <button type="button" class="btn btn-outline-success">Chọn tất cả</button>
            <button type="button" class="btn btn-outline-danger">Xóa tất cả</button>
            <button type="button" class="btn btn-outline-warning">Bỏ chọn</button>
        </div>
    </form>
</section>