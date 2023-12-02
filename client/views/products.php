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
                    <div class="toolbox">
                        <div class="toolbox-left">
                        </div><!-- End .toolbox-left -->

                        <div class="toolbox-right">
                            <div class="dropdown menu-dropdown">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-display="static">
                                    Lọc theo danh mục</i>
                                </a>
                                <?php
                        $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                        if ($_SERVER['QUERY_STRING']) {
                            $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                        }
                        ?>
                                <div class="dropdown-menu">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php foreach ($categories as $category): ?>

                                        <li><a
                                                href="<?php echo "?controller=products&categoryid=" . $category["id"]; ?>">
                                                <?php echo $category["name"] ?>
                                            </a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div><!-- End .toolbox-sort -->
                            </div>
                            <div class="dropdown menu-dropdown p-3">
                                <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" data-display="static">
                                    Lọc theo nhãn hiệu</i>
                                </a>
                                <?php
                        $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                        if ($_SERVER['QUERY_STRING']) {
                            $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                        }
                        ?>
                                <div class="dropdown-menu">
                                    <ul class="menu-vertical sf-arrows">
                                        <?php foreach ($brands as $brand): ?>

                                        <li><a href="<?php echo "?controller=products&brandid=" . $brand["id"]; ?>">
                                                <?php echo $brand["name"] ?>
                                            </a></li>
                                        <?php endforeach ?>
                                    </ul>
                                </div><!-- End .toolbox-sort -->
                            </div>
                        </div><!-- End .toolbox-right -->
                    </div><!-- End .toolbox -->

                    <div class="products mb-3">
                        <div class="row justify-content-center " style="justify-content: flex-start !important;">
                            <?php foreach($products as $product):?>

                            <div class="col-6 col-md-4 col-lg-4">
                                <form action="?controller=Cart" method="post" class="product product-7 text-center">
                                    <input type="hidden" name="id" value="<?=$product["product"]["id"]?>">
                                    <figure class="product-media">
                                        <span class="product-label label-new">New</span>
                                        <a
                                            href="?controller=products&action=detailproduct&id=<?=$product["product"]["id"]?>">
                                            <img style="height: 350px !important;"
                                                src="uploads/<?=$product["images"][0]?>" alt="Product image"
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
                                            <a href="#">Molla ToyStores</a>
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

                    <div class="d-flex justify-content-center">
                        <!-- Tạo phân trang -->
                        <ul class="pagination">
                            <?php if ($page > 1): ?>
                            <li class="page-item">
                                <a class="page-link" href="?controller=products&page=<?php echo $page - 1;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>">Previous</a>
                            </li>
                            <?php endif; ?>

                            <?php if ($page > 3): ?>
                            <li class="page-item">
                                <a class="page-link" href="?controller=products&page=1<?php
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>">1</a>
                            </li>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <?php endif; ?>

                            <?php for ($i = max(1, $page - 2); $i <= min($page + 2, $totalPages); $i++): ?>
                            <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                                <a class="page-link" href="?controller=products&page=<?php echo $i;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>"><?php echo $i; ?></a>
                            </li>
                            <?php endfor; ?>

                            <?php if ($page < $totalPages - 2): ?>
                            <li class="page-item disabled"><span class="page-link">...</span></li>
                            <li class="page-item">
                                <a class="page-link" href="?controller=products&page=<?php echo $totalPages;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>"><?php echo $totalPages; ?></a>
                            </li>
                            <?php endif; ?>

                            <?php if ($page < $totalPages): ?>
                            <li class="page-item">
                                <a class="page-link" href="?controller=products&page=<?php echo $page + 1;
                            if (!empty($categoryid)) {
                                echo "&categoryid=" . urlencode($categoryid);
                            }else if(!empty($brandid)){
                                echo "&brandid=" . urlencode($brandid);
                            }
                            ?>">Next</a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div><!-- End .col-lg-9 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
    <script>
    function sortProducts(sortBy) {
        // Chuyển hướng trang web đến URL có tham số 'sortby' tương ứng với giá trị lựa chọn
        window.location.href = "?controller=products&sortby=" + sortBy;
    }


    function sortCategory(value) {
        // Chuyển hướng trang web đến URL có tham số 'sortbycate' tương ứng với giá trị lựa chọn
        window.location.href = "?controller=products&sortbycate=" + value;
    }
    </script>
</main><!-- End .main -->