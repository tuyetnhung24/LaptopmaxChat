<?php
session_start();
include "../../model/pdo.php";
include "../../model/binhluan.php";
// $ma_sp = $_REQUEST['ma_bl'];
$ma_sp = $_REQUEST['ma_sp'] ?? '';

$dsbl = loadall_binhluan($ma_sp);
//
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<?php
if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'])) {
    extract($_POST);
    $ma_sp = $_GET['ma_sp'];
    // $noi_dung = $_POST['noi_dung'];
    // $ma_sp = $_POST['ma_sp'];
    // var_dump($_POST['ma_sp']);die; 
    if (isset($_SESSION['ten_kh'])) {
        $ma_kh = $_SESSION['ten_kh']['ma_kh'];
        $ngay_bl = date('d/m/Y h:i:sa');

        insert_binhluan($noi_dung, $ma_kh, $ma_sp, $ngay_bl);
        header("Location:" . $_SERVER['HTTP_REFERER']);
    } else {
        echo "<script>alert('Đăng nhập để có thể để lại đánh giá!')</script>";
    }
}
?>

<body>
    <div class="mb">
        <div class="box_content2  product_portfolio binhluan ">
            <table>

                <div style="margin-left: 100px">
                    <div style="display: flex;">
                        <img src="../imgs/tin1.jpg" alt="" width='40' height='45' style="border-radius: 60px">
                        <h3>Mã khách hàng: </h3>
                    </div>
                    <span style="font-size: 18px; margin-left: 50px"><?= $noi_dung ?> </span>
                    <span
                        style="margin-right: 30px; float: right; font-weight: bold; opacity: 0.6;"><?= date("d/m/Y h:i:sa") ?>
                        </>
                </div>

            </table>
        </div>
        <div class="box_search">
            <form class="form" action="" method="POST">
                <input type="hidden" name="ma_sp" value="">
                <div style="display: flex; margin-left: 54px; margin-top: 30px">
                    <img src="../imgs/logo.jpg" alt="" width='40px'>
                    <input class="input" type="text" name="noi_dung" placeholder="viết bình luận..."> <br>
                </div>
                <div class="larg-button" style="margin-left: 520px;margin-top: 20px;">
                    <input class="input-small" type="submit" name="guibinhluan" value="Gửi bình luận">
                    <input class="input-small" type="reset" name="huy" value="Huỷ">
                </div>
            </form>
        </div>


    </div>
</body>

</html>