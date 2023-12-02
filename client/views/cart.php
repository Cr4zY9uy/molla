<?php
	require_once("client/models/product.php");
?>

<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="?controller=products">Sản phẩm</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="cart">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <table class="table table-cart table-mobile">
                            <thead>
                                <tr>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php
								$total = 0;
								if(isset($_SESSION["customerid"])):?>
                                <?php foreach ($cart as $value): ?>
                                <?php
											$product = product::getproductbyid($value["productid"]);
											$total += $product["product"]["price"] * $value["quantity"];
										?>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="uploads/<?=$product["images"][0]?>" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#"><?=$product["product"]["name"]?></a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col"><?=number_format($product["product"]["price"])?> VNĐ</td>

                                    <td class="quantity-col col-lg-2">
                                        <form action="?controller=cart" method="post" class="cart-product-quantity">
                                            <input style="margin: 0px 5px !important;" type="hidden" name="id"
                                                value="<?=$product["product"]["id"]?>">
                                            <input style="margin: 0px 5px !important;" type="number" name="quantity"
                                                class="form-control" value="<?=$value["quantity"]?>" min="1" max="100"
                                                step="1" data-decimals="0" required>
                                            <input style="margin: 0px 5px !important;" type="submit"
                                                class="form-control" name="update" value="Cập nhật">
                                        </form><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col">
                                        <?=number_format($product["product"]["price"] * $value["quantity"])?>VNĐ </td>
                                    <td class="remove-col"><a class="btn-remove"
                                            href="?controller=Cart&deleteid=<?=$product["product"]["id"] ?>"><i
                                                class="icon-close"></i></a></td>
                                </tr>
                                <tr>
                                    <?php endforeach ?>

                                    <?php endif ?>

                                    <?php if(!isset($_SESSION["customerid"])):?>
                                    <?php
									if(isset($_SESSION["cart"])):?>
                                    <?php foreach ($_SESSION["cart"]  as $productid => $quantity): ?>
                                    <?php
											$product = product::getproductbyid($productid);
											$total += $product["product"]["price"] * $quantity;
										?>
                                <tr>
                                    <td class="product-col">
                                        <div class="product">
                                            <figure class="product-media">
                                                <a href="#">
                                                    <img src="uploads/<?=$product["images"][0]?>" alt="Product image">
                                                </a>
                                            </figure>

                                            <h3 class="product-title">
                                                <a href="#"><?=$product["product"]["name"]?></a>
                                            </h3><!-- End .product-title -->
                                        </div><!-- End .product -->
                                    </td>
                                    <td class="price-col"><?=number_format($product["product"]["price"])?> VNĐ</td>

                                    <td class="quantity-col col-lg-2">
                                        <form action="?controller=cart" method="post" class="cart-product-quantity">
                                            <input type="hidden" name="id" value="<?=$product["product"]["id"]?>">
                                            <input style="margin: 0px 5px !important;" type="number" name="quantity"
                                                class="form-control" value="<?=$quantity?>" min="1" max="100" step="1"
                                                data-decimals="0" required>
                                            <input style="margin: 0px 5px !important;" type="submit"
                                                class="form-control" name="update" value="Cập nhật">
                                        </form><!-- End .cart-product-quantity -->
                                    </td>
                                    <td class="total-col"><?=number_format($product["product"]["price"] * $quantity)?>
                                        VNĐ</td>
                                    <td class="remove-col"><a class="btn-remove"
                                            href="?controller=Cart&deleteid=<?=$product["product"]["id"] ?>"><i
                                                class="icon-close"></i></a></td>
                                </tr>
                                <tr>
                                    <?php endforeach ?>
                                    <?php endif ?>
                                    <?php endif ?>


                            </tbody>
                        </table><!-- End .table table-wishlist -->

                        <div class="cart-bottom">
                            <div class="cart-discount">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control" required placeholder="Mã giảm giá">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary-2" type="submit"><i
                                                    class="icon-long-arrow-right"></i></button>
                                        </div><!-- .End .input-group-append -->
                                    </div><!-- End .input-group -->
                                </form>
                            </div><!-- End .cart-discount -->


                        </div>
                        <!-- End .cart-bottom -->
                    </div><!-- End .col-lg-9 -->
                    <aside class="col-lg-3">
                        <div class="summary summary-cart">
                            <h3 class="summary-title">Tổng tiền</h3><!-- End .summary-title -->

                            <table class="table table-summary">
                                <tbody>


                                    <tr class="summary-total">
                                        <td>Tổng:</td>
                                        <td><?=number_format($total)?> VNĐ</td>
                                    </tr><!-- End .summary-total -->
                                </tbody>
                            </table><!-- End .table table-summary -->

                            <a id="buy-button" onclick="handleBuyButtonClick(event)"
                                href="?controller=cart&action=checkout"
                                class="btn btn-outline-primary-2 btn-order btn-block">MUA HÀNG</a>
                        </div><!-- End .summary -->

                        <a href="?controller=home" class="btn btn-outline-dark-2 btn-block mb-3"><span>TIẾP TỤC MUA
                                HÀNG</span><i class="icon-refresh"></i></a>
                    </aside><!-- End .col-lg-3 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .cart -->
    </div><!-- End .page-content -->
</main><!-- End .main -->
<script>
function handleBuyButtonClick(event) {
    event.preventDefault(); // Ngăn chặn hành vi mặc định của liên kết

    var total = <?php echo $total; ?>;

    if (total === 0) {
        alert("Chưa có sản phẩm nào trong giỏ. Không thể mua hàng."); // Hiển thị cảnh báo
    } else {
        window.location.href = event.target.href; // Điều hướng đến liên kết

        event.target.setAttribute('disabled', 'disabled'); // Vô hiệu hóa liên kết sau khi điều hướng
    }
}
</script>