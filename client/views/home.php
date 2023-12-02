<?php
require_once "client/models/Brands.php";
require_once "client/models/Category.php";
require_once "client/models/product.php";
?>

<main class="main">
    <div class="intro-slider-container mb-5">
        <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light">
            <div class="intro-slide" style="background-image: url(assets/images/banners/slideshow_1.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <div class="intro-price">

                            </div><!-- End .intro-price -->

                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <div class="intro-slide" style="background-image: url(assets/images/banners/slideshow_3.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <div class="intro-price">
                            </div><!-- End .intro-price -->

                        </div><!-- End .col-lg-11 offset-lg-1 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
            <div class="intro-slide" style="background-image: url(assets/images/banners/slideshow_5.jpg);">
                <div class="container intro-content">
                    <div class="row justify-content-end">
                        <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                            <div class="intro-price">

                            </div>
                        </div><!-- End .col-md-6 offset-md-6 -->
                    </div><!-- End .row -->
                </div><!-- End .intro-content -->
            </div><!-- End .intro-slide -->
        </div><!-- End .intro-slider owl-carousel owl-simple -->

        <span class="slider-loader"></span><!-- End .slider-loader -->
    </div><!-- End .intro-slider-container -->

    <script>
    // Khởi tạo và cấu hình Owl Carousel
    $(document).ready(function() {
        var introSlider = $('.intro-slider');

        introSlider.owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            responsive: {
                1200: {
                    nav: true,
                    dots: false
                }
            }
        });
    });
    </script>


    <div class="brands-border">
        <div class="row">
            <?php $countBrand = 0; ?>
            <?php foreach ($brands as $brand): ?>
            <div class="col-6 col-sm-4 col-lg-2">
                <a href="?controller=products&brandid=<?php echo $brand["id"] ?>" class="brand">
                    <img style="width:70%;height:70%" src="assets/images/brands/<?php echo $brand["name"] ?>.png"
                        alt="Category image">
                </a>
            </div>
            <?php $countBrand++;
                if ($countBrand == 6) {
                    break;
                }
                ?>
            <?php endforeach ?>
        </div>
    </div><!-- End .owl-carousel -->

    <div class="mb-3 mb-lg-5"></div><!-- End .mb-3 mb-lg-5 -->

    <div class="banner-group">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-5">
                    <div class="banner banner-large banner-overlay banner-overlay-light">
                        <a href="?controller=products&action=detailproduct&id=47">
                            <img src="assets/images/products/80b9e09a037880bef5b3995990e16f81.png" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-top">
                            <h4 class="banner-subtitle">NEW</h4><!-- End .banner-subtitle -->
                            <a class="banner-title">
                                <a href="?controller=products&action=detailproduct&id=47"
                                    style="text-decoration: none; font-size:25px; color: black; "><b>Gundam
                                        RX3V</b></a>
                            </a><!-- End .banner-title -->
                            <div class="banner-text">Chỉ 300.000</div><!-- End .banner-text -->
                            <form action="?controller=Cart" method="post">
                                <input type="hidden" name="id" value="47">
                                <button class="btn btn-outline-gray banner-link">Mua ngay<i
                                        class="icon-long-arrow-right"></i></button>
                            </form>

                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->

                </div><!-- End .col-lg-5 -->

                <div class="col-md-6 col-lg-3">
                    <div class="banner banner-overlay">
                        <a href="?controller=products&action=detailproduct&id=48">
                            <img src="assets/images/products/test4.jpg" style="height: 470px !important;" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-bottom">
                            <h4 class="banner-subtitle text-white">On Sale</h4><!-- End .banner-subtitle -->
                            <a class="banner-title text-white">
                                <a href="?controller=products&action=detailproduct&id=48"
                                    style="text-decoration: none; font-size:25px; color: white; "><b>Amazing <br>Alpha
                                        Gundam</b></a>
                            </a><!-- End .banner-title -->
                            <div class="banner-text text-white">Chỉ 450.000</div><!-- End .banner-text -->
                            <form action="?controller=Cart" method="post">
                                <input type="hidden" name="id" value="48">
                                <button class="btn btn-outline-gray banner-link">Mua ngay
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>

                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-3 -->

                <div class="col-md-6 col-lg-4">
                    <div class="banner banner-overlay">
                        <a href="?controller=products&action=detailproduct&id=35">
                            <img src="assets/images/products/thuy_cung_cau_vong_harp_e9ab4b011b3a42c98fb1992d7fa9748d.jpg"
                                style="height: 225px !important;" alt="Banner">
                        </a>
                    </div><!-- End .banner -->

                    <div class="banner banner-overlay banner-overlay-light">
                        <a href="?controller=products&action=detailproduct&id=28">
                            <img src="assets/images/products/pl70923_d116560cb8574ef6bf6cb4f05b5fe9d2.png"
                                style="height: 225px !important;" alt="Banner">
                        </a>

                        <div class="banner-content banner-content-top">
                            <h4 class="banner-subtitle">Giảm giá</h4><!-- End .banner-subtitle -->
                            <a class="banner-title text-primary" style="color: gray !important;">
                                <a href="?controller=products&action=detailproduct&id=28"
                                    style="text-decoration: none; font-size:25px; color: gray; "><b>Mô hình Xe</b></a>
                            </a>
                            <!-- End .banner-title -->
                            <div class="banner-text text-primary" style="color: gray !important;">Lên đến 30%</div>
                            <!-- End .banner-text -->
                            <form action="?controller=Cart" method="post">
                                <input type="hidden" name="id" value="28">
                                <button class="btn btn-outline-white banner-link">Mua ngay
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                            </form>

                        </div><!-- End .banner-content -->
                    </div><!-- End .banner -->
                </div><!-- End .col-lg-4 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .banner-group -->

    <div class="mb-3"></div><!-- End .mb-6 -->

    <div class="container">
        <ul class="nav nav-pills nav-border-anim nav-big justify-content-center mb-3" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="products-featured-link" data-toggle="tab" href="#products-featured-tab"
                    role="tab" aria-controls="products-featured-tab" aria-selected="true">Mới nhất</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-sale-link" data-toggle="tab" href="#products-sale-tab" role="tab"
                    aria-controls="products-sale-tab" aria-selected="false">Giá tốt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="products-top-link" data-toggle="tab" href="#products-top-tab" role="tab"
                    aria-controls="products-top-tab" aria-selected="false">Số lượng có hạn</a>
            </li>
        </ul>
    </div><!-- End .container -->

    <div class="container-fluid">
        <div class="tab-content tab-content-carousel">
            <div class="tab-pane p-0 fade show active" id="products-featured-tab" role="tabpanel"
                aria-labelledby="products-featured-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                    <?php foreach ($listproductsnew as $value): ?>

                    <form action="?controller=Cart" method="post">
                        <div class="product product-11 text-center">
                            <input type="hidden" name="id" value="<?= $value["product"]["id"] ?>">
                            <figure class="product-media">
                                <span class="product-label label-new">New</span>

                                <a href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][0] ?>"
                                        alt="Product image" class="product-image">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][1] ?>"
                                        alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body" style="height: 150px;">
                                <h3 class="product-title"><a
                                        href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                        <?= $value["product"]["name"] ?>
                                    </a></h3>
                                <!-- End .product-title -->
                                <div class="product-price" style="color:#a6c76c">
                                    <?= number_format($value["product"]["price"]) ?> VNĐ
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <button class="btn-product btn-cart"><span>thêm vào giỏ hàng</span></button>
                            </div><!-- End .product-action -->
                        </div>
                    </form>
                    <?php endforeach ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="products-sale-tab" role="tabpanel" aria-labelledby="products-sale-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                    <?php foreach ($listproductssale as $value): ?>
                    <form action="?controller=Cart" method="post">

                        <div class="product product-11 text-center">
                            <input type="hidden" name="id" value="<?= $value["product"]["id"] ?>">

                            <figure class="product-media">
                                <span class="product-label label-circle label-sale"
                                    style="background-color:#7dd2ea">Sale</span>


                                <a href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][0] ?>"
                                        alt="Product image" class="product-image">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][1] ?>"
                                        alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body" style="height: 150px;">
                                <h3 class="product-title"><a
                                        href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                        <?= $value["product"]["name"] ?>
                                    </a></h3>
                                <!-- End .product-title -->
                                <div class="product-price" style="color:#a6c76c">
                                    <?= number_format($value["product"]["price"]) ?>VNĐ
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <button class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></button>
                            </div><!-- End .product-action -->
                        </div>
                    </form>

                    <?php endforeach ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
            <div class="tab-pane p-0 fade" id="products-top-tab" role="tabpanel" aria-labelledby="products-top-link">
                <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl"
                    data-owl-options='{
                                "nav": false, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
                                    },
                                    "480": {
                                        "items":2
                                    },
                                    "768": {
                                        "items":3
                                    },
                                    "992": {
                                        "items":4
                                    },
                                    "1200": {
                                        "items":5
                                    },
                                    "1600": {
                                        "items":6,
                                        "nav": true
                                    }
                                }
                            }'>
                    <?php foreach ($listproductslimited as $value): ?>
                    <form action="?controller=Cart" method="post">

                        <div class="product product-11 text-center">
                            <input type="hidden" name="id" value="<?= $value["product"]["id"] ?>">

                            <figure class="product-media">
                                <span class="product-label label-sale label-sale"
                                    style="background-color: yellow !important; color:black">Limited</span>


                                <a href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][0] ?>"
                                        alt="Product image" class="product-image">
                                    <img style="height: 320px !important;" src="uploads/<?= $value["images"][1] ?>"
                                        alt="Product image" class="product-image-hover">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="#" class="btn-product-icon btn-wishlist"><span>add to wishlist</span></a>
                                </div><!-- End .product-action-vertical -->
                            </figure><!-- End .product-media -->

                            <div class="product-body" style="height: 150px;">
                                <h3 class="product-title"><a
                                        href="?controller=products&action=detailproduct&id=<?= $value["product"]["id"] ?>">
                                        <?= $value["product"]["name"] ?>
                                    </a></h3>
                                <!-- End .product-title -->
                                <div class="product-price" style="color:#a6c76c">
                                    <?= number_format($value["product"]["price"]) ?>VNĐ
                                </div><!-- End .product-price -->
                            </div><!-- End .product-body -->
                            <div class="product-action">
                                <button class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></button>
                            </div><!-- End .product-action -->
                        </div>
                    </form>

                    <?php endforeach ?>

                </div><!-- End .owl-carousel -->
            </div><!-- .End .tab-pane -->
        </div><!-- End .tab-content -->
    </div><!-- End .container-fluid -->

    <div class="mb-5"></div><!-- End .mb-5 -->
    <div class="mb-6"></div><!-- End .mb-6 -->

    <div class="container" id="store">
        <hr class="mt-1 mb-6">
    </div><!-- End .container -->

    <div class="blog-posts">
        <div class="container">
            <h2 class="title text-center">Các cửa hàng của chúng tôi</h2><!-- End .title-lg text-center -->

            <div class="owl-carousel owl-simple carousel-with-shadow" data-toggle="owl" data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "items": 3,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "600": {
                                    "items":2
                                },
                                "992": {
                                    "items":3
                                }
                            }
                        }'>
                <?php foreach ($stores as $value): ?>
                <article class="entry entry-display">
                    <figure class="entry-media">
                        <a href="?controller=store">
                            <img style="height: 320px !important;" src="uploads/<?= $value['ulr'] ?>" alt="image desc">
                        </a>
                    </figure><!-- End .entry-media -->

                    <div class="entry-body text-center">
                        <div class="entry-meta">
                            <a href="?controller=store">
                                <?= $value['namestore'] ?>
                            </a>
                        </div><!-- End .entry-meta -->

                        <h3 class="entry-title">
                            <a href="?controller=store">
                                <?= $value['address'] ?>
                            </a>
                        </h3><!-- End .entry-title -->
                    </div><!-- End .entry-body -->
                </article><!-- End .entry -->

                <?php endforeach ?>


            </div><!-- End .owl-carousel -->
        </div><!-- End .container -->
    </div><!-- End .blog-posts -->
</main><!-- End .main -->
<div class="container" id="service">
    <hr class="mt-1 mb-6">
</div><!-- End .container -->
<footer class="footer footer-2">
    <div class="icon-boxes-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Miễn phí vận chuyển</h3><!-- End .icon-box-title -->
                            <p>Đơn hàng từ 100.000đ</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Trả hàng miễn phí</h3><!-- End .icon-box-title -->
                            <p>Trong 30 ngày</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Giảm 20% giá trị</h3><!-- End .icon-box-title -->
                            <p>Khi đăng ký</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Hỗ trợ</h3><!-- End .icon-box-title -->
                            <p>24/7 </p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="footer-newsletter bg-image" style="background-image: url(assets/images/backgrounds/bg-2.jpg)">
        <div class="container">
            <div class="heading text-center">
                <h3 class="title">Nhận ưu đãi mới nhất</h3><!-- End .title -->
                <p class="title-desc">và <span>sở hữu phiếu giảm giá</span> cho lần mua đầu tiên</p>
                <!-- End .title-desc -->
            </div><!-- End .heading -->

            <div class="row">
                <div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3">
                    <form action="#">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Nhập địa chỉ email"
                                aria-label="Email Adress" aria-describedby="newsletter-btn" required>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit" id="newsletter-btn"><span>Gửi</span><i
                                        class="icon-long-arrow-right"></i></button>
                            </div><!-- .End .input-group-append -->
                        </div><!-- .End .input-group -->
                    </form>
                </div><!-- End .col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-newsletter bg-image -->