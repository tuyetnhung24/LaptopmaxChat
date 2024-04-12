<style>
    .loai-cartshop {
        margin: 10px 50px;
    }

    .col-70 {
        background-color: white;
        width: 70%;
        float: left;
        border-radius: 5px;
        margin-bottom: 100px;
    }

    .tables {
        padding: 0px 40px;
    }

    .col-30 {
        background-color: white;
        width: 30%;
        border-radius: 5px;
        float: left;
        width: 350px;
        margin-left: 20px;
    }

    .success {
        width: 100%;
        border-radius: 4px;
        background-color: blue;
        color: white;
        font-weight: bold;
        padding: 8px 0;
        border: 1px solid blue;
    }

    .check {
        margin-top: 40px;
    }

    .sl0 {
        width: 50px;
        height: 30px;
        border-radius: 3px;
    }
</style>
<section class="loai-cartshop">
    <?php if (!isset($carts) || $carts == []) : ?>
        <h1>Giỏ hàng trống!</h1>
    <?php endif ?>

    <?php if (isset($carts) && $carts != []) : ?>
        <form class="cart" action="" method="POST">
            <h5 style="margin: 40px 0px">SẢN PHẨM GIỎ HÀNG</h5>
            <div class=col-70>
                <table class="table tables" style="text-align: center;">
                    <tr>
                        <th>Chọn</th>
                        <th>STT</th>
                        <th>Hình ảnh</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php $i = 0; ?>
                    <?php foreach ($carts as $stt => $cart) : ?>


                        <tr>
                            <td><input type="checkbox" checked></td>
                            <td><?= $i + 1 ?></td>
                            <td><img src="views/imgs/<?= $cart['hinh_sp'] ?>" alt="" width="150" height="150"></td>
                            <td><?= $cart['ten_sp'] ?></td>
                            <td><?= $cart['gia_sp'] ?></td>
                            <td><?= $cart['mau'] ?></td>
                            <input type="hidden" name="" class="pr0" value="<?= $cart['gia_sp'] ?>">
                            <td>
                                <button onclick="giam0(<?= $i ?>)" type="button">-</button><input class="sl0" type="number" name="so_luong" id="soLuong" value="<?= $cart['so_luong'] ?>"><button id="cong" onclick="tang0(<?= $i ?>)" type="button">+</button>
                            </td>
                            <td class="price_0"><?= $cart['thanh_tien'] ?></td>
                            <td><a style="text-decoration: none; font-size: 20px" onclick="return confirm('Bạn có muốn xóa không ?')" href="?act=xoacart&ma_sp=<?= $cart['id_mau'] ?>">❎</a></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach ?>
                </table>
            </div>
            <div class="col-30">
                <div>
                    <h5>Thanh toán</h5>
                    <div style="margin-top: 20px">
                        <span class="check">Tổng tạm tính :</span>
                        <span style="float: right; font-weight: bold;"><?= $sums ?> đ</span> <br>
                    </div>
                    <div style="margin-bottom: 20px">
                        <span class="check">Tổng tiền :</span>
                        <span style="float: right; color: blue; font-weight: bold;"><?= $sums ?> đ</span> <br>
                    </div>
                    <span><a href="?act=donhang"><button type="button" class="success">Thanh toán</button></a></span>
                    <div style="margin: 30px 0px; margin-left: 280px">
                        <a href="?act="><button type="button" class="btn btn-outline-primary">Thoát</button></a>
                    </div>
                </div>
            </div>
        </form>
    <?php endif ?>

    <script>
        document.getElementById('deselect-all').addEventListener('click', function() {
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        });
    </script>

</section>

<script>
    var sl0 = document.getElementsByClassName('sl0');
    var pr0 = document.getElementsByClassName('pr0');
    var price0 = document.getElementsByClassName('price_0');

    function tang0(i) {
        console.log(sl0[i].value);
        sl0[i].value++;
        var conten = parseInt(sl0[i].value) * parseInt(pr0[i].value);
        price0[i].innerHTML = conten.toLocaleString("en-US") + "đ";
        var tong = 0;
        var sl = 0;
        for (var j = 0; j < sl0.length; j++) {
            tong = tong + parseInt(sl0[j].value) * parseInt(pr0[j].value);
            sl = sl + parseInt(sl0[j].value);
        }

        document.getElementById('tamTinh').innerHTML = tong.toLocaleString("en-US") + "đ";
        document.getElementById('tongTien').innerHTML = tong.toLocaleString("en-US") + "đ";
    }

    function giam0(i) {
        if (sl0[i].value > 1) {
            sl0[i].value--;
            var conten = parseInt(sl0[i].value) * parseInt(pr0[i].value);
            price0[i].innerHTML = conten.toLocaleString("en-US") + "đ";
            var tong = 0;
            var sl = 0;
            for (var j = 0; j < sl0.length; j++) {
                tong = tong + parseInt(sl0[j].value) * parseInt(pr0[j].value);
                sl = sl + parseInt(sl0[j].value);
            }


            document.getElementById('tamTinh').innerHTML = tong.toLocaleString("en-US") + "đ";
            document.getElementById('tongTien').innerHTML = tong.toLocaleString("en-US") + "đ";
        }
        if (document.getElementById('sl0').value < 0)
            document.getElementById('sl0').value = 1;
    }
</script>