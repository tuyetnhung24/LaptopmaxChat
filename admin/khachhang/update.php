<section class="add">
    <legend>Cập nhập Khách hàng</legend>
    <form action="" method="POST">
        <h5 style="color: red">Cập nhật thành công</h5>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Tên khách hàng:</label>
            <input type="text" class="form-control" name="ten_kh" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput" class="form-label">Email:</label>
            <input type="text" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Mật_khẩu:</label>
            <input type="text" class="form-control" name="mat_khau" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Đia_chi:</label>
            <input type="text" class="form-control" name="dia_chi" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Điện_thoại:</label>
            <input type="number" class="form-control" name="dien_thoai" required>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">Vai_tro:</label>
            <input type="text" class="form-control" name="vai_tro" required>
        </div>

        <input type="hidden" class="form-control" name="ma_kh" required>

        <button name="themmoi" class="btn btn-outline-success">Cập nhập</button>
        <a href="?act=listkh"><button type="button" class="btn btn-outline-primary">Danh sách</button></a>
    </form>
</section>