<div class="mb-4">
    <div class="row ">
        <div class="mb-4 col-lg-12" style="text-align: center;">
            <h2>Quản lý khách hàng</h2>
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-6">
            <form action="?controller=Customers&action=search" method="post">
                <input type="search" class="form-control" name="timkiem" id="timkiem" placeholder="Tìm kiếm khách hàng"
                    required>
            </form>
        </div>
    </div>

    <?php if (isset($messageDisable)): ?>
    <script>
    alert("<?php echo $messageDisable; ?>")
    </script>
    <?php endif ?>
    <?php if (isset($messageEnable)): ?>
    <script>
    alert("<?php echo $messageEnable; ?>")
    </script>
    <?php endif ?>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Địa chỉ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($customers as $customer): ?>
            <tr>
                <td>
                    <?php echo $customer["name"] ?>
                </td>
                <td>
                    <?php echo $customer["email"] ?>
                </td>
                <td>
                    <?php echo $customer["phone"] ?>
                </td>
                <td>
                    <?php echo $customer["address"] ?>
                </td>
                <td class="flex">
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $customer["id"]; ?>">
                        <button class="btn btn-success delete-button" name="enable" onclick="return confirmEnable()" <?php if($customer["status"]==0)
                                    echo 'disabled'
                            ?>>Kích
                            hoạt</button>
                        <button class="btn btn-danger delete-button" name="disable" onclick="return confirmDisable()" <?php if($customer["status"]==1)
                                    echo 'disabled'
                            ?>>Vô
                            hiệu hóa</button>
                    </form>
                </td>
            </tr>
            <!-- Popup sửa danh mục -->

            <?php endforeach ?>
        </tbody>
    </table>



</div>






<script>
$(document).ready(function() {

});

function confirmDisable() {
    return confirm("Bạn có chắc chắn muốn vô hiệu hóa?");
}

function confirmEnable() {
    return confirm("Bạn có chắc chắn muốn kích hoạt?");
}
</script>