<style>
    .loai-laptop {
        margin: 20px 50px;
    }
</style>
<section class="loai-laptop">
    <legend>Danh sách Khách hàng</legend>
    <!-- BAILỌC TÊN SẢN PHẨM -->
    <div>

    </div>
    <form action="" method="POST">

        <table class="table table-bordered border-primary" style="text-align: center">
            <tr>
                <th>Chọn</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Mật khẩu</th>
                <th>Địa chỉ</th>
                <th>Điện thoại</th>
                <th>Vai trò</th>
                <th>Hoạt động</th>
            </tr>
            <?php foreach ($khachhang as $kh) : ?>
                <?php extract($kh) ?>
                <tr>
                    <th><input type="checkbox" name="ma_kh[]" value=<?= $ma_kh ?> class="checkbox"></th>
                    <td><?= $ma_kh ?></td>
                    <td><?= $ten_kh ?></td>
                    <td><?= $email ?></td>
                    <td><?= $mat_khau ?></td>
                    <td><?= $dia_chi ?></td>
                    <td><?= $dien_thoai ?></td>
                    <td><?= $vai_tro ?></td>
                    <td>
                        <a onclick="return confirm('Bạn có muốn xóa không ?')" href="?act=listkh&ma_kh=<?= $ma_kh ?>">xóa</a> -
                        <a href="?act=updatekh&ma_kh=<?= $ma_kh ?>">sửa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div>
            <button type="button" class="btn btn-outline-success">Chọn tất cả</button>
            <button type="button" class="btn btn-outline-danger">Xóa tất cả</button>
            <button type="button" class="btn btn-outline-warning">Bỏ chọn</button>
        </div>
    </form>
</section>