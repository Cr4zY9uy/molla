<?php
require_once "client/models/Category.php";
require_once "client/models/Brands.php";
$categories = Category::getAllCategories();
$brands = Brands::getAllBrands();
?>

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Danh sách sản phẩm<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="products mb-3">
                        <div class="row justify-content-center">
                            <?php foreach($products as $product):?>

                            <div class="col-6 col-md-4 col-lg-4">
                                <form action="?controller=Cart" method="post" class="product product-7 text-center">
                                    <input type="hidden" name="id" value="<?=$product["product"]["id"]?>">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a
                                            href="?controller=products&action=detailproduct&id=<?=$product["product"]["id"]?>">
                                            <img src="uploads/<?=$product["images"][0]?>" alt="Product image"
                                                class="product-image">
                                        </a>

                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>Yêu
                                                    thích</span></a>
                                        </div><!-- End .product-action-vertical -->

                                        <div class="product-action">
                                            <button class="btn-product btn-cart"><span>Thêm vào giỏ
                                                    hàng</span></button>
                                        </div><!-- End .product-action -->
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">Molla ToyStore</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a
                                                href="?controller=products&action=detailproduct&id=<?=$product["product"]["id"]?>"><?=$product["product"]["name"]?></a>
                                        </h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <?=number_format($product["product"]["price"])?> VNĐ
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 85%;"></div>
                                                <!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( 2 Đánh giá )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </form><!-- End .product -->
                            </div><!-- End .col-sm-6 col-lg-4 -->

                            <?php endforeach ?>
                        </div><!-- End .row -->
                    </div><!-- End .products -->

                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
</main><!-- End .main -->