
<div class="container">
    <h1 class="text-center h1">Thông tin hóa đơn đã đặt</h1>
    <table class="table text-center">
        <thead class="thead-dark ">
            <tr>
                <th scope="col">Mã hóa đơn</th>
                <th scope="col">Tên người nhận</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Ngày đặt</th>
                <th scope="col">Trạng thái</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <!-- Dòng này sẽ được lặp để hiển thị thông tin từ danh sách hóa đơn -->
            <?php foreach ($orders as $order): ?>
            <?php
                $orderdetail = Order::selectOrderDetailById($order["orderid"]);
                $total = 0;
                $orderInfors = Order::selectOrderByOrderDetailId($order["orderid"]);
                foreach ($orderInfors as $orderInfor) {
                    $product = product::getProductById($orderInfor["productid"]);
                    $total += $orderInfor["quantity"] * $product["product"]["price"];
                }

                ?>
            <tr>
                <td>
                    <?php echo $orderdetail["id"]; ?>
                </td>
                <td>
                    <?php echo $orderdetail["name"]; ?>
                </td>
                <td>
                    <?php echo number_format($total, 0, "", "."); ?> VNĐ
                </td>
                <td>
                    <?php echo $orderdetail["created_at"]; ?>
                </td>
                <td>
                    <?php
                        if ($orderdetail["status"] == 0) {
                            echo "Đang xử lý";
                        } else if ($orderdetail["status"] == 1) {
                            echo "Đã xác nhận";
                        } else if ($orderdetail["status"] == 2) {
                            echo "Chuẩn bị hàng";
                        } else if ($orderdetail["status"] == 3) {
                            echo "Đang gửi hàng";
                        } else if ($orderdetail["status"] == 4) {
                            echo "Đã nhận hàng";
                        }
                        ?>
                </td>
                <td>
                    <a href="<?php if ($orderdetail["status"] == 3) {
                            echo "?controller=cart&action=updatestatus&id=" . $orderdetail['id'];
                        } else {
                            echo "";
                        }
                        ?>" name="" class="btn btn-danger <?php if ($orderdetail["status"] != 3)
                            echo "disabled"; ?>">Đã nhận hàng</a>
                </td>
                <th>
                    <a href="#" class="btn btn-outline-primary btn-rounded" data-bs-toggle="modal"
                        data-bs-target="#orderdetail<?php echo $orderdetail["id"]; ?>">Xem chi tiết</a>
                </th>
            </tr>
            <!-- The Modal -->
            <div class="modal" id="orderdetail<?php echo $orderdetail["id"]; ?>">
                <div class="modal-dialog" style="width:1000px !important;">
                    <div class="modal-content p-3">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Chi tiết hóa đơn</h4>
                            <a type="button" class="icon-close" data-bs-dismiss="modal"></a>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body p-5">
                            <?php
                                $productIds = Order::getProductIdByOrderDetailId($orderdetail["id"]);
                                ?>
                            <div class="row">
                                <div class="col-lg-5 b">
                                    <b>Tên người nhận: </b>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $orderdetail["name"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <b>Email: </b>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $orderdetail["email"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <b>Địa chỉ nhận hàng: </b>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $orderdetail["address"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <b>Ghi chú: </b>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $orderdetail["note"]; ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-5">
                                    <b>Hình thức thanh toán: </b>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo $orderdetail["payment"]; ?>
                                </div>
                            </div>
                            <div class="row p-3">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <b>Tên sản phẩm</b>
                                </div>
                                <div class="col-lg-3">
                                    <b>Giá tiền</b>

                                </div>
                                <div class="col-lg-3">
                                    <b>Số lượng</b>

                                </div>
                            </div>
                            <?php foreach ($productIds as $prod): ?>
                            <?php
                                    $producttt = product::getProductById($prod["productid"])
                                        ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php echo $producttt["product"]["name"] ?>
                                </div>
                                <div class="col-lg-3">
                                    <?php echo number_format($producttt['product']['price'], 0, "", "."); ?> VNĐ
                                </div>
                                <div class="col-lg-3">
                                    <?php $quantity = Order::getQuantityByOrderAndProduct($orderdetail["id"], $producttt["product"]["id"]); ?>
                                    <?php echo $quantity["quantity"]; ?>
                                </div>
                            </div>
                            <?php endforeach ?>
                        </div>
                        <!-- Modal body -->


                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>