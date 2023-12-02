<?php
	require_once("client/models/product.php");
?>
<style>
input[type='radio']:checked:after {
    width: 15px;
    height: 15px;
    border-radius: 15px;
    top: -2px;
    left: -1px;
    position: relative;
    background-color: #a6c76c;
    content: '';
    display: inline-block;
    visibility: visible;
    border: 3px solid lightgray;
}


</style>


<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Thanh Toán<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="?controller=home">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="?controller=products">Cửa hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                <form action="?controller=cart&action=order" method="post">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="checkout-title">Chi tiết thanh toán</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Họ tên *</label>
                                    <input value="<?= $customer["name"] ?>" name="name" type="text" class="form-control"
                                        required>
                                </div><!-- End .col-sm-6 -->

                            </div><!-- End .row -->

                            <label>Địa chỉ *</label>
                            <input value="<?= $customer["address"] ?>" name="address" type="text" class="form-control"
                                placeholder="Địa chỉ nhận hàng" required>

                            <div class="row">
                                <div class="col-sm-12">
                                    <label>Số điện thoại *</label>
                                    <input value="<?= $customer["phone"] ?>" name="phone" type="text"
                                        class="form-control" required>
                                </div><!-- End .col-sm-6 -->

                            </div><!-- End .row -->



                            <label>Địa chỉ Email *</label>
                            <input value="<?= $customer["email"] ?>" name="email" type="email" class="form-control"
                                required>


                            <label>Ghi chú</label>
                            <textarea name="note" class="form-control" cols="30" rows="4"
                                placeholder="Ghi chú cho người gửi hoặc người giao..."></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-6">
                            <div class="summary">
                                <h3 class="summary-title">Đơn hàng của bạn</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <?php
											$total = 0;
											?>
                                            <?php foreach ($carts as $cart): ?>
                                        <tr>
                                            <?php
												$product = Product::getProductById($cart["productid"]);
												$total += $cart["quantity"] * $product["product"]["price"];
												?>
                                            <td class="col-lg-8">
                                                <?php echo $product["product"]["name"]; ?>
                                            </td>
                                            <td class="col-lg-4">
                                                <?php echo number_format($product["product"]["price"], 0, "", "."); ?> x
                                                <?php echo $cart["quantity"]; ?>
                                            </td>
                                        </tr>
                                        <?php endforeach ?>
                                        <input type="hidden" name="total" value="<?=$total?>">
                                        <input type="hidden" name="price" value="<?=$product['product']['price']?>">

                                        <tr>
                                            <td>Phương thức vận chuyển:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td colspan="3"><span class="col-lg-2">Tổng tiền:</span>
                                                <span class="col-lg-10">
                                                    <?php echo number_format($total, 0, "", "."); ?> VNĐ
                                                </span>
                                            </td>


                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">

                                    <div class="card">
                                        <div class="card-header hehehe" id="heading-2">
                                            <h2 class="card-title">
                                                <input style="margin-bottom: 20px;" type="radio" name="payment" checked
                                                    value="Credit card" class="custom-radiom " role="button"
                                                    data-toggle="collapse" href="#collapse-2" aria-expanded="true"
                                                    aria-controls="collapse-2">
                                                chuyển khoản
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-2" class="collapse" aria-labelledby="heading-2"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Bạn sẽ trả tiền trước cho đơn hàng
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <input style="margin-bottom: 20px;" type="radio" name="payment"
                                                    value="Cash" class="collapsed" role="button" data-toggle="collapse"
                                                    href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                Thanh toán khi nhận hàng
                                                </input>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3"
                                            data-parent="#accordion-payment">
                                            <div class="card-body">Bạn sẽ trả tiền sau khi nhận được hàng
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->



                                    <button type="submit" name="order"
                                        class="btn btn-outline-primary-2 btn-order btn-block">
                                        <span class="btn-text">Đặt hàng</span>
                                        <span class="btn-hover-text">Tiến hành thanh toán</span>
                                    </button>
                                </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main><!-- End .main -->