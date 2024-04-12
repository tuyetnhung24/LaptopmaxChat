<section class="register" id="register">
    <form class="buttons" action="?act=logup" method="POST">
        <h5 style="color: red"> <?= $thongbao ?? "" ?> </h5>
        <legend>ĐĂNG KÝ </legend>
        <aside class="bodyform">
            
            <label for="">Tên người dùng:</label><br>
            <input class="input" type="text" placeholder="user" name="ten_kh" pattern=".{8,}" title="8 ký tự trở lên!" required> <br>
            
            <label for="">Email:</label><br>
            <input class="input" type="email" placeholder="Email" name="email" required> <br>
            
            <label for="">Mật khẩu:</label><br>
            <input class="input" type="password" placeholder="mat khau" name="mat_khau" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 ký tự trở lên, 1 hoa, 1 thường, 1 số!" required> <br>
            <label for=""> nhập lạiMật khẩu:</label><br>
            <input class="input" type="password" placeholder="mat khau" name="mat_khau" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="8 ký tự trở lên, 1 hoa, 1 thường, 1 số!" required> <br>
            <aside class="bottomform">
                <button class="button">Đăng ký</button>
                <a href="?act=login">Trở về</a>
            </aside>
        </aside>
    </form>
</section>