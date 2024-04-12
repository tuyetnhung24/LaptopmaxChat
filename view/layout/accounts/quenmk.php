<section class="register" id="register">
    <form class="buttons" action="?act=quenmk" method="POST">
        <legend>QUÊN MẬT KHẨU </legend>
        <aside class="bodyform">
            <label for="">Email:</label><br>
            <input class="input" type="email" placeholder="Email" name="email" required> <br>
            
            <aside class="bottomform">
                <button class="button">Lấy mật khẩu</button>
                <a href="?act=login">Trở về</a>
            </aside>
        </aside>
    </form>
    <h5 style="color: red; border: 1px solid black; padding: 20px;margin: 40px auto; width: 70%"> <?= $thongbao ?? "" ?> </h5>
    
</section>