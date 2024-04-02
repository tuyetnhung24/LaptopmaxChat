<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title ?></title>
    <link rel="stylesheet" href="./views/css/style.css" />
    <link rel="stylesheet" href="./views/fonts/fontawesome-free-6.3.0-web/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</head>

<body class="body">
    <!-- BAI HEADER -->
    <div class="containers">
        <header>
            <section class="top">
                <img src="./views/imgs/top.jpg" alt="" />
                <div class="nav-top">
                    <div class="func">
                        <i class="fa-solid fa-snowflake"></i>
                        <p>Khuyến mại</p>
                    </div>
                    <div class="func">
                        <i class="fa-brands fa-centos"></i>
                        <p>Hệ thống</p>
                    </div>
                    <div class="func">
                        <i class="fa-solid fa-comment-medical"></i>
                        <p>Tư vấn doanh nghiệp</p>
                    </div>
                    <div class="func">
                        <i class="fa-solid fa-address-book"></i>
                        <p>Liên hệ</p>
                    </div>
                    <div class="func">
                        <i class="fa-solid fa-computer"></i>
                        <p>Tin công nghệ</p>
                    </div>
                    <div class="func">
                        <i class="fa-solid fa-print"></i>
                        <p>Liên hệ cấu hình</p>
                    </div>
                </div>
                <nav class="navbar navbar-expand-lg bg-body-tertiary" id="navbar">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="index.php">
                            <img src="views/imgs/LaptopmaxChat.png" alt="">
                        </a>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size: 18px; font-weight: bold">
                                        Danh mục
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($loaidanhmuc as $ldm) : ?>
                                            <?php extract($ldm) ?>
                                            <li><a class="dropdown-item" href="?act=locloai&ma_loai=<?= $ma_loai ?>"><?= $ten_loai ?></a></li>
                                        <?php endforeach; ?>
                                        <!-- <li><a class="dropdown-item" href="#">Lenovo</a></li>
                    <li><a class="dropdown-item" href="#">Hp</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Dell</a>
                    </li> -->
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- TEST search -->
                        <form action="?act=search" method="POST" class="search">
                            <button class="button" type="submit">Search</button>
                            <input type="text" name="kyw">
                        </form>

                        <div class="favorite">
                            <a href="index.php?act=listdonhang">

                                <i class="fa-solid fa-truck-fast"></i></a>
                        </div>
                        <div class="shop">
                            <a href="?act=viewdonhang">
                                <span id="shop">

                                    <?php
                                    if (isset($_SESSION['cart'])) {
                                        echo count($_SESSION['cart']);
                                    }
                                    ?>
                                </span>
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>

                        </div>
                    </div>
                    <?php
                    if (isset($_SESSION['ten_kh'])) {
                        extract($_SESSION['ten_kh']);
                    ?>
                        <div class="nav-item dropdown" style="background-color: white; height: 90px">
                            <a style="border: 1px solid #F1F3F4;margin-top: 15px;font-weight: bold; text-align: center;margin-right: 100px;border-radius: 5px; padding: 5px;background-color: #F1F3F4;" href="" class="nav-link " data-bs-toggle="dropdown">👨🏻‍💼<?= $ten_kh ?></a>
                            <div class="dropdown-menu m-0">
                                <a href="" class="dropdown-item">Đổi mật khẩu</a>
                                <a href="" class="dropdown-item">cập nhập tài khoản</a>
                                <?php if ($vai_tro == 1) { ?> <a href="admin/index.php" class="dropdown-item">Đăng nhập
                                        Admin</a><?php } ?>
                                <a href="?act=thoat" class="dropdown-item">Thoát</a>
                            </div>
                        </div>
                    <?php } else {
                    ?>
                        <a style="background-color: white;margin-right: 100px;font-size: 30px" class="btn-sm-square bg-white rounded-circle ms-3" href="?act=login">
                            <small class="fa fa-user text-body"></small>
                        </a>
                        <?php //include_once 'views/accounts/login.php'; 
                        ?>
                    <?php }
                    ?>
                </nav>
            </section>