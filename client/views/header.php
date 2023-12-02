<?php
require_once "client/models/cart.php";
require_once "client/models/Category.php";
$categories = Category::getAllCategories();
?>
<!DOCTYPE html>
<html lang="en">


<!-- molla/index-1.html  22 Nov 2019 09:55:06 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Molla Toy Store</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/icons/favicon-16x16.png">
    <link rel="manifest" href="assets/images/icons/site.html">
    <link rel="mask-icon" href="assets/images/icons/safari-pinned-tab.svg" color="#666666">
    <link rel="shortcut icon" href="assets/images/icons/favicon.ico">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-2.css">
    <link rel="stylesheet" href="assets/css/demos/demo-2.css">

</head>

<body>
    <div class="page-wrapper">
        <header class="header header-2 header-intro-clearance">

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        <a href="?controller=home" class="logo">
                            <img src="assets/images/demos/demo-2/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div
                            class="header-search header-search-extended header-search-visible header-search-no-radius d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="?controller=products&action=search" method="post">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q"
                                        placeholder="Tìm kiếm sản phẩm" required>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">
                        <div class="dropdown cart-dropdown">
                            <a href="?controller=home&action=login" class="dropdown-toggle" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Tài khoản</p>
                            </a>
                            <div>
                                <ul style="width: fit-content !important;padding: 5px !important;left:-120px; margin-left:80px;"
                                    class="dropdown-menu dropdown-menu-md-right">
                                    <?php
                                        if(!isset($_SESSION["customerid"])){
                                            echo '<li><a class="dropdown-item" href="?controller=home&action=login">Đăng nhập & Đăng ký</a></li>';
                                        }
                                        else{
                                            echo '<li><a class="dropdown-item" href="?controller=customers&action=profile">Thông tin cá nhân</a></li>
                                            <li><a class="dropdown-item" href="?controller=cart&action=orderdetail">Xem đơn hàng</a></li>
                                            <li><a class="dropdown-item" href="?controller=home&action=logout">Đăng xuất</a></li>';
                                        }
                                    ?>
                                </ul>
                            </div>
                        </div>


                        <div class="dropdown cart-dropdown">
                            <a href="?controller=cart" class="dropdown-toggle" role="button">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">
                                        <?php
                                        
                                        if(!isset($_SESSION["customerid"])){
                                            if(isset($_SESSION["cart"])){
                                                echo count($_SESSION["cart"]);
                                            }
                                            else{
                                                echo "0";
                                            }
                                        }
                                        else{
                                            echo cart::countCartByCustomerId($_SESSION["customerid"]);
                                        }
                                        ?>
                                    </span>
                                </div>
                                <p>Giỏ hàng</p>
                            </a>

                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false" data-display="static"
                                title="Browse Categories">
                                Danh mục
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php foreach ($categories as $category): ?>
                                        <li><a href="?controller=products&categoryid=<?php echo $category["id"]; ?>">
                                                <?php echo $category["name"] ?>
                                            </a></li>
                                        <?php endforeach ?>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container">
                                    <a href="?controller=home" class="">Trang chủ</a>

                                </li>
                                <li>
                                    <a href="?controller=store" class="sf-with-ul">Cửa hàng</a>

                                    <div class="megamenu megamenu-md" style="width: 200px !important; ">
                                        <div class="menu-col">
                                            <ul>
                                                <li><a href="?controller=store" style="font-size: 15px !important;">Hệ
                                                        thống cửa hàng</a></li>
                                                <li><a href="?home#service" style="font-size: 15px !important;">Chính
                                                        sách
                                                        mua hàng</a></li>
                                            </ul>
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .megamenu megamenu-md -->
                                </li>
                                <li>
                                    <a href="?controller=products">Sản phẩm</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->