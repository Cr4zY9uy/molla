<div class="row">
    <div class="col-lg-3">
        <a href="?controller=products&action=create" class="btn btn-success">Thêm sản phẩm</a>
    </div>
    <div class="col-lg-3">
        <form action="?controller=products&action=search" method="post">
            <input type="search" class="form-control" name="timkiem" id="timkiem" placeholder="Tìm kiếm sản phẩm.."
                required>
        </form>
    </div>
    <div class="col-lg-3">
        <div class="dropdown">
            <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown">
                Lọc theo danh mục
            </button>
            <ul class="dropdown-menu">
                <?php
                $currentUrl = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
                if ($_SERVER['QUERY_STRING']) {
                    $currentUrl .= '?' . $_SERVER['QUERY_STRING'];
                }
                $categories = Category::getAllCategories();
                ?>
                <?php foreach ($categories as $category): ?>
                <li><a class="dropdown-item" href="<?php echo "?controller=products&categoryid=" . $category["id"]; ?>">
                        <?php echo $category["name"] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="dropdown">
            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                Lọc theo mức giá
            </button>
            <ul class="dropdown-menu">

                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=100000&endprice=300000"; ?>">
                        <?php echo number_format(100000).' - '.number_format(300000) ?></a>
                </li>
                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=300000&endprice=500000"; ?>">
                        <?php echo number_format(300000).' - '.number_format(500000) ?></a>
                </li>
                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=500000&endprice=700000"; ?>">
                        <?php echo number_format(500000).' - '.number_format(700000) ?></a>
                </li>
                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=700000&endprice=900000"; ?>">
                        <?php echo number_format(700000).' - '.number_format(900000) ?></a>
                </li>
                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=900000&endprice=1100000"; ?>">
                        <?php echo number_format(900000).' - '.number_format(1100000) ?></a>
                </li>
                <li><a class="dropdown-item"
                        href="<?php echo "?controller=products&action=searchPrice&startprice=1100000&endprice=100000000"; ?>">
                        <?php echo number_format(1100000).'+' ?></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productssearch as $productId => $product): ?>
        <tr>
            <td>
                <?php echo $product['product']['name']; ?>
            </td>
            <td>
                <?php if (!empty($product['images'])): ?>
                <img src="../uploads/<?php echo $product['images'][0]; ?>" alt="Product Image" width="120">
                <?php endif; ?>
            </td>
            <td>
                <?php echo $product['product']['quantity']; ?>
            </td>
            <td>
                <?php echo number_format($product['product']['price']); ?>
            </td>
            <td>
                <a class="btn btn-warning"
                    href="?controller=products&action=update&id=<?php echo $product['product']['id']; ?>">Sửa</a>
                <a class="btn btn-danger"
                    href="?controller=products&action=delete&id=<?php echo $product['product']['id']; ?>">Xóa</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="d-flex justify-content-center">
</div>