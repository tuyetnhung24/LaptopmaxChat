</style>

<section id="forms" class="forms">
    <form class="" action="?act=login" method="POST">
        <legend>ĐĂNG NHẬP</legend>

        <aside class="form-body">
            <label for="username"><b>Tên khách hàng</b></label> <br>
            <input type="text" placeholder="Username" name="ten_kh" pattern=".{8,}" title="8 ký tự trở lên!" required> <br>

            <label for="Password"><b>Mật khẩu</b></label><br>
            <input type="password" placeholder="Password" name="mat_khau" pattern=".{8,}" title="Mật khẩu không hợp lệ !" required><br>
            <button type="submit">Đăng nhập</button>
        </aside>



        <aside class="bottom-form">
            <span id="opensignup" class="">Tạo<a href="?act=logup">Tài khoản</a></span>
            <span class="password">Quên <a href="?act=quenmk">Mật khẩu?</a></span>
        </aside>
    </form>
</section>